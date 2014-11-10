<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ActorLikesTableSeeder extends Seeder {

	public function run()
	{
        $faker = Faker::create();

        $users  = User::lists('id');
        $actors = Actor::lists('id');

        foreach(range(1, 1000) as $index)
        {
            $val = $faker->boolean() ? 1 : $faker->boolean() ? 1 : -1;

            DB::insert("INSERT INTO actor_likes (user_id, actor_id, `like`, created_at, updated_at) VALUES
                      (?, ?, ?, NOW(), NOW())", [
                $faker->randomElement($users),
                $faker->randomElement($actors),
                $val,
            ]);
        }
	}

}