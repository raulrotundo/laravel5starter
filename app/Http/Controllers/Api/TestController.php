<?php

namespace App\Http\Controllers\Api;

use Auth;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Routing\Controller;
use App\Models\Admin\User;

class TestController extends Controller
{
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
