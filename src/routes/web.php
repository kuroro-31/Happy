<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

Route::get('/', 'App\Http\Controllers\Articles\IndexController');
Route::prefix('articles')->name('articles.')->group(function () {
    Route::post('/', 'App\Http\Controllers\Articles\StoreController')->name('store');
    Route::get('/create', 'App\Http\Controllers\Articles\CreateController')->name('create');
    Route::delete('/{article}', 'App\Http\Controllers\Articles\DestroyController')->name('destroy');
    Route::patch('/{article}', 'App\Http\Controllers\Articles\UpdateController')->name('update');
    Route::get('/{article}', 'App\Http\Controllers\Articles\ShowController')->name('show');
    Route::get('/{article}/edit', 'App\Http\Controllers\Articles\EditController')->name('edit');
    Route::put('/{article}/like', 'App\Http\Controllers\Articles\LikeController')->name('like')->middleware('auth');
    Route::delete('/{article}/like', 'App\Http\Controllers\Articles\UnlikeController')->name('unlike')->middleware('auth');
});
