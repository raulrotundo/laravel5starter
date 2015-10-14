<?php
namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Http\Request;

use App\Http\Requests\ProfileRequest;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Admin\User;
use App\Models\Admin\Countries;
use Session;
use Datatable;
use URL;

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
     * @param  int  $id
     * @return Response
     */
    public function edit()
    {
        $user = Auth::user();
        $action = 'admin.profile.update';
        $countries = ['0'=>trans('admin/users.form.country.placeholder')];
        $countries = array_merge($countries,Countries::all()->lists('name','id')->toArray());

        return View('admin.profile.edit', compact('user','action','countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(ProfileRequest $request)
    {
        $input = $request->all();
        $user  = User::find(Auth::user()->id);
        $user->update($input);

        Session::flash('flash_message', 'Profile successfully updated!');
        return redirect()->back();
    }
}
