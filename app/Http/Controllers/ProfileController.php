<?php

namespace App\Http\Controllers;
use App\Models\Berita;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $pageTitle = 'Tentang Kami';
        $beritas = Berita::orderBy('tanggal', 'desc')->take(5)->get(); // ambil 5 berita terbaru
        return view('pages.about', compact('pageTitle', 'beritas'));
    }

}
