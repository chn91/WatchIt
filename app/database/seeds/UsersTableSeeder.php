<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 100000) as $index)
		{
			User::create([
                'fName' => $faker->firstName,
                'lName' => $faker->lastName,
                'email' => $index . $faker->email,
                'password' => Hash::make('abc123')
			]);
		}
	}

}