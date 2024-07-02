<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KandidatController;
use App\Http\Controllers\PemilihController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', function () {
    return view('layouts.backend');
});

Route::group(['prefix' => 'admin'], function () {
   Route::resource('kandidat', KandidatController::class);
   Route::resource('pemilih', PemilihController::class);
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
