<?php

use App\Http\Controllers\Admin\AdminAlbumController;
use App\Http\Controllers\Admin\AdminArtistController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GenreController;
use App\Http\Controllers\Admin\LabelController;
use App\Http\Controllers\Site\AlbumController;
use App\Http\Controllers\Site\ArtistController;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\ReviewController;
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

Route::get('/', HomeController::class)->name('home');

Route::controller(ArtistController::class)->group(
    function () {
        Route::get('/artists', 'index')->name('artists');
        Route::get('artist/{artist:slug}', 'show')->name('show.artist');
    }
);

Route::controller(AlbumController::class)->group(
    function () {
        Route::get('/albums', 'index')->name('albums');
        Route::get('/album/{album}', 'show')->name('show.album');
        Route::get('/release-anniversary', 'anniversary');
    }
);

Route::get('/reviews', ReviewController::class)->name('reviews');

// Admin routes
Route::get('/admin', [DashboardController::class, 'index'])->middleware('auth');

Route::controller(AdminArtistController::class)
    ->middleware('auth')
    ->group(
        function () {
            Route::get('/admin/artists', 'index')->name('artist.list');
        }
    );

Route::controller(AdminAlbumController::class)
    ->middleware('auth')
    ->group(
        function () {
            Route::get('/admin/albums', 'index')->name('album.list');
        }
    );

Route::controller(LabelController::class)
    ->middleware('auth')
    ->group(
        function () {
            Route::get('/admin/labels', 'index')->name('label.list');
        }
    );

Route::controller(GenreController::class)
    ->middleware('auth')
    ->group(
        function () {
            Route::get('/admin/genres', 'index')->name('genre.list');
        }
    );

require __DIR__ . '/auth.php';
