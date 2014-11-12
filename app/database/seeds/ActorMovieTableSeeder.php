<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ActorMovieTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

        $sumActor = DB::select('SELECT COUNT(*) as sum FROM actors');
        $maxActor = $sumActor[0]->sum;

        $sumMovie = DB::select('SELECT COUNT(*) as sum FROM movies');
        $maxMovie = $sumMovie[0]->sum;

		foreach(range(1, 1000000) as $index)
		{
            DB::insert('INSERT INTO `actor_movie` (`movie_id`, `actor_id`, `role`, `created_at`, `updated_at`) VALUES(?, ?, ?, NOW(), NOW())', [
                $faker->numberBetween(1, $maxMovie),
                $faker->numberBetween(1, $maxActor),
                $faker->word()
            ]);
		}
	}

}