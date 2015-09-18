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
	    	]
    	]);
    }
}
