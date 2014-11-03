<?php

class GenresTableSeeder extends Seeder {

	public function run()
	{
        $content = file_get_contents('http://api.themoviedb.org/3/genre/movie/list?api_key=' . getenv('MOVIE_API'),
            false,
            stream_context_create(
                array(
                    'http' => array(
                        'ignore_errors' => true
                    )
                )
            ));

        $json = \GuzzleHttp\json_decode($content);
        $genres = $json->genres;

		foreach($genres as $g)
		{
            if (property_exists($g, 'name')) {
                Genre::create([
                    'name' => $g->name,
                ]);
            }

		}
	}

}