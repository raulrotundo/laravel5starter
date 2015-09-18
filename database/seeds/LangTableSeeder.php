<?php

use Illuminate\Database\Seeder;

class LangTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lang')->insert([
            [   
                'name' => 'Español',
                'active' => 1,
                'iso_code' => 'es',
                'lang_code' => 'es-es',
                'date_format_lite' => 'd/m/Y',
                'date_format_full' => 'd/m/Y H:i:s'
            ],
		    [	
		    	'name' => 'English',
		    	'active' => 0,
		    	'iso_code' => 'en',
		    	'lang_code' => 'en-us',
		    	'date_format_lite' => 'd/m/Y',
		    	'date_format_full' => 'd/m/Y H:i:s'
	    	],
    	]);
    }
}
