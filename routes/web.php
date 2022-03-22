<?php

use App\Http\Controllers\Admin\AdminAlbumController;
use App\Http\Controllers\Admin\AdminArtistController;
use App\Http\Controllers\Admin\AdminReviewController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GenreController;
use App\Http\Controllers\Admin\LabelController;
use App\Http\Controllers\Site\AlbumController;
use App\Http\Controllers\Site\ArtistController;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\ReviewController;
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
            Route::get('/admin/artist/new', 'create')->name('artist.create');
            Route::post('/admin/artist/store', 'store')->name('artist.store');
            Route::get('/admin/{artist:slug}/edit', 'edit')->name('artist.edit');
            Route::put('/admin/{artist}/', 'update')->name('artist.update');
            Route::delete('/admin/{artist}/delete', 'destroy')->name('artist.destroy');
        }
    );

Route::controller(AdminAlbumController::class)
    ->middleware('auth')
    ->group(
        function () {
            Route::get('/admin/albums', 'index')->name('album.list');
            Route::get('/admin/album/new', 'create')->name('album.create');
            Route::post('/admin/album/store', 'store')->name('album.store');
            Route::get('/admin/album/{album:id}/edit', 'edit')->name('album.edit');
            Route::put('/admin/album/{album}', 'update')->name('album.update');
            Route::delete('/admin/album/{album}/delete', 'destroy')->name('album.destroy');
        }
    );

Route::controller(AdminReviewController::class)
    ->middleware('auth')
    ->group(
        function () {
            Route::get('/admin/review/{album:id}', 'create')->name('review.create');
            Route::post('/admin/review/store', 'store')->name('review.store');
            Route::get('/admin/review/edit/{review:id}', 'edit')->name('review.edit');
            Route::put('/admin/review/update/{review}', 'update')->name('review.update');
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
