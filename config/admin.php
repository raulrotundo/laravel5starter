<?php
return [
	/*
    |--------------------------------------------------------------------------
    | Administrator Prefix URL 
    |--------------------------------------------------------------------------
    |
    | By default admin prefix URL is admin. If you want to change the prefix URL. 
    | You can publish the configuration file of this package and change the prefix 
    | URL by updating prefix value in that file.
    |
    */
    'prefix' => 'admin',
    'filter' => [
        'auth' => [
            App\Http\Middleware\Authenticate::class,
            App\Http\Middleware\CheckPermission::class,
        ],
        'guest' => App\Http\Middleware\RedirectIfAuthenticated::class,
    ],
];