@extends('admin.layout.app')

@section('content')
    <div class="container">
        <a href="{{ route('admin.donasi.list') }}" class="btn btn-primary me-2">
            <i class="bi bi-arrow-left-circle-fill"></i> Kembali
        </a>
    </div>

    <!-- Kontainer Scrollable -->
    <div class="container my-4 p-4 bg-white shadow rounded overflow-auto" style="max-height: 80vh;">

        <!-- Gambar dari Storage -->
        <img src="{{ asset('storage/' . $donasi->gambar) }}" class="img-fluid rounded mb-4" alt="{{ $donasi->nama_program }}">

        <!-- Judul dan Deskripsi -->
        <h3 class="fw-bold mb-3">{{ $donasi->nama_program }}</h3>
        <p class="text-justify">{{ $donasi->deskripsi }}</p>

        <!-- Nama Lembaga (contoh tetap) -->
        <div class="d-flex align-items-center mb-3">
            <img src="{{ Vite::asset('resources/img/masjidTakhobbar.png') }}" alt="Nama Lembaga" class="rounded-circle me-2"
                width="40" height="40">
            <h6 class="mb-0 fw-semibold">Masjid Takhobbar</h6>
        </div>

        <!-- Progress Bar & Total Donasi -->
        <div class="mb-2">
            <div class="progress" style="height: 10px;">
                @php
                    $progress = $donasi->unlimited_target ? 100 : ($donasi->terkumpul / $donasi->target) * 100;
                    $progress = min($progress, 100);
                @endphp
                <div class="progress-bar bg-success" role="progressbar" style="width: {{ $progress }}%"></div>
            </div>
        </div>

        <p class="fw-bold text-success mb-4">
            Rp. {{ number_format($donasi->terkumpul ?? 0, 0, ',', '.') }}
            <span class="text-muted fw-normal">
                terkumpul dari
                <strong class="text-danger">
                    {{ $donasi->unlimited_target ? '∞ Tak Terbatas' : 'Rp. ' . number_format($donasi->target, 0, ',', '.') }}
                </strong>
            </span>
        </p>

        <!-- Daftar Donatur -->
        <h3 class="fw-bold mb-3 mt-3 text-center">Daftar Donatur</h3>
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle text-center">
                <thead class="table-success">
                    <tr>
                        <th>Tanggal</th>
                        <th>Nama</th>
                        <th>Nominal</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($donaturs as $donatur)
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($donatur->created_at)->format('d-m-Y') }}</td>
                            <td>{{ $donatur->nama }}</td>
                            <td>Rp. {{ number_format($donatur->nominal, 0, ',', '.') }}</td>
                            <td>{{ $donatur->email }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">Belum ada donatur.</td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>

    </div>
@endsection
