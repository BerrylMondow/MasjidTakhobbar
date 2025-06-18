@extends('layout.app')

@section('content')
    <div class="container py-5" style="margin-top: 50px;">
        <!-- Judul -->
        <h2 class="text-center mb-4">AYO BERDONASI</h2>

        <!-- Gambar -->
        <div class="text-center">
            <img src="{{ asset('storage/' . $donasi->gambar) }}" class="img-fluid rounded mb-4"
                alt="{{ $donasi->nama_program }}">
        </div>

        <!-- Judul Donasi -->
        <h4>{{ $donasi->nama_program }}</h4>

        <!-- Deskripsi -->
        <p>{{ $donasi->deskripsi }}</p>

        <!-- Nama Lembaga -->
        <div class="d-flex align-items-center mb-3">
            <img src="{{ Vite::asset('resources/img/masjidTakhobbar.png') }}" width="40" height="40"
                class="rounded-circle me-2" alt="Lembaga">
            <strong>Masjid Takhobbar</strong> <i class="bi bi-patch-check-fill ms-2 text-danger verified-icon"></i>
        </div>

        <!-- Progress Donasi -->
        <div class="mb-3">
            <div class="progress" style="height: 10px;">
                <div class="progress-bar bg-success" style="width: {{ $progress }}%;"></div>
            </div>
            <small class="text-success fw-bold">
                Rp.{{ number_format($terkumpul, 0, ',', '.') }}
            </small>
            terkumpul dari
            @if ($donasi->unlimited_target)
                <strong>∞ Tak Terbatas</strong>
            @else
                <strong>Rp.{{ number_format($target, 0, ',', '.') }}</strong>
            @endif
        </div>



        <!-- Form Donasi -->
        <!-- Form Donasi -->
        <!-- Form Donasi -->
        <form id="form-donasi" action="{{ route('donasi.bayar') }}" method="POST" novalidate>
            @csrf
            <input type="hidden" name="donasi_id" value="{{ $donasi->id }}">

            <div class="mb-3">
                <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama" required>
                <div class="invalid-feedback">
                    Silakan masukkan nama Anda!
                </div>
            </div>

            <div class="mb-3">
                <input type="number" name="nominal" class="form-control" placeholder="Masukkan Nominal (Min. Rp10.000)"
                    required>
                <div class="invalid-feedback">
                    Silakan masukkan nominal donasi!
                </div>
            </div>

            <div class="mb-3">
                <input type="email" name="email" class="form-control" placeholder="Masukkan Email" required>
                <div class="invalid-feedback">
                    Silakan masukkan email yang valid!
                </div>
            </div>

            <button type="submit" class="btn btn-success w-100">Mulai Berdonasi</button>
        </form>

        <!-- Tambahkan script validasi Bootstrap -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const form = document.getElementById('form-donasi');
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        </script>


    </div>
@endsection
