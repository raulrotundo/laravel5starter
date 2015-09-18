<?php
namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Http\Request;

use App\Http\Requests\RoleRequest;
use App\Http\Controllers\Controller;
use App\Models\Admin\Role;
use Session;
use Datatable;
use URL;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $role   = Role::all();
        $route  = URL::route('admin.roles.index');
        return view('admin.roles.index',compact('role', 'route'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $role   = new Role;
        $route  = 'admin.roles.store';
        return View('admin.roles.create')->with(compact('role', 'route'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(RoleRequest $request)
    {
        $input = $request->all();

        Role::create($input);
        Session::flash('flash_message', 'Role successfully added!');
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

        return Datatable::collection(Role::all())
        ->showColumns('id','role_title', 'role_slug')
        ->searchColumns('id','role_title', 'role_slug')
        ->orderColumns('id','role_title', 'role_slug')
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
        $role   = Role::find($id);
        $action = 'admin.roles.update';
        return View('admin.roles.edit', compact('role','action'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(RoleRequest $request, $id)
    {
        $input  = $request->all();
        $role   = Role::find($id);
        $role->update($input);
        Session::flash('flash_message', 'Role successfully updated!');
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
        Role::find($id)->delete();
        Session::flash('flash_message', 'Role successfully deleted!');
    }
}
