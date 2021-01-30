<?php

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Content\ArtistController;
use App\Http\Controllers\Grouping\GenreController;
use App\Models\Artist;
use App\Models\Genre;

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

Route::get('/new/artist', [ArtistController::class, 'submit'])->name('new.artist');

Route::post('/new/artist', [ArtistController::class, 'store']);

Route::get('/edit/artist/{artist:id}', [ArtistController::class, 'edit'])->name('edit.artist');
Route::put('/edit/artist/{artist:id}', [ArtistController::class, 'update']);

// Single artist page
Route::get('/artist/{artist:slug}', [ArtistController::class, 'show'])->name('show.artist');

// Grouping (by Genres (Artists) by Category (Blogs))
Route::get('/genres', [GenreController::class, 'index'])->name('genres');
