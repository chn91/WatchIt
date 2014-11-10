<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ActorMovieTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10000) as $index)
		{
            $movies = Movie::lists('id');
            $actors = Actor::lists('id');

            DB::insert('INSERT INTO `actor_movie` (`movie_id`, `actor_id`, `role`, `created_at`, `updated_at`) VALUES(?, ?, ?, NOW(), NOW())', [
                $faker->randomElement($movies),
                $faker->randomElement($actors),
                $faker->word()
            ]);
		}
	}

}