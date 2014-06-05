<?php namespace CNESmeteo\User\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateCountriesTable extends Migration
{

    public function up()
    {
        Schema::create('cnesmeteo_user_countries', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->boolean('enabled')->default(false);
            $table->string('name')->index();
            $table->string('code');
        });
    }

    public function down()
    {
        Schema::drop('cnesmeteo_user_countries');
    }

}
