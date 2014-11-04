<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class MovieLikesTableSeeder extends Seeder {

	public function run()
	{
        $faker = Faker::create();

        $users  = User::lists('id');
        $movies = Movie::lists('id');

        foreach(range(1, 5000) as $index)
        {
            $val = $faker->boolean() ? 1 : $faker->boolean() ? 1 : -1;

            DB::insert("INSERT INTO movie_likes (user_id, movie_id, `like`, created_at, updated_at) VALUES
                      (?, ?, ?, NOW(), NOW())", [
                $faker->randomElement($users),
                $faker->randomElement($movies),
                $val,
            ]);
        }
	}

}