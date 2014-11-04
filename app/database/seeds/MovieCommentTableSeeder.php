<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class MovieCommentTableSeeder extends Seeder {

	public function run()
	{
        $faker = Faker::create();

        $users  = User::lists('id');
        $movies = Movie::lists('id');

        foreach(range(1, 1000) as $index)
        {
            DB::insert("INSERT INTO movie_comment (user_id, movie_id, comment, created_at, updated_at) VALUES
                      (?, ?, ?, NOW(), NOW())", [
                $faker->randomElement($users),
                $faker->randomElement($movies),
                $faker->paragraph(),
            ]);
        }
	}

}