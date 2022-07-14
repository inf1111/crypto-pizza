<?php

use App\View;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Route;

Route::get('/zzz', function () {

    $views = View::where('date', '<', Carbon::now()->subDays(7))->get();
    dd($views);

});

// Ajax
Route::post('/subscriber', 'SubscriberController@create')->name("subscriber-create");
Route::post('/auth/login', 'AuthController@login')->name("login");
Route::post('/auth/register', 'AuthController@register')->name("register");

Route::get('/toggle-bookmark', 'PostController@toggleBookmark')->name("toggle-bookmark");
Route::get('/toggle-like-post', 'PostController@toggleLikePost')->name("toggle-like-post");

Route::group(['middleware' => 'auth'], function () {

    Route::get('/profile', 'ProfileController@index')->name("profile-index");
    Route::get('/profile/bookmarks', 'ProfileController@bookmarksIndex')->name("profile-bookmarks");
    Route::get('/profile/logout', 'AuthController@logout')->name("logout");
    Route::post('/profile/update', 'ProfileController@updateProfile')->name("profile-update");

});

Route::get('/', 'PostController@home')->name("home");
Route::get('/search', 'PostController@search')->name("search");
Route::get('/{category}', 'PostController@index')->name("cat-index");
Route::get('/{category}/{slug}', 'PostController@show')->name("post-show");




