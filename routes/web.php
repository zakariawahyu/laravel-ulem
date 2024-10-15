<?php

use App\Http\Controllers\Admin\AuthContoller;
use App\Http\Controllers\Admin\ConfigurationController;
use App\Http\Controllers\Admin\CoupleController;
use App\Http\Controllers\Admin\DashboardControler;
use App\Http\Controllers\Admin\DatatablesController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\GuestListController;
use App\Http\Controllers\Admin\VenueDetailController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

Route::get('/mimin-login', [AuthContoller::class, 'index'])->name('login');
Route::post('/login', [AuthContoller::class, 'login'])->name('do-login');
Route::get('/logout', [AuthContoller::class, 'logout'])->name('logout');

Route::prefix('mimin')->middleware([Auth::class])->group(function () {
    Route::controller(DatatablesController::class)->prefix('datatable')->name('datatable.')->group(function () {
        Route::get('/couple', 'couple')->name('couple');
        Route::get('/gallery', 'gallery')->name('gallery');
        Route::get('/venue-detail', 'venueDetail')->name('venue-detail');
        Route::get('/guest-list', 'guestList')->name('guest-list');
    });

    Route::controller(ConfigurationController::class)->prefix('configuration')->name('configuration.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/publish', 'publish')->name('publish');
        Route::get('/meta', 'meta')->name('meta');
        Route::post('/meta', 'saveMeta')->name('meta.save');
        Route::get('/cover', 'cover')->name('cover');
        Route::post('/cover', 'saveCover')->name('cover.save');
        Route::get('/event', 'event')->name('event');
        Route::post('/event', 'saveEvent')->name('event.save');
        Route::get('/story', 'story')->name('story');
        Route::post('/story', 'saveStory')->name('story.save');
        Route::get('/venue', 'venue')->name('venue');
        Route::post('/venue', 'saveVenue')->name('venue.save');
        Route::get('/gift', 'gift')->name('gift');
        Route::post('/gift', 'saveGift')->name('gift.save');
        Route::get('/wishes', 'wishes')->name('wishes');
        Route::post('/wishes', 'saveWishes')->name('wishes.save');
        Route::get('/rsvp', 'rsvp')->name('rsvp');
        Route::post('/rsvp', 'saveRsvp')->name('rsvp.save');
        Route::get('/thanks', 'thanks')->name('thanks');
        Route::post('/thanks', 'saveThanks')->name('thanks.save');
    });

    Route::get('/dashboard', [DashboardControler::class, 'index'])->name('dashboard');
    Route::get('/couple/publish', [CoupleController::class, 'publish'])->name('couple.publish');
    Route::get('/gallery/publish', [GalleryController::class, 'publish'])->name('gallery.publish');
    Route::get('/venue-detail/publish', [VenueDetailController::class, 'publish'])->name('venue-detail.publish');
    Route::get('/guest-list/publish', [GuestListController::class, 'publish'])->name('guest-list.publish');
  
    Route::get('/couple/{id}/delete', [CoupleController::class, 'destroy'])->name('couple.delete');
    Route::get('/gallery/{id}/delete', [GalleryController::class, 'destroy'])->name('gallery.delete');
    Route::get('/venue-detail/{id}/delete', [VenueDetailController::class, 'destroy'])->name('venue-detail.delete');
    Route::get('/guest-list/{id}/delete', [GuestListController::class, 'destroy'])->name('guest-list.delete');

    Route::resource('couple', CoupleController::class);
    Route::resource('gallery', GalleryController::class);
    Route::resource('venue-detail', VenueDetailController::class);
    Route::resource('guest-list', GuestListController::class);
   
});

