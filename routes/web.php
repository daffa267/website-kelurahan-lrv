<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/news', function () {
    return view('news');
});

Route::get('/attent', function () {
    return view('attent');
});
