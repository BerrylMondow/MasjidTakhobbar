<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DonasiController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminDonasiController;
use App\Http\Controllers\MidtransController;
use Midtrans\Snap;

// Halaman Umum
Route::get('/', [WelcomeController::class, 'index']);
Route::get('/home', function () {
    $pageTitle = "Beranda";
    return view('welcome', compact('pageTitle'));
})->name('home');

Route::get('/donasi', [DonasiController::class, 'index'])->name('donasi');
Route::post('/donasi/bayar', [DonasiController::class, 'bayar'])->name('donasi.bayar');


Route::get('/berita', [BeritaController::class, 'index'])->name('berita');
Route::get('/berita/{id}', [BeritaController::class, 'show'])->name('berita.show');


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
Route::get('/donasi/view/{id}', [DonasiController::class, 'view'])->name('pages.viewDonasi');


Route::get('/admin/donasi', [AdminDonasiController::class, 'index'])->name('admin.donasi.list');
Route::get('/admin/donasi/view', [AdminDonasiController::class, 'view'])->name('admin.donasi.view');
Route::get('/admin/donasi/add', [AdminDonasiController::class, 'add'])->name('admin.donasi.add');
Route::post('/admin/donasi/store', [AdminDonasiController::class, 'store'])->name('admin.donasi.store');
Route::delete('/admin/donasi/{id}', [AdminDonasiController::class, 'destroy'])->name('admin.donasi.destroy');
Route::get('/admin/donasi/{id}/edit', [AdminDonasiController::class, 'edit'])->name('admin.donasi.edit');

Route::put('/admin/donasi/{id}', [AdminDonasiController::class, 'update'])->name('admin.donasi.update');
Route::get('/admin/donasi/bayar', [AdminDonasiController::class, 'bayar'])->name('admin.donasi.bayar');

Route::post('/midtrans/callback', [MidtransController::class, 'callback']);





// Test Koneksi Midtrans
Route::get('/midtrans-test', function () {
    try {
        $params = [
            'transaction_details' => [
                'order_id' => 'TEST-' . rand(),
                'gross_amount' => 10000,
            ],
            'customer_details' => [
                'first_name' => 'Test',
                'last_name' => 'User',
                'email' => 'test@example.com',
                'phone' => '081234567890',
            ],
        ];

        $snapToken = Snap::getSnapToken($params);

        return "Midtrans Connected! Snap Token: <br><code>$snapToken</code>";
    } catch (\Exception $e) {
        return "Midtrans Connection Failed: " . $e->getMessage();
    }
});