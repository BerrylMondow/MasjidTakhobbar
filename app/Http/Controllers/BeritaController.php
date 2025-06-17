<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;

class BeritaController extends Controller
{
public function index()
{
    // Ambil 5 berita terbaru berdasarkan tanggal
    $carouselBeritas = Berita::orderBy('tanggal', 'desc')->take(5)->get();

    // Ambil ID yg udah diambil di carousel
    $carouselIds = $carouselBeritas->pluck('id');

    // Ambil sisanya, exclude ID yang sudah di Carousel
    $otherBeritas = Berita::whereNotIn('id', $carouselIds)
                          ->orderBy('tanggal', 'desc')
                          ->get();

    $pageTitle = 'Artikel Berita';

    return view('pages.berita', compact('carouselBeritas', 'otherBeritas', 'pageTitle'));
}




    public function show($id)
    {
        $berita = Berita::findOrFail($id);

        $pageTitle = $berita->judul;
        return view('pages.viewBerita', compact('berita', 'pageTitle'));
    }
}
