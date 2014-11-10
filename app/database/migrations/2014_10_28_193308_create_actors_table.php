<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateActorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('actors', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('fName');
            $table->string('lName');
            $table->text('bio')->nullable();
            $table->date('birthday')->nullable();
            $table->date('deathday')->nullable();
            $table->string('image')->nullable();
            $table->integer('moviedb_id')->unsigned();
            $table->string('imdb_id')->nullable();
            $table->integer('nationality_id')->unsigned();
            $table->foreign('nationality_id')->references('id')->on('nationalities');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('actors');
	}

}
