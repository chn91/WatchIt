<?php

# Bind routes with model
Route::bind('movie', 'Movie');
Route::bind('actor', 'Actor');

# Home
Route::get('/', [
    'as'    => 'Home',
    'uses'  => 'PagesController@index'
]);

# Route ressources
Route::resource('movie', 'MoviesController', ['only' => ['index', 'show']]);
Route::resource('actor', 'ActorsController', ['only' => ['index', 'show']]);