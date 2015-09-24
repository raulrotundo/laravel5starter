<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
		    [	
		    	'name' => 'Raul Rotundo',
		    	'email'=>'rrotundo@albortech.com',
		    	'address'=>'San Martin 991',
		    	'phone'=>'1537711976',
		    	'zipcode'=>'1004',
		    	'city'=>'Buenos Aires',
		    	'country_id'=>1,
		    	'password'=>bcrypt('secret'),
		    	'remember_token'=>str_random(10),
		    	'active'=>1,
		    	'created_at' => new \Carbon\Carbon(),
            	'updated_at' => new \Carbon\Carbon(),
	    	],
			[	
		    	'name' => 'Leonardo Rotundo',
		    	'email'=>'lrotundo@albortech.com',
		    	'address'=>'San Martin 991',
		    	'phone'=>'1537711976',
		    	'zipcode'=>'1004',
		    	'city'=>'Buenos Aires',
		    	'country_id'=>1,
		    	'password'=>bcrypt('secret'),
		    	'remember_token'=>str_random(10),
		    	'active'=>1,
		    	'created_at' => new \Carbon\Carbon(),
            	'updated_at' => new \Carbon\Carbon(),
	    	],
	    	[	
		    	'name' => 'Marcos Colina',
		    	'email'=>'mcolina@albortech.com',
		    	'address'=>'San Martin 991',
		    	'phone'=>'1537711976',
		    	'zipcode'=>'1004',
		    	'city'=>'Buenos Aires',
		    	'country_id'=>1,
		    	'password'=>bcrypt('secret'),
		    	'remember_token'=>str_random(10),
		    	'active'=>1,
		    	'created_at' => new \Carbon\Carbon(),
            	'updated_at' => new \Carbon\Carbon(),
	    	],
    	]);
    }
}
