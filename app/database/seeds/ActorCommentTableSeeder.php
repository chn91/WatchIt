<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ActorCommentTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

        $sumUsers = DB::select('SELECT COUNT(*) as sum FROM users');
        $maxUsers = $sumUsers[0]->sum;

        $sumActor = DB::select('SELECT COUNT(*) as sum FROM actors');
        $maxActor = $sumActor[0]->sum;

		foreach(range(1, 1000000) as $index)
		{
			DB::insert("INSERT INTO actor_comment (user_id, actor_id, comment, created_at, updated_at) VALUES
                      (?, ?, ?, NOW(), NOW())", [
                $faker->numberBetween(1, $maxUsers),
                $faker->numberBetween(1, $maxActor),
                $faker->paragraph(),
            ]);
		}
	}

}