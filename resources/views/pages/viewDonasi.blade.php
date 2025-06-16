@extends('layout.app')
@section('content')
    <div class="container py-5" style="margin-top: 50px;">
        <!-- Judul -->
        <h2 class="text-center mb-4">AYO BERDONASI</h2>

        <!-- Gambar -->
        <div class="text-center">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/4e/Chess_pieces_close_up.jpg/1200px-Chess_pieces_close_up.jpg"
                class="img-fluid rounded mb-4" alt="Zakat">
        </div>
        <!-- Judul Zakat -->
        <h4>ZAKAT FITRAH</h4>

        <!-- Deskripsi -->
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore
            magna aliqua Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore
            et dolore magna aliqua Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt
            ut labore et dolore magna aliqua Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor
            incididunt ut labore et dolore magna aliqua Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do
            eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>

        <!-- Nama Lembaga -->
        <div class="d-flex align-items-center mb-3">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/4e/Chess_pieces_close_up.jpg/1200px-Chess_pieces_close_up.jpg"
                width="40" height="40" class="rounded-circle me-2" alt="Lembaga">
            <strong>Yayasan Al-Mualim Surabaya</strong> <i class="bi bi-patch-check-fill ms-2 text-primary verified-icon"></i>
        </div>

        <!-- Progress Donasi -->
        <div class="mb-3">
            <div class="progress" style="height: 10px;">
                <div class="progress-bar bg-success" style="width: 100%;"></div>
            </div>
            <small class="text-success fw-bold">Rp.1.000.000</small> terkumpul dari <strong>∞ Tak Terbatas</strong>
        </div>

        <!-- Form Donasi -->
        <form>
            <div class="mb-3">
                <input type="text" class="form-control" placeholder="Masukkan Nama">
            </div>
            <div class="mb-3">
                <input type="number" class="form-control" placeholder="Masukkan Nominal (Min. Rp.10.000)">
            </div>
            <div class="mb-3">
                <input type="email" class="form-control" placeholder="Masukkan Email">
            </div>
            <button type="submit" class="btn btn-success w-100">Mulai Bayar Zakat</button>
        </form>
    </div>
@endsection
