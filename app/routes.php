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

Route::post('movie/{id}/comment', [
    'as'    => 'movieComment',
    'uses'  => 'MoviesController@comment'
]);

Route::post('movie/{id}/like', [
    'as'    => 'movieLike',
    'uses'  => 'MoviesController@like'
]);

Route::post('movie/{id}/watch', [
    'as'    => 'movieWatch',
    'uses'  => 'MoviesController@watch'
]);

Route::post('movie/{id}/towatch', [
    'as'    => 'movieToWatch',
    'uses'  => 'MoviesController@towatch'
]);

Route::post('actor/{id}/comment', [
    'as'    => 'actorComment',
    'uses'  => 'ActorsController@comment'
]);

Route::post('actor/{id}/like', [
    'as'    => 'actorLike',
    'uses'  => 'ActorsController@like'
]);

Route::get('info', function() {
    phpinfo();
});