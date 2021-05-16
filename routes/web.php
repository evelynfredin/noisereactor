<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Content\PostController;
use App\Http\Controllers\Content\AlbumController;
use App\Http\Controllers\Content\ArtistController;
use App\Http\Controllers\Grouping\GenreController;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Auth
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

// Content (Artists, Albums and Blog Posts)
// Artists
Route::get('/artists', [ArtistController::class, 'index'])->name('artists');
Route::get('/new/artist', [ArtistController::class, 'submit'])->name('new.artist');
Route::post('/new/artist', [ArtistController::class, 'store']);

// Single artist page
Route::get('artist/{artist:slug}', [ArtistController::class, 'show'])->name('show.artist');
Route::get('edit/artist/{artist:id}', [ArtistController::class, 'edit'])->name('edit.artist');
Route::put('edit/artist/{artist:id}', [ArtistController::class, 'update']);
Route::delete('/delete/artist/{artist:id}', [ArtistController::class, 'destroy'])->name('destroy.artist');

// Albums
Route::get('albums', [AlbumController::class, 'index'])->name('albums');
Route::get('new/album', [AlbumController::class, 'submit'])->name('new.album');
Route::post('new/album', [AlbumController::class, 'store']);

// Single album page
Route::get('album/{album:id}', [AlbumController::class, 'show'])->name('show.album');
Route::get('edit/album/{album:id}', [AlbumController::class, 'edit'])->name('edit.album');
Route::put('edit/album/{album:id}', [AlbumController::class, 'update']);
Route::delete('delete/album/{album:id}', [AlbumController::class, 'destroy'])->name('destroy.album');

// Blog Posts
Route::get('blog', [PostController::class, 'index'])->name('posts');
Route::get('new/post', [PostController::class, 'submit'])->name('new.post');
Route::post('new/post', [PostController::class, 'store']);

// Single blog page
Route::get('blog/{post:slug}', [PostController::class, 'show'])->name('show.post');
Route::get('edit/post/{post:id}', [PostController::class, 'edit'])->name('edit.post');
Route::put('edit/post/{post:id}', [PostController::class, 'update']);
Route::delete('delete/blog/{post:id}', [PostController::class, 'destroy'])->name('destroy.post');

// Grouping (by Genres (Artists) by Category (Blog Posts))
Route::get('/genres', [GenreController::class, 'index'])->name('genres');
