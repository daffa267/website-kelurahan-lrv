<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index() {
        return view('news');
    }

    public function show($slug) {
        if ($slug == 'contoh-berita-pertama' || $slug == 'sosialisasi-e-ktp-digital') {
            return view('news-detail1');
        } elseif ($slug == 'contoh-berita-kedua' || $slug == 'adipura-tingkat-kota') {
            return view('news-detail2');
        } else {
            abort(404);
        }
    }
}