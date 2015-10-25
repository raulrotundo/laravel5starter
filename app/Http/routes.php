<?php
//Home Front-end route
Route::group(['namespace' => 'Frontend'], function(){
	Route::get('/', ['uses' => 'HomeController@index']);
});

#Switch Language
Route::get('lang/{lang}', ['as'=>'lang.switch', 'uses'=>'LanguageController@switchLang']);
#Datatables Language
Route::get('datatable_lang', ['as'=>'lang.datatable', 'uses'=>'LanguageController@DataTableLang']);

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

		    //Profile routes
		    Route::get('profile',                    array( 'as' => 'admin.profile.index',           'uses' => 'ProfileController@index'));
		    Route::get('profile/edit',               array( 'as' => 'admin.profile.edit',            'uses' => 'ProfileController@edit'));
		    Route::get('profile/editAvatar',         array( 'as' => 'admin.profile.editAvatar',      'uses' => 'ProfileController@editAvatar'));
		    Route::put('profile/update/info/{user}', array( 'as' => 'admin.profile.updateInfo',      'uses' => 'ProfileController@updateInfo'));
		    Route::put('profile/update/security',    array( 'as' => 'admin.profile.updateSecurity',  'uses' => 'ProfileController@updateSecurity'));
		    Route::put('profile/update/privacity',   array( 'as' => 'admin.profile.updatePrivacity', 'uses' => 'ProfileController@updatePrivacity'));
		    Route::put('profile/update/avatar',      array( 'as' => 'admin.profile.updateAvatar',    'uses' => 'ProfileController@updateAvatar'));
		    Route::get('profile/verify_email/{confirmationCode}', 'ProfileController@confirmEmailRegistration');
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

		// Verification code registration
		Route::get('register/verify/{confirmationCode}', 'AuthController@confirmRegistration');
	});	
});

//APIs routes
Route::group(['prefix' => 'api', 'namespace' => 'Api'], function(){
	Route::get('index', 'TestController@index');
});