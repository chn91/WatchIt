<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDirectorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('directors', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('fName');
            $table->string('lName');
            $table->boolean('gender'); # 1 = Male, 0 = Female
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
		Schema::drop('directors');
	}

}
