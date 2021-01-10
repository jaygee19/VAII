<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\TrackController;
use App\Http\Controllers\UserController;


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

Route::resource('track', TrackController::class);

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