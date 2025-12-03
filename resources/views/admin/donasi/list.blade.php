@extends('admin.layout.app')

@section('content')
    <style>
        /* .container-overflow {
                overflow: auto;
                overflow-x: hidden;
                max-height: 500px;
            } */

        /* Responsive dengan media query */
        .donasi-header {
            flex-wrap: nowrap;
        }

        .donasi-header .search-donasi {
            width: 50%;
            margin-right: 1rem;
        }

        .donasi-header .button-group a,
        .donasi-header .button-group button {
            margin-right: 0.5rem;
        }

        @media (max-width: 768px) {
            .donasi-header {
                flex-direction: column;
            }

            .donasi-header .search-donasi {
                width: 100%;
                margin-right: 0;
                margin-bottom: 1rem;
            }

            .donasi-header .button-group {
                display: flex;
                flex-direction: column;
            }

            .donasi-header .button-group a,
            .donasi-header .button-group button {
                width: 100%;
                margin-right: 0;
                margin-bottom: 0.5rem;
            }
        }
    </style>



    <div class="container">

        <!-- Top Bar -->
        
        <div class="donasi-header d-flex justify-content-between mb-4">

            

            <div class="button-group">
                <a href="{{ route('admin.donasi.add') }}" class="btn btn-primary"><i class="bi bi-plus-circle-fill"></i> Buat Donasi</a>
            </div>
            
        </div>
        


        <!-- Cards -->
        <div class="overflow-auto overflow-x-hidden" style="margin-bottom: 7vh;">
            <div class="row row-cols-1 row-cols-md-3 g-4">

                @forelse ($donasi as $item)
                    <div class="col">
                        <div class="card h-100">
                            <img src="{{ asset('storage/' . $item->gambar) }}" class="card-img-top"
                                alt="{{ $item->nama_program }}" height="200">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a href="{{ route('admin.donasi.view', $item->id) }}"
                                        class="text-decoration-none text-dark">
                                        {{ Str::limit($item->nama_program, 50) }}
                                    </a>
                                </h5>
                                <p class="card-text text-muted mb-1">
                                    <small class="fw-bold text-primary">
                                        <i class="bi bi-clock-fill"></i>
                                        {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}
                                    </small>
                                </p>
                                <div class="d-flex align-items-center mt-3 mb-3">
                                    <img src="{{ asset('images/masjidTakhobbar.png') }}" class="rounded-circle me-2"
                                        alt="Lembaga" width="30" height="30">
                                    <div class="d-flex align-items-center">
                                        <span class="fw-medium me-1">Masjid Takhobbar</span>
                                        <i class="bi bi-patch-check-fill text-danger verified-icon"></i>
                                    </div>
                                </div>
                                <p class="card-text">
                                    {{ Str::limit(strip_tags($item->deskripsi), 100) }}
                                </p>
                            </div>
                            <div class="card-footer bg-transparent border-0">
                                <div class="row g-2">
                                    <div class="col-6">
                                        <a href="{{ route('admin.donasi.edit', $item->id) }}"
                                            class="btn btn-success w-100">Edit</a>
                                    </div>
                                    <div class="col-6">
                                        <form action="{{ route('admin.donasi.destroy', $item->id) }}" method="POST"
                                            onsubmit="return confirm('Yakin hapus donasi ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger w-100">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                @empty
                    <h1 class="text-center">Donasi Tidak Ditemukan</h1>
                @endforelse

            </div>
        </div>

    </div>

    
@endsection
