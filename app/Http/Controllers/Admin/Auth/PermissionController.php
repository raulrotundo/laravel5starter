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
        $route  = 'admin.permissions.store';
        return View('admin.permissions.create')->with(compact('permission', 'route'));
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

        Permission::create($input);
        Session::flash('flash_message', 'Permission successfully added!');
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
            return '<a href="permissions/'.$model->id.'/edit" class="btn btn-info pull-left"><span class="glyphicon glyphicon-pencil"></span> Edit</a>&nbsp;&nbsp;
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
        $permission   = Permission::find($id);
        $action = 'admin.permissions.update';
        return View('admin.permissions.edit', compact('permission','action'));
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
        $input  = $request->all();
        $permission   = Permission::find($id);
        $permission->update($input);
        Session::flash('flash_message', 'Permission successfully updated!');
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
        Session::flash('flash_message', 'Permission successfully deleted!');
    }
}
