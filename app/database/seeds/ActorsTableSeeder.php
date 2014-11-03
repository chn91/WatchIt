<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ActorsTableSeeder extends Seeder {

	public function run()
	{
        $faker = Faker::create();

        # 1379622
        foreach(range(1000, 1050) as $index) # Last index of person 1. nov 2014
        {
            $content = file_get_contents('http://api.themoviedb.org/3/person/' . $index . '?api_key=' . getenv('MOVIE_API'),
                false,
                stream_context_create(
                    array(
                        'http' => array(
                            'ignore_errors' => true
                        )
                    )
                ));

            $json = \GuzzleHttp\json_decode($content);

            if (property_exists($json, 'name')) {

                $pob = strtolower($json->place_of_birth);
                switch ($pob) {
                    case (strpos($pob, 'usa') !== FALSE);
                        $nationality = 4;
                        break;
                    case (strpos($pob, 'uk') !== FALSE);
                        $nationality = 27;
                        break;
                    case (strpos($pob, 'denmark') !== FALSE);
                        $nationality = 50;
                        break;
                    default:
                        # Random element from nationalities
                        $nats = Nationality::lists('id');
                        $nationality = $faker->randomElement($nats);
                        break;
                }

                $name = $json->name;

                $parts = explode(" ", $name);
                $lastname = array_pop($parts);
                $firstname = implode(" ", $parts);

                Actor::create([
                    'fName' => $firstname,
                    'lName' => $lastname,
                    'bio' => $json->biography,
                    'birthday' => $json->birthday,
                    'image' => $json->profile_path,
                    'nationality_id' => $nationality,
                ]);
            }
        }
	}

}