<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Models\Admin\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Auth;
use Laravel\Socialite\Contracts\Factory as Socialite;
use App\Models\Admin\Role;
use App\Models\Admin\SocialData;
use App\Models\Admin\Companies;
use App\Models\Admin\Countries;
use Input;
use Session;
use Mail;
use App\Http\Requests\AuthRequest;
use Illuminate\Http\Request;


class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    protected $redirectPath = '/admin';
    protected $loginPath = '/login';
    private $maxLoginAttempts = 5;
    private $lockoutTime = 300; //5 minutes

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct(Socialite $socialite)
    {
        $this->middleware('guest', ['except' => 'getLogout']);
        $this->socialite = $socialite;
    }

    public function getLogin() {
        return view('admin.auth.login');
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postLogin(Request $request)
    {
        $this->validate($request, [
            $this->loginUsername() => 'required', 'password' => 'required',
        ]);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        $throttles = $this->isUsingThrottlesLoginsTrait();

        if ($throttles && $this->hasTooManyLoginAttempts($request)) {
            return $this->sendLockoutResponse($request);
        }

        //validate if is an active '0' user
        if (Auth::validate([$this->loginUsername() => $request->email, 'password' => $request->password, 'active' => 0])) {
            return redirect($this->loginPath())
                ->withInput($request->only($this->loginUsername(), 'remember'))
                ->withErrors(trans('auth.inactive'));
        }

        $credentials = $this->getCredentials($request);

        if (Auth::attempt($credentials, $request->has('remember'))) {
            //validate if is an active '2' user
            $user= Auth::user();
            if($user->active==2){
                $user->update(['active' => 1]);
                Session(['back' => 'back']);
            }else{
                if(Session::has('back')){
                    Session::forget('back');
                }
            }

            //response
            return $this->handleUserWasAuthenticated($request, $throttles);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        if ($throttles) {
            $this->incrementLoginAttempts($request);
        }

        return redirect($this->loginPath())
            ->withInput($request->only($this->loginUsername(), 'remember'))
            ->withErrors([
                $this->loginUsername() => $this->getFailedLoginMessage(),
            ]);
    }

    /**
    * Show the application registration form.
    *
    * @return \Illuminate\Http\Response
    */
    public function getRegister() {
        $countries = ['0'=>trans('register.country')];
        $countries = array_merge($countries,Countries::all()->lists('name','id')->toArray());
        return view('admin.auth.register',compact('countries'));
    }

    /**
    * Handle a registration request for the application.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function postRegister(AuthRequest $request) {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException($request, $validator);
        }

        $User = $this->create($request->all());
        if (!$User->active) {
            $activation_code = array( 'activation_code' => $User->activation_code);
            //Sending email confirmation
            Mail::send('emails.register', $activation_code, function($message) {
                $message->to(Input::get('email'), Input::get('username'))
                    ->subject(trans('register.email-registration-subject'));
            });
            return redirect()->back()->with('email-registration-sent-success', trans('register.email-registration-sent-success'));
        } else {
            //Auto-login
            Auth::login($User);
            return redirect($this->redirectPath());
        }
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {        
        return Validator::make($data, [
            'name'       => 'required|max:255',
            'email'      => 'required|email|max:255|unique:users',
            'password'   => 'required|confirmed|min:6',
            'country_id' => 'required|not_in:0',
            'agree'      => 'required'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        //Create user auth except admin role
        $socialdata = Session::get('socialdata'); 
        $provider   = Session::get('provider');

        $DataUser = [
            'name'            => $data['name'],                
            'email'           => $data['email'],
            'password'        => bcrypt($data['password']),
            'country_id'      => $data['country_id']
        ];

        //Add social avatar to the user
        if (isset($socialdata->avatar)){
            $DataUser['avatar'] = $socialdata->avatar;
            $DataUser['active'] = 1;
        } else {
            //Activation code is required
            $DataUser['activation_code'] = str_random(30);
        }

        //User create
        $User = User::create($DataUser);

        //Client role by default
        $User->assignRole(3);            

        //Save social data if is present
        if ($socialdata and $provider){
            SocialData::create([
                'user_id'     => $User->id,
                'provider'    => $provider,
                'social_data' => serialize($socialdata)
            ]);
        }
        
        return $User;
    }

    /**
     * Redirect the user to the social network authentication page.
     *
     * @param string $provider
     * @return Response
     */
    public function getSocialAuth($provider=null)
    {
       if(!config("services.$provider")) abort('404'); //just to handle providers that doesn't exist
       return $this->socialite->with($provider)->redirect();
    }

    /**
     * Obtain the user information from the social network.
     *
     * @param string $provider
     * @return Response
     */
    public function getSocialAuthCallback($provider=null)
    {
        if(!$user = $this->socialite->with($provider)->user()){
            return trans('register.social_callback_error');
        }

        Session::flash('socialdata', $user);
        Session::flash('provider', $provider);
        return redirect('register');
    }

    public function confirmRegistration($activation_code)
    {
        if(!$activation_code) {
            return redirect('login')->withErrors(['credentials'=>trans('register.activation_code_required')]);
        }

        $user = User::whereActivationCode($activation_code)->first();

        if (!$user) {
            return redirect('login')->withErrors(['credentials'=>trans('register.invalid_registration_code')]);
        }

        $user->active          = 1;
        $user->activation_code = null;
        $user->save();

        return redirect('login')->with('registration-success', trans('register.registration-success'));
    }
}
