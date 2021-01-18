<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\TrackController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VoteController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\HomeController;

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

Route::get('/', [PagesController::class, 'index']);
Route::get('homepage', [PagesController::class, 'index']);
Route::get('home/{id}/getposition', [HomeController::class, 'getPosition'])->name('home.getposition');
Route::get('track/notify', [TrackController::class, 'notify'])->name('track.notify');
Route::get('vote/filter', [VoteController::class, 'filter'])->name('vote.filter');

Route::resource('album', AlbumController::class);
Route::get('album/{album}/delete', [AlbumController::class, 'destroy'])->name('album.delete');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('vote', VoteController::class);
    Route::get('vote/{track}/delete', [VoteController::class, 'destroy'])->name('vote.delete');
});

Route::resource('track', TrackController::class);
Route::get('track/{track}/delete', [TrackController::class, 'destroy'])->name('track.delete');


Route::group(['middleware' => 'auth'], function () {
    Route::resource('user', UserController::class);
});


// Route::get('loginUser', [PagesController::class, 'loginpage']);
//Route::get('tracks', [TrackController::class, 'getAll']);


//Auth::routes();
//Route::get('auth/login', [PagesController::class, 'authLogin']);

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);

/* Route::get('/', function () {
    return view('welcome');
});
 */