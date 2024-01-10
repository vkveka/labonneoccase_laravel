<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/', App\Http\Controllers\AnnonceController::class);
Route::resource('/home', App\Http\Controllers\AnnonceController::class);
Route::resource('/annonces', App\Http\Controllers\AnnonceController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/privacy', [App\Http\Controllers\AdminController::class, 'privacy'])->name('privacy');
Route::get('/Rhlmcabr0n', [App\Http\Controllers\AdminController::class, 'index'])->name('Rhlmcabr0n');
