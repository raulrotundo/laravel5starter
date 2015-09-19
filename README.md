# Laravel Framework 5.1  Bootstrap 3 Starter Site

Laravel Framework 5 Bootstrap 3 Starter Site is a basic application with Back-End and Front-End System

## Starter Site Features:
* Laravel 5.2.x
* Twitter Bootstrap 3.x
* Back-end
	* Automatic install and setup website.
	* User management.
    * DataTables dynamic table sorting and filtering.
    * Soon will be more...
* Front-end
	* User login, registration
	* soon will be more...
* Packages included:
	* Datatables Bundle

-----
##Requirements

	PHP >= 5.5.9
	SQL server(for example MySQL)
	Composer

-----
##How to install:
* [Step 1: Get the code](#step1)
* [Step 2: Use Composer to install dependencies](#step2)
* [Step 3: Create database](#step3)
* [Step 4: Install](#step4)
* [Step 5: Start Page](#step5)

-----
<a name="step1"></a>
### Step 1: Get the code - Download or Clone the repository
	
    https://github.com/raulrotundo/laravel5starter.git

Extract it in www (or htdocs if you using XAMPP) folder and put it for example in laravel5starter folder.

-----
<a name="step2"></a>
### Step 2: Use Composer to install dependencies

Laravel utilizes [Composer](http://getcomposer.org/) to manage its dependencies. First, download a copy of the composer.phar.
Once you have the PHAR archive, you can either keep it in your local project directory or move to
usr/local/bin to use it globally on your system.
On Windows, you can use the Composer [Windows installer](https://getcomposer.org/Composer-Setup.exe).

Then run:

    composer install

to install dependencies Laravel and other packages.

-----
<a name="step3"></a>
### Step 3: Create database

If you finished first three steps, now you can create database on your database server(MySQL). You must create database with utf-8 collation(uft8_general_ci), to install and application work perfectly.
After that, copy .env.example and rename it as .env and put connection and change default database connection name, only database connection, put name database, database username and password.

-----
<a name="step4"></a>
### Step 4: Install

You need to create a database configuration, use this command:

    php artisan migrate

And to initial populate database use this:

    php artisan db:seed

In order to avoid some problems with permissions, change your permission files to 775, for example:

	sudo chmod 775 -Rf /var/www/laravel5starter

If you install on your localhost in folder laravel5startersite, you can type on web browser:

	http://localhost/laravel5starter/

-----
<a name="step5"></a>
### Step 5: Start Page

You can now login to admin part of Laravel Framework 5 Bootstrap 3 Starter Site:

(http://localhost/laravel5starter/login)

Administrator role:

    username: rrotundo@albortech.com
    password: secret

Company role:

    username: lrotundo@albortech.com
    password: secret

Client role:    

	username: mcolina@albortech.com
    password: secret

-----
## Troubleshooting

### RuntimeException : No supported encrypter found. The cipher and / or key length are invalid.

    php artisan key:generate

### Site loading very slow

	composer dump-autoload --optimize
OR

    php artisan dump-autoload

-----
## License

This is free software distributed under the terms of the MIT license

-----
## Additional information

This is for a large web-wide project which currently is under construction, all those people who has interested to participate are welcome, you could contact me at:

Personal E-mail: raulrotundo@gmail.com
Work E-mail: rrotundo@albortech.com

Or you can visit my website [Alboretch.com](http://www.alboretch.com), We are a team of professionals with experience in design and development of large projects.