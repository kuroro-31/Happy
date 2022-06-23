<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
| 認証
*/

Auth::routes();
// Route::get('/login/{provider}', 'App\Http\Controllers\Auth\LoginController@redirectToProvider')->name('login.{provider}');
// Route::get('/register/{provider}', 'App\Http\Controllers\Auth\RegisterController@showProviderUserRegistrationForm')->name('register.{provider}');
/*
|--------------------------------------------------------------------------
| Books Routes
|--------------------------------------------------------------------------
| 投稿
*/
Route::get('/', 'App\Http\Controllers\Books\IndexController')->name('book.index');
Route::prefix('books')->name('book.')->group(function () {
    Route::middleware('auth')->group(function () {
        Route::post('/', 'App\Http\Controllers\Books\StoreController')->name('store');
        Route::get('/create', 'App\Http\Controllers\Books\CreateController')->name('create');
        Route::delete('/{book}', 'App\Http\Controllers\Books\DestroyController')->name('destroy');
        Route::patch('/{book}', 'App\Http\Controllers\Books\UpdateController')->name('update');
        Route::get('/{book}/edit', 'App\Http\Controllers\Books\EditController')->name('edit');
        Route::put('/{book}/like', 'App\Http\Controllers\Books\LikeController')->name('like');
        Route::delete('/{book}/like', 'App\Http\Controllers\Books\UnlikeController')->name('unlike');

        Route::get('/{book}/chapters/{chapter}', 'App\Http\Controllers\Books\Chapter\ShowController')->name('chapter.show');
    });
    Route::get('/{book}', 'App\Http\Controllers\Books\ShowController')->name('show');
});

// タグ
Route::get('/tags/{name}', 'App\Http\Controllers\TagController')->name('tags.show');


/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
| ユーザー
*/
Route::prefix('users')->name('users.')->group(function () {
    Route::middleware('auth')->group(function () {
        Route::patch('/{username}', 'App\Http\Controllers\User\UpdateController')->name('update');
        Route::put('/{username}/follow', 'App\Http\Controllers\User\FollowController')->name('follow');
        Route::delete('/{username}/follow', 'App\Http\Controllers\User\UnfollowController')->name('unfollow');
    });
    Route::get('/{username}', 'App\Http\Controllers\User\ShowController')->name('show');
    Route::get('/{username}/likes', 'App\Http\Controllers\User\LikesController')->name('likes');
    Route::get('/{username}/about', 'App\Http\Controllers\User\AboutController')->name('about');
    Route::get('/{username}/followings', 'App\Http\Controllers\User\FollowingsController')->name('followings');
    Route::get('/{username}/followers', 'App\Http\Controllers\User\FollowersController')->name('followers');
});
