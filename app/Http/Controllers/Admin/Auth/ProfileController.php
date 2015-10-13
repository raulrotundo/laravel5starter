<?php
namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Http\Request;

use App\Http\Requests\ProfileRequest;
use App\Http\Controllers\Controller;
use Auth;
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
    public function edit($id)
    {
        $role   = Role::find($id);
        $list_permissions = $role->listPermissions();
        $assg_permissions = $role->listPermissionsAssigned();
        $action = 'admin.roles.update';
        return View('admin.roles.edit', compact('role','list_permissions','assg_permissions','action'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(ProfileRequest $request, $id)
    {
        $input  = $request->all();
        $role   = Role::find($id);
        $role->update($input);

        //Assign permissions to roles
        if (isset($input['permissions_assg'])){
            $role->permissions()->sync($input['permissions_assg']);
        }else{
            $role->permissions()->sync([]);
        }

        Session::flash('flash_message', 'Role successfully updated!');
        return redirect()->back();
    }
}
