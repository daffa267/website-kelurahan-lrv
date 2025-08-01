<?php

use Illuminate\Support\Facades\Route;
// 1. Import Controller yang sudah dibuat
use App\Http\Controllers\PageController;
use App\Http\Controllers\NewsController;


// Rute untuk halaman-halaman utama
Route::get('/', [PageController::class, 'index'])->name('home');
Route::get('/gallery', [PageController::class, 'gallery'])->name('gallery');
Route::get('/download', [PageController::class, 'downloads'])->name('downloads');
Route::get('/attent', [PageController::class, 'attent'])->name('attent');
Route::get('/pengumuman', [PageController::class, 'pengumuman'])->name('pengumuman');


// Rute untuk Berita
Route::get('/news', [NewsController::class, 'index'])->name('news.index');

// Rute DINAMIS untuk detail berita. 
// Ini menggantikan /news-detail1, /news-detail2, dst.
// {slug} adalah wildcard yang bisa berupa teks apa pun (misal: "kegiatan-posyandu-bulan-agustus")
Route::get('/news/{slug}', [NewsController::class, 'show'])->name('news.show');