<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ActorsTableSeeder extends Seeder {

	public function run()
	{
        echo "# SEEDING FOR ACTORS BEGUN\n";
        $start = time();

        $faker = Faker::create();
        $actors = [];

        # 1379622
        foreach(range(42501, 50000) as $index) # Last index of person 1. nov 2014
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

                if ($json->deathday != null) {
                    $deathday = date('Y-m-d', strtotime($json->deathday));
                } else {
                    $deathday = null;
                }

                if ($json->birthday != null) {
                    $birth = date('Y-m-d', strtotime($json->birthday));
                } else {
                    $birth = null;
                }

                $timestamp = Carbon\Carbon::now();

                $actors[] = [
                    'fName' => $firstname,
                    'lName' => $lastname,
                    'bio' => $json->biography,
                    'birthday' => $birth,
                    'deathday' => $deathday,
                    'image' => $json->profile_path,
                    'moviedb_id' => $json->id,
                    'imdb_id' => $json->imdb_id,
                    'nationality_id' => $nationality,
                    'created_at'    => $timestamp,
                    'updated_at'    => $timestamp
                ];

            }

            if ($index % 100 === 0) {
                echo "  - Prepared: " . $index . "\n";
                $this->seed($actors);
                $actors = [];
            }
        }

        $this->seed($actors);

        $finish = time();
        $total = $finish - $start;
        echo "# SEEDING FOR ACTORS ENDED: " . ($total) . " seconds (~". ((int) ($total / 60)) ." minutes)...\n";

	}

    public function seed($array) {
        foreach (array_chunk($array, 500) as $chunk) {
            Actor::insert($chunk);
        }
    }

}