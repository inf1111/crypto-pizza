<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubscriberController;
use App\View;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Route;

Route::get('/zzz', function () {

    //$posts = \App\Post::where('read-time', "=", 0)->limit(200)->get();

    /*foreach ($posts as $post) {

        $post->update([ 'read-time' => ceil(strlen(strip_tags($post->text)) / 863) ]);

    }*/

});

// Ajax
Route::post('/subscriber', [SubscriberController::class, 'create'])->name("subscriber-create");
Route::post('/auth/login', [AuthController::class, 'login'])->name("login");
Route::post('/auth/register', [AuthController::class, 'register'])->name("register");
Route::post('/load-more', [PostController::class, 'loadMore'])->name('load-more');

Route::get('/toggle-bookmark', [PostController::class, 'toggleBookmark'])->name("toggle-bookmark");
Route::get('/toggle-like-post', [PostController::class, 'toggleLikePost'])->name("toggle-like-post");

Route::group(['middleware' => 'auth'], function () {

    Route::get('/profile', [ProfileController::class, 'index'])->name("profile-index");
    Route::get('/profile/bookmarks', [ProfileController::class, 'bookmarksIndex'])->name("profile-bookmarks");
    Route::get('/profile/logout', [AuthController::class, 'logout'])->name("logout");
    Route::post('/profile/update', [ProfileController::class, 'updateProfile'])->name("profile-update");

});

Route::get('/', [PostController::class, 'home'])->name("home");
Route::get('/search', [PostController::class, 'search'])->name("search");
Route::get('/{category}', [PostController::class, 'index'])->name("cat-index");
Route::get('/{category}/{slug}', [PostController::class, 'show'])->name("post-show");




