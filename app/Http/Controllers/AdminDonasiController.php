<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDonasiController extends Controller
{
        public function index()
{
    if (!session('is_admin')) {
        return redirect()->route('admin.login');
    }

    $pageTitle = 'Manajemen Berita';
    return view('admin.donasi.list', compact('pageTitle'));
}
}
