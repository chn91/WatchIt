<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

	public function run()
	{
        echo "# SEEDING FOR USERS\n";

        $start = time();


        $faker = Faker::create();
        $users = [];

        $pwd = Hash::make('abc123');

		foreach(range(1000001, 2000000) as $index)
		{
            $timestamp = Carbon\Carbon::now();
            $users[] = [
                'fName' => $faker->firstName,
                'lName' => $faker->lastName,
                'email' => $index . $faker->email,
                'password' => $pwd,
                'created_at'    => $timestamp,
                'updated_at'    => $timestamp
            ];

            if ($index % 1000 === 0) {
                echo "  - Seeded: " . $index . "\n";
                $this->seed($users);
                $users = [];
            }
		}

        $finish = time();
        $total = $finish - $start;
        echo "# SEEDING FOR USERS ENDED: " . ($total) . " seconds (~". ((int) ($total / 60)) ." minutes)...\n";

    }

    public function seed($users) {
        foreach (array_chunk($users, 500) as $chunk) {
            User::insert($chunk);
        }
    }

}