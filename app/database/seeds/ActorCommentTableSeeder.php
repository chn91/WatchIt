<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ActorCommentTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

        $users  = User::lists('id');
        $actors = Actor::lists('id');

		foreach(range(1, 1000) as $index)
		{
			DB::insert("INSERT INTO actor_comment (user_id, actor_id, comment, created_at, updated_at) VALUES
                      (?, ?, ?, NOW(), NOW())", [
                $faker->randomElement($users),
                $faker->randomElement($actors),
                $faker->paragraph(),
            ]);
		}
	}

}