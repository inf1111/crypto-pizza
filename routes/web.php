<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\SubscriberController;
use Illuminate\Support\Facades\Route;

Route::get('/zzz', function () {




});



Route::get('/new-pass/{token}', [ResetPasswordController::class, 'newPasswordForm'])->name("new-pass-form");
Route::post('/new-pass', [ResetPasswordController::class, 'newPasswordSet'])->name("new-pass-set");

// Ajax
Route::post('/post-email', [ForgotPasswordController::class, 'postEmail'])->name("post-email");
Route::post('/subscriber', [SubscriberController::class, 'create'])->name("subscriber-create");
Route::post('/auth/login', [AuthController::class, 'login'])->name("login");
Route::post('/auth/register', [AuthController::class, 'register'])->name("register");
Route::post('/load-more', [PostController::class, 'loadMore'])->name('load-more');

Route::get('/toggle-bookmark', [PostController::class, 'toggleBookmark'])->name("toggle-bookmark");
Route::get('/toggle-like-post', [PostController::class, 'toggleLikePost'])->name("toggle-like-post");

Route::group(['middleware' => 'auth'], function () {

    Route::post('/comment', [CommentController::class, 'store'])->name("comment-store");

    Route::get('/profile', [ProfileController::class, 'index'])->name("profile-index");
    Route::get('/profile/bookmarks', [ProfileController::class, 'bookmarksIndex'])->name("profile-bookmarks");
    Route::get('/profile/logout', [AuthController::class, 'logout'])->name("logout");
    Route::post('/profile/update', [ProfileController::class, 'updateProfile'])->name("profile-update");

});

Route::get('/', [PostController::class, 'home'])->name("home");
Route::get('/search', [PostController::class, 'search'])->name("search");
Route::get('/{category}', [PostController::class, 'index'])->name("cat-index");
Route::get('/{category}/{slug}', [PostController::class, 'show'])->name("post-show");




