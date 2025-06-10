<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index() {
    $pageTitle = 'Artikel Berita';
    return view('pages.berita', compact('pageTitle'));
}
}
