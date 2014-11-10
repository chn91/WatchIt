<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class MoviesTableSeeder extends Seeder {

    public function run()
    {
        echo "# SEEDING FOR MOVIES\n";

        $start = time();

        $faker = Faker::create();

        # 299901
        ## 12100
            foreach(range(5001, 10000) as $index) # Last index of person 1. nov 2014
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
                $movie = Movie::create([
                    'title'         => $json->title,
                    'original_title'=> $json->original_title,
                    'resume'        => $json->overview,
                    'length'        => $json->runtime,
                    'release'       => date('Y-m-d', strtotime($json->release_date)),
                    'released'       => ($json->status == 'Released') ? 1 : 0,
                    'cover'         => $json->poster_path,
                    'moviedb_id'    => $json->id,
                    'imdb_id'       => $json->imdb_id,
                ]);

                $id = $movie->id;

                # Add connections with movie and studio
                foreach($json->production_companies as $studio) {
                    $ss = Studio::lists('id');

                    DB::insert('INSERT INTO `movie_studio` (`movie_id`, `studio_id`) VALUES (?, ?)', [
                        $id,
                        $faker->randomElement($ss)
                    ]);
                }

                # Add connections with movie and language
                foreach($json->spoken_languages as $language) {
                    $ls = Language::lists('id');

                    DB::insert('INSERT INTO `language_movie` (`movie_id`, `language_id`) VALUES (?, ?)', [
                        $id,
                        $faker->randomElement($ls)
                    ]);
                }

                # Add connections with movie and genres
                foreach($json->genres as $genre) {
                    $gs = Genre::lists('id');

                    DB::insert('INSERT INTO `genre_movie` (`movie_id`, `genre_id`) VALUES (?, ?)', [
                        $id,
                        $faker->randomElement($gs)
                    ]);
                }
            }

            if ($index % 100 === 0) {
                echo "  - Seeded: " . $index . "\n";
            }
        }

        $finish = time();
        $total = $finish - $start;
        echo "# SEEDING FOR MOVIES ENDED: " . ($total) . " seconds (~". ((int) ($total / 60)) ." minutes)...\n";

    }

}