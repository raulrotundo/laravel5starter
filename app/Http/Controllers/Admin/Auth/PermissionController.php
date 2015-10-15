<?php
namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Http\Request;

use App\Http\Requests\PermissionRequest;
use App\Http\Controllers\Controller;
use App\Models\Admin\Permission;
use Session;
use Datatable;
use URL;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $permission   = Permission::all();
        $route  = URL::route('admin.permissions.index');
        return view('admin.permissions.index',compact('permission', 'route'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $permission   = new Permission;
        $list_roles = $permission->listRoles();
        $assg_roles = $permission->listRolesAssigned();
        $route  = 'admin.permissions.store';
        return View('admin.permissions.create')->with(compact('permission', 'list_roles', 'assg_roles', 'route'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(PermissionRequest $request)
    {
        $input = $request->all();
        $permission = Permission::create($input);

        //Assign permissions to roles
        if (isset($input['roles_assg'])){
            $permission->roles()->sync($input['roles_assg']);
        }

        Session::flash('flash_message', trans('admin/permissions.form.create_confirm'));
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

        return Datatable::collection(Permission::all())
        ->showColumns('id','permission_title', 'permission_slug')
        ->searchColumns('id','permission_title', 'permission_slug')
        ->orderColumns('id','permission_title', 'permission_slug')
        ->addColumn('Actions',function($model){
            return '<a href="permissions/'.$model->id.'/edit" class="btn btn-info pull-left"><span class="glyphicon glyphicon-pencil"></span> '.trans('admin/permissions.show.edit').'</a>&nbsp;&nbsp;
                    <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#confirm-delete" id='.$model->id.'><span class="glyphicon glyphicon-trash"></span> '.trans('admin/permissions.show.delete').'</a>';
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
        $permission   = Permission::find($id);
        $list_roles = $permission->listRoles();
        $assg_roles = $permission->listRolesAssigned();
        $action = 'admin.permissions.update';
        return View('admin.permissions.edit', compact('permission','list_roles','assg_roles','action'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(PermissionRequest $request, $id)
    {
        $input = $request->all();
        $permission = Permission::find($id);
        $permission->update($input);

        //Assign permissions to roles
        if (isset($input['roles_assg'])){
            $permission->roles()->sync($input['roles_assg']);
        }else{
            $permission->roles()->sync([]);
        }

        Session::flash('flash_message', trans('admin/permissions.form.update_confirm'));
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
        Permission::find($id)->delete();
        Session::flash('flash_message', trans('admin/permissions.form.delete_confirm'));
    }
}
