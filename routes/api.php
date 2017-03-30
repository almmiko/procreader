<?php

use Illuminate\Http\Request;

Route::group(['prefix' => 'v1'], function () {
    Route::post('authenticate', 'AuthenticateController@authenticate');

    Route::get('/posts/{id}', 'ApiPostsController@show');
    Route::get('/posts/{limit?}', 'ApiPostsController@index');
});

Route::group(['prefix' => 'v1', 'middleware' => 'jwt.auth'], function () {
    Route::put('/posts/{id}', 'ApiPostsController@update');
    Route::post('/posts', 'ApiPostsController@store');
    Route::delete('/posts/{id}', 'ApiPostsController@destroy');
});


