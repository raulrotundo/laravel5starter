<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lang', function(Blueprint $table)
        {
            $table->increments('id')->unsigned();
            $table->string('name');
            $table->integer('active');
            $table->string('iso_code');
            $table->string('lang_code');
            $table->string('date_format_lite');
            $table->string('date_format_full');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('lang');
    }
}
