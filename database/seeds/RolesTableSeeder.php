<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('roles')->delete();
    	
        DB::table('roles')->insert([
		    [
		    	'role_title' => 'Administrator',
		    	'role_slug' => 'admin', 
		    	'description'=>'The Administrator user has ilimited access to the platform',
            	'created_at' => new \Carbon\Carbon(),
            	'updated_at' => new \Carbon\Carbon(),
	    	],
	    	[
		    	'role_title' => 'Company',
		    	'role_slug' => 'company', 
		    	'description'=>'The Company user has only access to their own company',
            	'created_at' => new \Carbon\Carbon(),
            	'updated_at' => new \Carbon\Carbon(),
	    	],
	    	[
		    	'role_title' => 'Client',
		    	'role_slug' => 'client', 
		    	'description'=>'The Client user has only access to their own projects assigned by companies',
            	'created_at' => new \Carbon\Carbon(),
            	'updated_at' => new \Carbon\Carbon(),
	    	],
    	]);
    }
}
