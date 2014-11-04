<?php

# Authenticate a user from the DB
Auth::loginUsingId(1);

# Bind routes with model
Route::model('movie', 'Movie');
Route::model('actor', 'Actor');

# Home
Route::get('/', [
    'as'    => 'Home',
    'uses'  => 'PagesController@index'
]);

# Route ressources
Route::resource('movie', 'MoviesController', ['only' => ['index', 'show']]);
Route::resource('actor', 'ActorsController', ['only' => ['index', 'show']]);