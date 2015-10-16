<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use App\Http\Requests\PasswordRequest;
use Password;
use Illuminate\Mail\Message;
use Auth;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


class PasswordController extends Controller
{
    /**
     * The path to redirect to after submitting the form.
     *
     * @var string
     */
    protected $redirectTo = '/admin';
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Create a new password controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest');
        $this->subject = trans('passwords.subject_reset'); 
    }

    /**
     * Display the form to request a password reset link.
     *
     * @return \Illuminate\Http\Response
     */
    public function getEmail()
    {
        return view('frontend.password.password');
    }

    protected function getEmailSubject()
    {
       return isset($this->subject) ? $this->subject : 'Your Password Reset Link';
    }

    public function postEmail(PasswordRequest $request)
    {
        $response = Password::sendResetLink($request->only('email'), function (Message $message) {
            $message->subject($this->getEmailSubject());
        });

         switch ($response) {
            case Password::RESET_LINK_SENT:
            return redirect()->back()->with('status', trans($response));

            case Password::INVALID_USER:
            return redirect()->back()->withErrors(['email' => trans($response)]);
        }
    }

    /**
     * Display the form to request a password reset form.
     *
     * @return \Illuminate\Http\Response
     */
    public function getReset($token = null)
    {
        if (is_null($token)) App::abort(404);
        return view('frontend.password.reset',compact('token'));
    }
}
