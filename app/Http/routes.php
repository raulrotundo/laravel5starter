<?php
//Home Front-end route
Route::group(['namespace' => 'Frontend'], function(){
	Route::get('/', ['uses' => 'HomeController@index']);
});

Route::get('lang/{lang}', ['as'=>'lang.switch', 'uses'=>'LanguageController@switchLang']);

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
		    Route::resource('roles', 'RoleController');
		    Route::get('roles_show', array('as' => 'show', 'uses' => 'RoleController@show'));
		    
			//permissions routes
		    Route::resource('permissions', 'PermissionController');
		    Route::get('permissions_show', array('as' => 'show', 'uses' => 'PermissionController@show'));

		    //User routes
		    Route::resource('users', 'UserController');
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