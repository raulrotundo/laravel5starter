<?php
namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Http\Request;

use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use App\Models\Admin\User;
use App\Models\Admin\Role;
use App\Models\Admin\Countries;
use Session;
use Datatable;
use URL;
use Image;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $route  = URL::route('admin.users.index');
        return view('admin.users.index',compact('route'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $user      = new User;
        $route     = 'admin.users.store';
        $countries = [''=>'Select a Country'];
        $countries = array_merge($countries,Countries::all()->lists('name','id')->toArray());
        $roles     = Role::all()->toArray();
        $role_user = array();
        $col_md = (count($roles) >= 4 ? '3' : '4'); //Number of columns depending of roles
        
        return View('admin.users.create')->with(compact('user', 'route', 'countries', 'roles', 'role_user', 'col_md'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(UserRequest $request)
    {
        $input = $request->all();        
        $user  = User::create($input); //Create user
        
        if (isset($input['roles']))
            $user->roles()->sync($input['roles']); //Assign roles to user

        //Upload avatar picture
        if (isset($input['avatar'])) {
            $file = $input['avatar'];
            $filename = '';
            
            $upload_dir = Config::get('images.paths.input');

            // Get the width and the height of the chosen size from the Config file.
            $images_sizes = Config::get('images.sizes.'.'small');
            $width = $images_sizes['width'];
            $height = $images_sizes['height'];

            $file->move($upload_dir, $file->getClientOriginalName());

            $image = Image::make(sprintf($upload_dir.'/%s', $file->getClientOriginalName()))->resize($width, $height)->save();
        }
        Session::flash('flash_message', 'User successfully added!');
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

        return Datatable::collection(User::all())
        ->showColumns('id','name','email','active')
        ->searchColumns('id','name','email','active')
        ->orderColumns('id','name','email','active')
        ->addColumn('active',function($model){
            return ($model->active == 1 ? '<p class="text-green">Enable</p>' : '<p class="text-red">Disable</p>');
        })
        ->addColumn('Actions',function($model){
            return '<a href="users/'.$model->id.'/edit" class="btn btn-info pull-left"><span class="glyphicon glyphicon-pencil"></span> Edit</a>&nbsp;&nbsp;
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
        $user      = User::find($id);
        $action    = 'admin.users.update';
        $countries = [''=>'Select a Country'];
        $countries = array_merge($countries,Countries::all()->lists('name','id')->toArray());        
        $roles     = Role::all()->toArray();
        $role_user_array = $user->roles->toArray();
        $col_md = (count($roles) >= 4 ? '3' : '4'); //Number of columns depending of roles
        
        //Save only the user role id
        foreach ($role_user_array as $key => $value) {
            $role_user[] = $value['id'];
        }

        return View('admin.users.edit', compact('user','action','countries', 'roles', 'role_user', 'col_md'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(UserRequest $request, $id)
    {
        $user   = User::find($id);
        $input  = $request->all();
        //If active is not present, then disable to the user
        if (!isset($input['active'])){
            $input['active'] = 0;
        }
        $user->update($input);
        $user->roles()->sync($input['roles']); //Assign roles to user
        Session::flash('flash_message', 'User successfully updated!');
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
        User::find($id)->delete();
        Session::flash('flash_message', 'Role successfully deleted!');
    }
}
