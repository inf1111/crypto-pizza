<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

Route::get('/', 'PostController@home')->name("home");
Route::get('/search', 'PostController@search')->name("search");
Route::get('/{category}', 'PostController@index')->name("cat-index");
Route::get('/{category}/{slug}', 'PostController@show')->name("post-show");


Route::post('/subscriber', 'SubscriberController@create')->name("subscriber-create");


Route::get('/zzz', function () {

    //setlocale(LC_ALL, 'ru_RU', 'ru_RU.UTF-8', 'ru', 'russian');
    //echo strftime("%d %B %Y", time());

    /*$date = Carbon::parse('2017-01-05 17:04:05.084512');
    $date->locale('ru');
    echo $date->isoFormat('D MMMM YYYY', 'Do MMMM');*/

    return "<div class=\"share__item\"><a class=\"share__link\" href=\"https://t.me/share/url?url={{ url()->current() }}\" target=\"_blank\"><img src=\"/images/share/telegram.svg\" alt=\"\"></a></div>";

    $x = Str::limit("dsffds", 2);


});
