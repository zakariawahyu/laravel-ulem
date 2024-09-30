<?php

use App\Http\Controllers\Admin\CoupleController;
use App\Http\Controllers\Admin\DatatablesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    return view('welcome');
});

Route::prefix('mimin')->middleware([])->group(function () {
    Route::prefix('datatable')->name('datatable.')->group(function () {
        Route::controller(DatatablesController::class)->group(function () {
            Route::get('/couple', 'couple')->name('couple');
        });
    });

    Route::resource('couple', CoupleController::class);
    Route::get('/couple/{id}/delete', [CoupleController::class, 'destroy'])->name('couple.delete');
});

