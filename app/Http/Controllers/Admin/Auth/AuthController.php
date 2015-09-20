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

    public function getRegister() {
        $roles   = Role::all();
        return view('frontend.register.register',compact('roles'));
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
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
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
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'country_id' => 1,
            'active' => 1,
        ]);
        return $User->assignRole($data['role_id']);
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

        $authUser = $this->findOrCreateUser($user,$provider);

        Auth::login($authUser, true);

        return redirect($this->redirectPath);
    }

    /**
     * Return user if exists; create and return if doesn't
     *
     * @param $githubUser
     * @return User
     */
    private function findOrCreateUser($userData,$provider)
    {
        $socialname = explode(' ', $userData->name);
        $user = User::where('email', '=', $userData->email)->first();
        if(!$user) {
            /*$user = User::create([
                'first_name' => $socialname[0],
                'last_name' => $socialname[1],
                'email' => $userData->email,
                'password' => bcrypt(str_random(6)),
                'country_id' => 1, //at the moment we can assign Argentina as Default
                'active' => 1,
            ]);*/
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
    }
}
