<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class MovieLikesTableSeeder extends Seeder {

	public function run()
	{
        $faker = Faker::create();

        $sumUsers = DB::select('SELECT COUNT(*) as sum FROM users');
        $maxUsers = $sumUsers[0]->sum;

        $sumMovie = DB::select('SELECT COUNT(*) as sum FROM movies');
        $maxMovie = $sumMovie[0]->sum;

        foreach(range(1, 1000000) as $index)
        {
            $val = $faker->boolean() ? 1 : $faker->boolean() ? 1 : -1;

            DB::insert("INSERT INTO movie_likes (user_id, movie_id, `like`, created_at, updated_at) VALUES
                      (?, ?, ?, NOW(), NOW())", [
                $faker->numberBetween(1, $maxUsers),
                $faker->numberBetween(1, $maxMovie),
                $val,
            ]);
        }
	}

}