<?php

use Faker\Factory as Faker;

class WatchedTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 100) as $index)
		{
			Watched::create([

			]);
		}
	}

}