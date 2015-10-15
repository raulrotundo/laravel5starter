<?php
namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Http\Request;

use App\Http\Requests\ProfileRequest;
use App\Http\Requests\AvatarRequest;
use App\Http\Controllers\Controller;
use App\Models\Admin\Countries;
use Auth;
use Session;
use Datatable;
use URL;
use App;

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
        $action = 'admin.profile.updateInfo';
        $countries = ['0'=>trans('admin/users.form.country.placeholder')] + Countries::all()->lists('name','id')->toArray();

        return View('admin.profile.edit', compact('user','action','countries'));
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
        $user->update($input);

        Session::flash('flash_message', 'Profile successfully updated!');
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return Response
     */
    public function editAvatar()
    {
        $user = Auth::user();
        $action = 'admin.profile.updateAvatar';

        return View('admin.profile.editAvatar', compact('user','action'));
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

        Session::flash('flash_message', 'Profile avatar successfully updated!');
        return redirect()->back();
    }
}
