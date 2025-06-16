<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DonasiController extends Controller
{
    public function index() {
    $pageTitle = 'Donasi';
    return view('pages.donasi', compact('pageTitle'));
}
    public function view() {
    $pageTitle = 'Donasi';
    return view('pages.viewDonasi', compact('pageTitle'));
}
}
