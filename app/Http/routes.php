<?php
//Home Front-end route
Route::group(['namespace' => 'Frontend'], function(){
	Route::get('/', ['uses' => 'HomeController@index']);
	Route::get('register', 'HomeController@registerPage');
	Route::get('register/client', 'HomeController@registerClientForm');
	Route::get('register/company', 'HomeController@registerCompanyForm');
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
		    Route::get('show', array('as' => 'show', 'uses' => 'RoleController@show'));
	    });
	});
});

Route::group(['namespace' => 'Admin\Auth'], function(){

	// Registration routes	
	Route::post('register/registration', 'AuthController@postRegister');

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