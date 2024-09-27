<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('frontend.home');
});

Route::get('/mimin', function () {
    return view('backend.pages.dashboard.index');
});