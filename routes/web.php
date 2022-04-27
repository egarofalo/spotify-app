<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AlbumsController;
use App\Http\Controllers\SpotifyController;

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

Route::get('/login', [SpotifyController::class, 'login'])
    ->name('spotify.login');

Route::get('/', [HomeController::class, 'showPage'])
    ->middleware('spotify.set_access_token')
    ->name('home');

Route::get('/albums', [AlbumsController::class, 'showPage'])->name('albums');

Route::prefix('api')
    ->middleware('spotify.check_access_token')
    ->group(function () {
        Route::get('albums', [AlbumsController::class, 'index']);
    });
