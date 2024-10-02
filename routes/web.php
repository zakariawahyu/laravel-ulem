<?php

use App\Http\Controllers\Admin\ConfigurationController;
use App\Http\Controllers\Admin\CoupleController;
use App\Http\Controllers\Admin\DatatablesController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\VenueDetailController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    return view('welcome');
});

Route::prefix('mimin')->middleware([])->group(function () {
    Route::controller(DatatablesController::class)->prefix('datatable')->name('datatable.')->group(function () {
        Route::get('/couple', 'couple')->name('couple');
        Route::get('/gallery', 'gallery')->name('gallery');
        Route::get('/venue-detail', 'venueDetail')->name('venue-detail');
    });

    Route::controller(ConfigurationController::class)->prefix('configuration')->name('configuration.')->group(function () {
        Route::get('/meta', 'meta')->name('meta');
        Route::post('/meta', 'saveMeta')->name('meta.save');
    });

    Route::resource('couple', CoupleController::class);
    Route::get('/couple/{id}/delete', [CoupleController::class, 'destroy'])->name('couple.delete');
    Route::resource('gallery', GalleryController::class);
    Route::get('/gallery/{id}/delete', [GalleryController::class, 'destroy'])->name('gallery.delete');
    Route::resource('venue-detail', VenueDetailController::class);
    Route::get('/venue-detail/{id}/delete', [VenueDetailController::class, 'destroy'])->name('venue-detail.delete');
});

