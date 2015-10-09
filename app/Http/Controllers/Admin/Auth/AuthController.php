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
use App\Http\Requests\AuthRequest;


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
    private $maxLoginAttempts = 10;

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

        Auth::login($this->create($request->all()));         

        return redirect($this->redirectPath());
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
            'name'       => $data['name'],                
            'email'      => $data['email'],
            'password'   => bcrypt($data['password']),
            'country_id' => $data['country_id'],
            'active'     => 1,
        ];

        //Add social avatar to the user
        if (isset($socialdata->avatar)){
            $DataUser['avatar'] = $socialdata->avatar;
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
}
