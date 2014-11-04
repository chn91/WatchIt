<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class MoviesTableSeeder extends Seeder {

    public function run()
    {
        echo "# SEEDING FOR MOVIES BEGUN\n";

        $start = time();

        $faker = Faker::create();

        # 299901
        foreach(range(4501, 10000) as $index) # Last index of person 1. nov 2014
        {
            $content = file_get_contents('http://api.themoviedb.org/3/movie/' . $index . '?api_key=' . getenv('MOVIE_API'),
                false,
                stream_context_create(
                    array(
                        'http' => array(
                            'ignore_errors' => true
                        )
                    )
                ));

            $json = \GuzzleHttp\json_decode($content);

            if (property_exists($json, 'title')) {
                Movie::create([
                    'title'         => $json->title,
                    'resume'        => $json->overview,
                    'length'        => $json->runtime,
                    'release'       => $json->release_date,
                    'cover'         => $json->poster_path,
                ]);
            }

            if ($index % 100 === 0) {
                echo "  - Seeded: " . $index . "\n";
            }
        }

        $finish = time();
        $total = $finish - $start;
        echo "# SEEDING FOR MOVIES ENDED: " . ($total) . " seconds...\n";

    }

}