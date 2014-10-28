<?php

Route::get('/', [
    'as'    => 'Home',
    'uses'  => 'PagesController@index'
]);
