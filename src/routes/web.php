<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Auth::routes();

/*
|--------------------------------------------------------------------------
| Articles Routes
|--------------------------------------------------------------------------
| 投稿
*/
Route::get('/', 'App\Http\Controllers\Articles\IndexController')->name('articles.index');
Route::prefix('articles')->name('articles.')->group(function () {
    Route::middleware('auth')->group(function () {
        Route::post('/', 'App\Http\Controllers\Articles\StoreController')->name('store');
        Route::get('/create', 'App\Http\Controllers\Articles\CreateController')->name('create');
        Route::delete('/{article}', 'App\Http\Controllers\Articles\DestroyController')->name('destroy');
        Route::patch('/{article}', 'App\Http\Controllers\Articles\UpdateController')->name('update');
        Route::get('/{article}/edit', 'App\Http\Controllers\Articles\EditController')->name('edit');
        Route::put('/{article}/like', 'App\Http\Controllers\Articles\LikeController')->name('like');
        Route::delete('/{article}/like', 'App\Http\Controllers\Articles\UnlikeController')->name('unlike');
    });
    Route::get('/{article}', 'App\Http\Controllers\Articles\ShowController')->name('show');
});

/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
| ユーザー
*/
Route::prefix('users')->name('users.')->group(function () {
    Route::middleware('auth')->group(function () {
        Route::put('/{name}/follow', 'App\Http\Controllers\User\FollowController')->name('follow');
        Route::delete('/{name}/follow', 'App\Http\Controllers\User\UnfollowController')->name('unfollow');
    });
    Route::get('/{name}', 'App\Http\Controllers\User\ShowController')->name('show');
    Route::get('/{name}/likes', 'App\Http\Controllers\User\LikesController')->name('likes');
    Route::get('/{name}/followings', 'App\Http\Controllers\User\FollowingsController')->name('followings');
    Route::get('/{name}/followers', 'App\Http\Controllers\User\FollowersController')->name('followers');
});
