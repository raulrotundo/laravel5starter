<?php
//Home Front-end route
Route::group(['namespace' => 'Frontend'], function(){
	Route::get('/', ['uses' => 'HomeController@index']);
});

//Redirect Login route
Route::get(config('admin.prefix'), function () {
    return redirect('login');
});

// Backend routes
Route::group(['prefix' => config('admin.prefix'), 'middleware' => ['auth']], function() {
	Route::group(['namespace' => 'Admin\Auth'], function(){
		Route::get('logout', ['as' => 'admin.logout', 'uses' => 'AuthController@getLogout']);		
	});

	Route::group(['namespace' => 'Admin','middleware' => ['acl']], function(){
		//DashBoard routes
		Route::get('/', 'DashboardController@index');

		Route::group(['namespace' => 'Auth'], function(){
			//Roles routes
			Route::resource('roles', 'RoleController', [
		        'names' => [
		            'index' => 'admin.roles.index',
		            'create' => 'admin.roles.create',
		            'store' => 'admin.roles.store',
		            'show' => 'admin.roles.show',
		            'update' => 'admin.roles.update',
		            'edit' => 'admin.roles.edit',
		            'destroy' => 'admin.roles.destroy',
		        ],
		    ]);
		    Route::get('roles_show', array('as' => 'show', 'uses' => 'RoleController@show'));
			//permissions routes
			Route::resource('permissions', 'PermissionController', [
		        'names' => [
		            'index' => 'admin.permissions.index',
		            'create' => 'admin.permissions.create',
		            'store' => 'admin.permissions.store',
		            'show' => 'admin.permissions.show',
		            'update' => 'admin.permissions.update',
		            'edit' => 'admin.permissions.edit',
		            'destroy' => 'admin.permissions.destroy',
		        ],
		    ]);
		    Route::get('permissions_show', array('as' => 'show', 'uses' => 'PermissionController@show'));
		    //User routes
			Route::resource('users', 'UserController', [
		        'names' => [
		            'index' => 'admin.users.index',
		            'create' => 'admin.users.create',
		            'store' => 'admin.users.store',
		            'show' => 'admin.users.show',
		            'update' => 'admin.users.update',
		            'edit' => 'admin.users.edit',
		            'destroy' => 'admin.users.destroy',
		        ],
		    ]);
		    Route::get('users_show', array('as' => 'show', 'uses' => 'UserController@show'));
	    });
	});
});

Route::group(['namespace' => 'Admin\Auth'], function(){

	// Registration routes	
	Route::get('register', 'AuthController@getRegister');
	Route::post('register', 'AuthController@postRegister');

	// Authentication routes
	Route::get('login', 'AuthController@getLogin');
	Route::post('login', 'AuthController@postLogin');

	//Social authentication routes
	Route::get('login/{provider?}', 'AuthController@getSocialAuth');
    Route::get('login/callback/{provider?}', 'AuthController@getSocialAuthCallback');

	Route::group(['middleware' => ['guest']], function() {
		// Password reset link request routes only as Guest
		Route::get('password/email', 'PasswordController@getEmail');
		Route::post('password/email', 'PasswordController@postEmail');

		// Password reset routes only as Guest
		Route::get('password/reset/{token}', 'PasswordController@getReset');
		Route::post('password/reset', 'PasswordController@postReset');
	});	
});