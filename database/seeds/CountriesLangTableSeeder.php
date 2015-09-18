<?php

use Illuminate\Database\Seeder;

class CountriesLangTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries_lang')->insert([
		    [	
		    	'country_id' => 1,
		    	'lang_id' => 1,
	    	]
    	]);
    }
}
