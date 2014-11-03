<?php

class StudiosTableSeeder extends Seeder {

	public function run()
	{

		foreach(range(1, 100) as $index)
		{
            $content = file_get_contents('http://api.themoviedb.org/3/company/' . $index . '?api_key=' . getenv('MOVIE_API'),
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
                Studio::create([
                    'name' => $json->name
                ]);
            }
		}
	}

}