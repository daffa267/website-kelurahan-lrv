<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index() {
        return view('index');
    }

    public function gallery() {
        return view('gallery');
    }

    public function downloads() {
        return view('download');
    }
    
    public function attent() { // Untuk route /attent
        return view('attent');
    }

    public function pengumuman() { // Untuk route /pengumuman
        return view('pengumuman');
    }
}