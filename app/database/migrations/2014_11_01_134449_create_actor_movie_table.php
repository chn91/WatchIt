<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateActorMovieTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('actor_movie', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('actor_id')->unsigned()->index();
			$table->foreign('actor_id')->references('id')->on('actors')->onDelete('cascade');
			$table->integer('movie_id')->unsigned()->index();
			$table->foreign('movie_id')->references('id')->on('movies')->onDelete('cascade');
            $table->string('role')->nullable();
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
		Schema::drop('actor_movie');
	}

}
