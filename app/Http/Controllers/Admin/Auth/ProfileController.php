<?php
namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Http\Request;

use App\Http\Requests\ProfileRequest;
use App\Http\Requests\ProfileSecurityRequest;
use App\Http\Requests\AvatarRequest;
use App\Http\Controllers\Controller;
use App\Models\Admin\Countries;
use App\Models\Admin\User;
use Auth;
use Hash;
use Session;
use Datatable;
use URL;
use App;
use Mail;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $user  = Auth::user();
        $route = URL::route('admin.profile.index');
        return view('admin.profile.index',compact('user', 'route'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return Response
     */
    public function edit()
    {
        $user = Auth::user();
        $action1 = 'admin.profile.updateInfo';
        $action2 = 'admin.profile.updateSecurity';
        $action3 = 'admin.profile.updatePrivacity';
        $countries = ['0'=>trans('admin/users.form.country.placeholder')] + Countries::all()->lists('name','id')->toArray();

        return View('admin.profile.edit', compact('user','action1','action2','action3','countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function updateInfo(ProfileRequest $request)
    {
        $input = $request->all();
        $user  = Auth::user();

        if (isset($input['email']) AND $input['email']!=$user->email){
            //set
                Session(['unverified_email' => $input['email']]);
                $activation_code            =  str_random(30);
                $input['activation_code']   =  $activation_code;
                $input['email']             =  $user->email;

            //send
                Mail::send('emails.email_confirmation', array('activation_code' => $activation_code), function($message) {
                    $message->to(session('unverified_email'), Auth::user()->name)
                            ->subject(trans('register.email-email_confirmation-subject'));
                });
                Session::flash('flash_message', trans('register.email-email_confirmation-sent-success') );
        }

        $user->update($input);

        Session::flash('flash_message', trans('admin/profile.form.update_info_confirm') );
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function updateSecurity(ProfileSecurityRequest $request)
    {
        $input = $request->all();
        $user  = Auth::user();

        $pwd_c = $input['chg_password']['current'];
        $pwd_n = $input['chg_password']['new'];
        $pwd_r = $input['chg_password']['repeat'];

        if(isset($pwd_c)){
            if(Hash::check($pwd_c, $user->password)){
                $input['password'] = bcrypt($pwd_n);
                $user->update($input);
                Session::flash('flash_message', trans('admin/profile.form.update_password_confirm'));
            }else{
                //message
                Session::flash('flash_message', trans('admin/profile.form.update_password_error'));
                Session::flash('flash_type', 'alert-danger');
            }
        }

        if(isset($input['leave_user'])){
            $input['active'] = 2;
            $user->update($input);
            return redirect('admin/logout');
        }

        return redirect()->back();
    }

    public function confirmEmailRegistration($activation_code)
    {
        if(!$activation_code) {
            return redirect('admin')->withErrors(['credentials'=>trans('register.activation_code_required')]);
        }

        if(!Session::has('unverified_email')) {
            return redirect('admin')->withErrors(['credentials'=>trans('register.missing_session_email')]);
        }

        $user = User::whereActivationCode($activation_code)->first();

        if (!$user) {
            return redirect('admin')->withErrors(['credentials'=>trans('register.invalid_registration_code')]);
        }

        $user->email           = session('unverified_email');
        $user->activation_code = null;
        $user->save();

        return redirect('admin')->with('flash_message', trans('register.registration-success'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return Response
     */
    public function editAvatar(Request $request)
    {
        if ($request->ajax()){
            $user = Auth::user();
            $action = 'admin.profile.updateAvatar';
            return View('admin.profile.editAvatar', compact('user','action'));
        }else{
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function updateAvatar(AvatarRequest $request)
    {
        $input = $request->all();
        $user  = Auth::user();

        //Upload avatar picture functionality
        if (isset($input['avatar'])) {
            //if there is a previous avatar, then first remove it
            if ($user->avatar){
                App::make('App\Http\Controllers\Admin\Auth\UserController')->avatar_remove($user->avatar);
            }
            $avatar_path = App::make('App\Http\Controllers\Admin\Auth\UserController')->avatar_upload($input['avatar'],uniqid());
            if ($avatar_path){
                //Updating picture path
                $input['avatar'] = url($avatar_path);
            }            
        }

        if (isset($input['avatar_remove'])){
            //Remove avatar picture is exist
            if ($user->avatar){
                App::make('App\Http\Controllers\Admin\Auth\UserController')->avatar_remove($user->avatar);
                //Updating picture path
                $input['avatar'] = '';
            }
        }

        $user->update($input);

        Session::flash('flash_message', trans('admin/profile.form.update_avatar_confirm'));
        return redirect()->back();
    }
}
