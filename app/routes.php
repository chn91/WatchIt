<?php

# Bind routes with model
Route::bind('movie', 'Movie');
Route::bind('actor', 'Actor');

# Home
Route::get('/', [
    'as'    => 'Home',
    'uses'  => 'PagesController@index'
]);

Route::get('test', function() {
    echo '<pre>';

    for($i = 0; $i < 10; $i++) {
        $content = file_get_contents('http://api.themoviedb.org/3/movie/'.$i.'?api_key=' . getenv('MOVIE_API'),
            false,
            stream_context_create(
                array(
                    'http' => array(
                        'ignore_errors' => true
                    )
                )
            ));
        $json = \GuzzleHttp\json_decode($content);
        if (property_exists($json, 'status_code')) {
            if ($json->status_code == 6) {
                echo '<p>NO MOVIE</p>';
            } else {
                print_r($json);
            }
        } else {
            print_r($json);
        }

    }

    echo '</pre>';
});

# Route ressources
Route::resource('movie', 'MoviesController', ['only' => ['index', 'show']]);
Route::resource('actor', 'ActorsController', ['only' => ['index', 'show']]);