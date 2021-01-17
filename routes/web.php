<?php

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Content\ArtistController;
use App\Models\Artist;

Route::get('/', function () {
    return view('index');
})->name('home');

// Loggin in and loggin out
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

// Content (Artists, Albums and Blogs)
// Artists
Route::get('/artists', [ArtistController::class, 'index'])->name('artists');
Route::get('/new/artist', [ArtistController::class, 'store'])->name('new.artist');
