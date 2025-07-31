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

Route::get('/news-detail1', function () {
    return view('news-detail1');
});

Route::get('/news-detail2', function () {
    return view('news-detail2');
});

Route::get('/gallery', function () {
    return view('gallery');
});

Route::get('/download', function () {
    return view('download');
});

Route::get('/pengumuman', function () {
    return view('pengumuman');
});