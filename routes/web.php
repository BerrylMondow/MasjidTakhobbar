<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DonasiController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\AdminController;

// Halaman Umum
Route::get('/', [WelcomeController::class, 'index']);
Route::get('/home', function () {
    $pageTitle = "Home";
    return view('welcome', compact('pageTitle'));
})->name('home');

Route::get('/donasi', [DonasiController::class, 'index'])->name('donasi');
Route::get('/berita', [BeritaController::class, 'index'])->name('berita');

// Login Admin
Route::get('/admin', [AdminController::class, 'index'])->name('admin.login');
Route::post('/admin', [AdminController::class, 'login'])->name('admin.login.submit');

// Dashboard Admin
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

// Logout
Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
