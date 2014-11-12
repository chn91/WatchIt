<?php

use Faker\Factory as Faker;

class WatchedTableSeeder extends Seeder {

	public function run()
	{
        $faker = Faker::create();

        $sumUsers = DB::select('SELECT COUNT(*) as sum FROM users');
        $maxUsers = $sumUsers[0]->sum;

        $sumMovie = DB::select('SELECT COUNT(*) as sum FROM movies');
        $maxMovie = $sumMovie[0]->sum;

        foreach(range(1, 1000000) as $index)
        {
            DB::insert("INSERT INTO watched (user_id, movie_id, created_at, updated_at) VALUES
                      (?, ?, NOW(), NOW())", [
                $faker->numberBetween(1, $maxUsers),
                $faker->numberBetween(1, $maxMovie),
            ]);
        }
	}

}