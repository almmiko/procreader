<?php

use Illuminate\Http\Request;

Route::group(['prefix' => 'v1'], function () {
    Route::get('/posts/{limit?}', 'ApiPostsController@index');
});
