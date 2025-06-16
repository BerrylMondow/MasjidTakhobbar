<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index() {
    $pageTitle = 'Artikel Berita';
    return view('pages.berita', compact('pageTitle'));
}

public function show($id)
{
    $berita = \DB::table('artikel')->find($id);
    if (!$berita) {
        abort(404);
    }

    return view('admin.berita.show', compact('berita'));
}

}
