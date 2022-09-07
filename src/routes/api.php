<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
// Route::get('/posts', 'App\Http\Controllers\Api\Timeline\TimelineController');
Route::post('/books/{book}/episode', 'App\Http\Controllers\Books\Episode\StoreController');
Route::patch('/books/{book}/{episode}/edit', 'App\Http\Controllers\Books\Episode\UpdateController');
