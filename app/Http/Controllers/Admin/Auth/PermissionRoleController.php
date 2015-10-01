<?php
namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Http\Request;

use App\Http\Requests\PermissionRoleRequest;
use App\Http\Controllers\Controller;
use App\Models\Admin\PermissionRole;
use App\Models\Admin\Permission;
use App\Models\Admin\Role;
use Session;
use Datatable;
use URL;

class PermissionRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $permission_role = PermissionRole::all();
        $route = URL::route('admin.permissionroles.index');
        return view('admin.permissionroles.index',compact('permission_role', 'route'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $permission_role = new PermissionRole;
        $list_roles = $permission_role->listRoles();
        $list_permissions = $permission_role->listPermissions();
        $route = 'admin.permissionroles.store';
        return View('admin.permissionroles.create')->with(compact('permission_role','list_roles','list_permissions', 'route'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(PermissionRoleRequest $request)
    {
        $input = $request->all();

        PermissionRole::create($input);
        Session::flash('flash_message', 'Permission assignment successfully added!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show()
    {       

        return Datatable::collection(PermissionRole::with('permissions','roles')->select('*'))
        ->showColumns('permissionrole.id','role_title', 'permission_title')
        ->searchColumns('permissionrole.id','role_title', 'permission_title')
        ->orderColumns('permissionrole.id','role_title', 'permission_title')
        ->addColumn('Actions',function($model){
            return '<a href="roles/'.$model->id.'/edit" class="btn btn-info pull-left"><span class="glyphicon glyphicon-pencil"></span> Edit</a>&nbsp;&nbsp;
                    <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#confirm-delete" id='.$model->id.'><span class="glyphicon glyphicon-trash"></span> Delete</a>';
        })
        ->make();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $permission_role   = PermissionRole::find($id);
        $list_roles = $permission_role->listRoles();
        $list_permissions = $permission_role->listPermissions();
        $action = 'admin.permissionroles.update';
        return View('admin.permissionroles.edit', compact('permission_role','list_roles','list_permissions', 'route'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(PermissionRoleRequest $request, $id)
    {
        $input  = $request->all();
        $permission_role   = PermissionRole::find($id);
        $permission_role->update($input);
        Session::flash('flash_message', 'Permission assignment successfully updated!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        PermissionRole::find($id)->delete();
        Session::flash('flash_message', 'Permission assignment successfully deleted!');
    }
}
