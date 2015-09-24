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
use Input;
use Session;
use Request;


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
        $roles   = Role::all();
        return view('frontend.register.register',compact('roles'));
    }

    /**
    * Handle a registration request for the application.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function postRegister(Request $request) {
        echo '<pre>'; print_r($request); exit;
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException($request, $validator);
        }

        Auth::login($this->create($request->all()));

        $role_id = Role::where('role_slug', '=', Input::get('role'))->first();
        User::assignRole($role_id);   

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
            'country_id' => 'required',
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
        $User = User::create([
            'name'       => $data['name'],
            'email'      => $data['email'],
            'password'   => bcrypt($data['password']),
            'country_id' => $data['country_id'],
            'active'     => 1,
        ]);
        //return $User->assignRole($data['role_id']);
        return $User->assignRole(3);
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
            return 'Something went wrong';
        }

        Session::flash('socialdata', $user);
        Session::flash('provider', $provider);
        return redirect('register/client');
    }

    /**
     * Return user if exists; create and return if doesn't
     *
     * @param $githubUser
     * @return User
     */
    /*private function findOrCreateUser($userData,$provider,$role)
    {
        $socialname = explode(' ', $userData->name);
        $user = User::where('email', '=', $userData->email)->first();
        if(!$user) {
            $role_id = Role::where('role_slug', '=', $role)->first();
            //Create user auth except admin role
            if ($role_id and $role_id->id<>1) {
                $user = User::create([
                    'first_name' => $socialname[0],
                    'last_name' => $socialname[1],
                    'email' => $userData->email,
                    'password' => bcrypt(str_random(6)),
                    'country_id' => 1, //at the moment we can assign Argentina as Default
                    'active' => 1,
                ]);
                $user->assignRole($role_id);    
            }            
        }

        $this->checkIfUserNeedsUpdating($userData, $user);
        return $user;
    }

    public function checkIfUserNeedsUpdating($userData, $user) {
        $socialname = explode(' ', $userData->name);
        $socialData = [
            'email' => $userData->email,
            'first_name' => $socialname[0],
            'last_name' => $socialname[1],
        ];
        $dbData = [
            'email' => $user->email,
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
        ];

        if (!empty(array_diff($socialData, $dbData))) {
            $user->email = $userData->email;
            $user->first_name = $userData->first_name;
            $user->last_name = $userData->last_name;
            $user->save();
        }
    }*/
}
