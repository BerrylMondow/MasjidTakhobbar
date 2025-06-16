<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DonasiController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminDonasiController;

// Halaman Umum
Route::get('/', [WelcomeController::class, 'index']);
Route::get('/home', function () {
    $pageTitle = "Beranda";
    return view('welcome', compact('pageTitle'));
})->name('home');

Route::get('/donasi', [DonasiController::class, 'index'])->name('donasi');
Route::get('/berita', [BeritaController::class, 'index'])->name('berita');
Route::get('/berita/{id}', [BeritaController::class, 'show'])->name('pages.newsDetail');

// Login Admin
Route::get('/admin', [AdminController::class, 'index'])->name('admin.login');
Route::post('/admin', [AdminController::class, 'login'])->name('admin.login.submit');

// Dashboard Admin
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

// Logout
Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

// Admin Berita
Route::get('/admin/berita', [AdminController::class, 'berita'])->name('admin.news.list');
Route::get('/admin/berita/create', [AdminController::class, 'create'])->name('admin.news.add');
Route::post('/admin/berita/store', [AdminController::class, 'store'])->name('admin.news.store');


 // Simpan berita
Route::get('admin/berita/edit/{id}', [AdminController::class, 'edit'])->name('admin.news.edit');
Route::post('admin/berita/update/{id}', [AdminController::class, 'update'])->name('admin.berita.update'); // Edit berita
// Hapus berita
Route::delete('/admin/berita/{id}', [AdminController::class, 'destroy'])->name('admin.news.destroy');


// Donasi
Route::get('/admin/donasi', [AdminDonasiController::class, 'index'])->name('admin.donasi.list');
Route::get('/admin/donasi/view', [AdminDonasiController::class, 'view'])->name('admin.donasi.view');