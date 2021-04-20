<?php

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

Route::get('/', function () {
    return redirect('/game');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/scoreboard', function () {
    return view('scoreboard');
})->name('scoreboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/game', function () {
    return view('game');
})->name('game');
