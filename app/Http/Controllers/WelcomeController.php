<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Infaq;
use App\Models\Berita;

class WelcomeController extends Controller
{
    public function index(){
        $pageTitle = 'Masjid Takhobbar';
        $beritas = Berita::all();
        $infaqs = Infaq::all();
        return view('welcome', compact('pageTitle', 'infaqs', 'beritas'));
    }
}
