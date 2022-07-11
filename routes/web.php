<?php

use Illuminate\Support\Facades\Route;

Route::get('/zzz', function () {

    /*for ($i=1; $i<=5; $i++) {
        $cur = \App\Post::find(5)->replicate()->fill([
            'slug' => rand(100,1000000)
        ]);
        $cur->save();
    }*/

});

// Ajax

Route::post('/subscriber', 'SubscriberController@create')->name("subscriber-create");
Route::post('/auth/login', 'AuthController@login')->name("login");
Route::post('/auth/register', 'AuthController@register')->name("register");

Route::group(['middleware' => 'auth'], function () {

    Route::get('/profile', 'ProfileController@index')->name("profile-index");
    Route::get('/profile/logout', 'AuthController@logout')->name("logout");
    Route::post('/profile/update', 'ProfileController@updateProfile')->name("profile-update");

});

Route::get('/', 'PostController@home')->name("home");
Route::get('/search', 'PostController@search')->name("search");
Route::get('/{category}', 'PostController@index')->name("cat-index");
Route::get('/{category}/{slug}', 'PostController@show')->name("post-show");




