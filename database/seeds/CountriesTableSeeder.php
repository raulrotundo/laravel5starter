<?php

use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->insert([
		    [	
		    	'name' => 'Argentina',
		    	'currency_id' => 1,
		    	'iso_code' => 'ARS',
		    	'call_prefix' => '54',
		    	'active' => 1,
	    	],
			[	
		    	'name' => 'Brazil',
		    	'currency_id' => 2,
		    	'iso_code' => 'USD',
		    	'call_prefix' => '55',
		    	'active' => 1,
	    	],
	    	[	
		    	'name' => 'Canada',
		    	'currency_id' => 2,
		    	'iso_code' => 'USD',
		    	'call_prefix' => '99',
		    	'active' => 1,
	    	],
	    	[	
		    	'name' => 'Dinamarca',
		    	'currency_id' => 3,
		    	'iso_code' => 'EUR',
		    	'call_prefix' => '12',
		    	'active' => 1,
	    	],
	    	[	
		    	'name' => 'Venezuela',
		    	'currency_id' => 4,
		    	'iso_code' => 'VEF',
		    	'call_prefix' => '58',
		    	'active' => 1,
	    	],
    	]);
    }
}
