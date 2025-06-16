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

    $pageTitle = 'Manajemen Donasi';
    return view('admin.donasi.list', compact('pageTitle'));
}
        public function view()
{
    if (!session('is_admin')) {
        return redirect()->route('admin.login');
    }

    $pageTitle = 'View Donasi';
    return view('admin.donasi.view', compact('pageTitle'));
}
        public function add()
{
    if (!session('is_admin')) {
        return redirect()->route('admin.login');
    }

    $pageTitle = 'Tambah Program Donasi Baru';
    return view('admin.donasi.add', compact('pageTitle'));
}
}
