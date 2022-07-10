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


Route::get('/', 'PostController@home')->name("home");
Route::get('/search', 'PostController@search')->name("search");
Route::get('/{category}', 'PostController@index')->name("cat-index");
Route::get('/{category}/{slug}', 'PostController@show')->name("post-show");


Route::post('/subscriber', 'SubscriberController@create')->name("subscriber-create");


