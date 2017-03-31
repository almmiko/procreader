<?php

Route::group(['prefix' => 'v1'], function () {
    Route::post('authenticate', 'AuthenticateController@authenticate');

    Route::get('/posts/{id}', 'ApiPostsController@show');
    Route::get('/posts/{limit?}', 'ApiPostsController@index');

    Route::get('/categories/{id}', 'ApiCategoriesController@show');
    Route::get('/categories/{limit?}', 'ApiCategoriesController@index');
});

Route::group(['prefix' => 'v1', 'middleware' => 'jwt.auth'], function () {
    Route::put('/posts/{id}', 'ApiPostsController@update');
    Route::post('/posts', 'ApiPostsController@store');
    Route::delete('/posts/{id}', 'ApiPostsController@destroy');

    Route::put('/categories/{id}', 'ApiCategoriesController@update');
    Route::post('/categories', 'ApiCategoriesController@store');
    Route::delete('/categories/{id}', 'ApiCategoriesController@destroy');
});


