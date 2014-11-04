<?php

use Faker\Factory as Faker;

class WatchedTableSeeder extends Seeder {

	public function run()
	{
        $faker = Faker::create();

        $users  = User::lists('id');
        $movies = Actor::lists('id');

        foreach(range(1, 10000) as $index)
        {
            DB::insert("INSERT INTO watched (user_id, movie_id, created_at, updated_at) VALUES
                      (?, ?, NOW(), NOW())", [
                $faker->randomElement($users),
                $faker->randomElement($movies),
            ]);
        }
	}

}