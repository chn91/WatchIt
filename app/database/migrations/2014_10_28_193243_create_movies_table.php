<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMoviesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('movies', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('title');
            $table->string('original_title')->nullable();
            $table->text('resume')->nullable();
            $table->integer('length')->nullable();
            $table->date('release')->nullable();
            $table->boolean('released');
            $table->string('cover')->nullable();
            $table->integer('moviedb_id')->unsigned();
            $table->string('imdb_id')->nullable();
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
		Schema::drop('movies');
	}

}
