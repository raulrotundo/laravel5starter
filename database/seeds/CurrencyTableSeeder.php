<?php

use Illuminate\Database\Seeder;

class CurrencyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('currency')->insert([		    
			[	
		    	'name' => 'Argentine Peso',
		    	'iso_code' => 'ARS',
	    	],
	    	[	
		    	'name' => 'US Dolar',
		    	'iso_code' => 'USD',
	    	],
	    	[	
		    	'name' => 'Euro',
		    	'iso_code' => 'EUR',
	    	],
	    	[	
		    	'name' => 'Bolivar',
		    	'iso_code' => 'VEF',
	    	],
    	]);
    }
}
