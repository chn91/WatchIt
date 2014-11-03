<?php

class MoviesTableSeeder extends Seeder {

	public function run()
	{
		foreach(range(1, 10) as $index)
		{
			Movie::create([

			]);
		}
	}

}