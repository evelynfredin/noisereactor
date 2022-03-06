<?php

use App\Http\Controllers\Site\AlbumController;
use App\Http\Controllers\Site\ArtistController;
use App\Models\Artist;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Site/Home');
});

Route::controller(ArtistController::class)->group(
    function () {
        Route::get('/artists', 'index')->name('artists');
        Route::get('artist/{artist:slug}', 'show')->name('show.artist');
    }
);

Route::controller(AlbumController::class)->group(
    function () {
        Route::get('/albums', 'index')->name('albums');
    }
);

require __DIR__ . '/auth.php';
