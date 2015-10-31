<?php

namespace App\Http\Controllers\Api;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Admin\User;
use Validator;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Laravel\Socialite\Contracts\Factory as Socialite;
use App\Models\Admin\Role;
use App\Models\Admin\SocialData;
use App\Models\Admin\Companies;
use App\Models\Admin\Countries;
use Input;
use Session;
use Mail;
use App\Http\Requests\RegistrationRequest;
use Lang;
use Illuminate\Cache\RateLimiter;


class TestController extends Controller
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

    /*protected $redirectPath = '/admin';
    protected $loginPath = '/login';*/
    private $maxLoginAttempts = 5;
    private $lockoutTime = 5; //5 minutes

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
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        header('Access-Control-Allow-Origin: *');
        $users['users'] = User::all();
        return response()->json(['status'=>'ok','response'=>$users], 200);
    }

    /*
     * Login API
     * @return Response
     */
    public function login(Request $request)
    {
        header('Access-Control-Allow-Origin: *');

        $error_msg = array();

        $rules = array(
            'email' => 'required',
            'password' => 'required',
        ); 

        $validator = Validator::make(Input::all(),$rules);

        if($validator->fails()){
            array_push($error_msg, $validator->errors());
        }

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        $throttles = $this->isUsingThrottlesLoginsTrait();

        if ($throttles && $this->hasTooManyLoginAttempts($request)) {
            $seconds = app(RateLimiter::class)->availableIn(
                $request->input($this->loginUsername()).$request->ip()
            );
            $this->sendLockoutResponse($request);
            array_push($error_msg, ['message' => $this->getLockoutErrorMessage($seconds)]);
        }

        //Validate whether the input is email, if yes Auth::attempt using email, else attempt using username
        $field = filter_var($request->input('email'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        $request->merge([$field => $request->input('email')]);

        if (!$error_msg){
            if (Auth::once($request->only($field, 'password'), $request->has('remember'))) {
                    $response = Auth::user();                    
                    $response->SocialData; //Social data info
                    $response['session'] = ['data' => $request->session()->all(), 'id' => Session::getId()];
            } else {
                // If the login attempt was unsuccessful we will increment the number of attempts
                // to login and redirect the user back to the login form. Of course, when this
                // user surpasses their maximum number of attempts they will get locked out.
                if ($throttles) $this->incrementLoginAttempts($request);
                array_push($error_msg, ['message' => $this->getFailedLoginMessage()]);
            }
        }

        $render_response = [
            'entry'     => $request->all(),
            'response'  => isset($response) ? $response : null,
            'status'    => !$error_msg ? 0 : 1,
            'msg'       => !$error_msg ? "OK" : "ERROR",
        ];

        if ($error_msg){
            $render_response['errors'] = array('error' => $error_msg); 
        }

        return response()->json($render_response);
    }
}
