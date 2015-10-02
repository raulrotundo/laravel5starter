<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
        	[
		    	'permission_title' => 'Dashboard',
		    	'permission_slug' => 'App\Http\Controllers\Admin\DashboardController@index', 
		    	'permission_description'=>'Dashboard Page',
	    	],
		    [
		    	'permission_title' => 'Index Roles',
		    	'permission_slug' => 'App\Http\Controllers\Admin\Auth\RoleController@index', 
		    	'permission_description'=>'List all records',
	    	],
	    	[
		    	'permission_title' => 'Create Roles',
		    	'permission_slug' => 'App\Http\Controllers\Admin\Auth\RoleController@create', 
		    	'permission_description'=>'Create Roles',
	    	],
	    	[
		    	'permission_title' => 'Save Roles',
		    	'permission_slug' => 'App\Http\Controllers\Admin\Auth\RoleController@store', 
		    	'permission_description'=>'Save roles',
	    	],
	    	[
		    	'permission_title' => 'Show Roles',
		    	'permission_slug' => 'App\Http\Controllers\Admin\Auth\RoleController@show', 
		    	'permission_description'=>'Show roles',
	    	],
	    	[
		    	'permission_title' => 'Edit Roles',
		    	'permission_slug' => 'App\Http\Controllers\Admin\Auth\RoleController@edit', 
		    	'permission_description'=>'Edit Roles',
	    	],
	    	[
		    	'permission_title' => 'Update Roles',
		    	'permission_slug' => 'App\Http\Controllers\Admin\Auth\RoleController@update', 
		    	'permission_description'=>'Update Roles',
	    	],
	    	[
		    	'permission_title' => 'Delete Roles',
		    	'permission_slug' => 'App\Http\Controllers\Admin\Auth\RoleController@destroy', 
		    	'permission_description'=>'Delete Roles',
	    	],
	    	[
		    	'permission_title' => 'Index Permissions',
		    	'permission_slug' => 'App\\Http\\Controllers\\Admin\\Auth\\PermissionController@index', 
		    	'permission_description'=>'List all records',
	    	],
	    	[
		    	'permission_title' => 'Create Permissions',
		    	'permission_slug' => 'App\\Http\\Controllers\\Admin\\Auth\\PermissionController@create', 
		    	'permission_description'=>'Create Permissions',
	    	],
	    	[
		    	'permission_title' => 'Save Permissions',
		    	'permission_slug' => 'App\\Http\\Controllers\\Admin\\Auth\\PermissionController@store', 
		    	'permission_description'=>'Save Permissions',
	    	],
	    	[
		    	'permission_title' => 'Show Permissions',
		    	'permission_slug' => 'App\\Http\\Controllers\\Admin\\Auth\\PermissionController@show', 
		    	'permission_description'=>'Show Permissions',
	    	],
	    	[
		    	'permission_title' => 'Edit Permissions',
		    	'permission_slug' => 'App\\Http\\Controllers\\Admin\\Auth\\PermissionController@edit', 
		    	'permission_description'=>'Edit Permissions',
	    	],
	    	[
		    	'permission_title' => 'Update Permissions',
		    	'permission_slug' => 'App\\Http\\Controllers\\Admin\\Auth\\PermissionController@update', 
		    	'permission_description'=>'Update Permissions',
	    	],
	    	[
		    	'permission_title' => 'Delete Permissions',
		    	'permission_slug' => 'App\\Http\\Controllers\\Admin\\Auth\\PermissionController@destroy', 
		    	'permission_description'=>'Delete Permissions',
	    	],
	    	[
		    	'permission_title' => 'Index Users',
		    	'permission_slug' => 'App\\Http\\Controllers\\Admin\\Auth\\UserController@index', 
		    	'permission_description'=>'List all records',
	    	],
	    	[
		    	'permission_title' => 'Create Users',
		    	'permission_slug' => 'App\\Http\\Controllers\\Admin\\Auth\\UserController@create', 
		    	'permission_description'=>'Create Users',
	    	],
	    	[
		    	'permission_title' => 'Save Users',
		    	'permission_slug' => 'App\\Http\\Controllers\\Admin\\Auth\\UserController@store', 
		    	'permission_description'=>'Save Users',
	    	],
	    	[
		    	'permission_title' => 'Show Users',
		    	'permission_slug' => 'App\\Http\\Controllers\\Admin\\Auth\\UserController@show', 
		    	'permission_description'=>'Show Users',
	    	],
	    	[
		    	'permission_title' => 'Edit Users',
		    	'permission_slug' => 'App\\Http\\Controllers\\Admin\\Auth\\UserController@edit', 
		    	'permission_description'=>'Edit Users',
	    	],
	    	[
		    	'permission_title' => 'Update Users',
		    	'permission_slug' => 'App\\Http\\Controllers\\Admin\\Auth\\UserController@update', 
		    	'permission_description'=>'Update Users',
	    	],
	    	[
		    	'permission_title' => 'Delete Users',
		    	'permission_slug' => 'App\\Http\\Controllers\\Admin\\Auth\\UserController@destroy', 
		    	'permission_description'=>'Delete Users',
	    	]
    	]);
    }
}
