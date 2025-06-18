@extends('layout.app')

@section('content')
    <style>
        .card-img-top {
            border-top-left-radius: 1rem;
            border-top-right-radius: 1rem;
            height: 220px;
            object-fit: cover;
        }

        .progress {
            height: 8px;
            border-radius: 5px;
        }

        .verified-icon {
            font-size: 1rem;
            margin-left: 4px;
        }

        .donation-btn {
            border-radius: 0.5rem;
            font-size: 1rem;
        }

        .card {
            border-radius: 1rem;
            overflow: hidden;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card:hover {
            transform: translateY(-4px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
        }
    </style>

    <div class="container py-5" style="margin-top: 80px;">
        <h2 class="text-center mb-5 fw-bold">Daftar Program Donasi</h2>
        <div class="row g-4">
            @forelse ($donasis as $donasi)
                <div class="col-md-6 col-lg-4">
                    <div class="card shadow-sm h-100">
                        <img src="{{ asset('storage/' . $donasi->gambar) }}" class="card-img-top"
                            alt="{{ $donasi->nama_program }}">

                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold">{{ $donasi->nama_program }}</h5>

                            <!-- Progress Bar -->
                            @php
                                $terkumpul = 0; // ganti dengan nilai real jika ada
                                $target = $donasi->unlimited_target ? null : $donasi->target;
                                $progress = $target ? min(100, ($terkumpul / $target) * 100) : 100;
                            @endphp

                            <div class="my-3">
                                <div class="progress">
                                    <div class="progress-bar bg-success" style="width: {{ $progress }}%;"></div>
                                </div>
                                <small class="d-block mt-1">
                                    <span class="text-success fw-semibold">Rp{{ number_format($terkumpul, 0, ',', '.') }}</span>
                                    terkumpul dari
                                    @if ($donasi->unlimited_target)
                                        <strong class="text-danger">∞ Tak Terbatas</strong>
                                    @else
                                        <strong class="text-danger">Rp{{ number_format($target, 0, ',', '.') }}</strong>
                                    @endif
                                </small>
                            </div>

                            <!-- Info Lembaga -->
                            <div class="d-flex align-items-center mt-auto">
                                <img src="{{ Vite::asset('resources/img/masjidTakhobbar.png') }}"
                                    alt="Masjid Takhobbar"
                                    class="rounded-circle me-2" width="40" height="40">
                                <span class="fw-medium">Masjid Takhobbar</span>
                                <i class="bi bi-patch-check-fill text-primary verified-icon"></i>
                            </div>

                            <!-- Tombol Donasi -->
                            @if ($target && $terkumpul >= $target)
                                <button class="btn btn-secondary w-100 mt-3 donation-btn" disabled>
                                    Donasi sudah Tercapai
                                </button>
                            @else
                                <a href="{{ route('pages.viewDonasi', $donasi->id) }}"
                                   class="btn btn-success w-100 mt-3 donation-btn">
                                    Mulai Berdonasi
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info text-center">
                        Belum ada program donasi yang tersedia.
                    </div>
                </div>
            @endforelse
        </div>
    </div>
@endsection
