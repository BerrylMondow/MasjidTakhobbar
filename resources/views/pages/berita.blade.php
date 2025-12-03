@extends('layout.app')
@section('content')
    <style>
        .carousel-container {
            max-width: 1269px;
            max-height: 554px;
            margin: auto;
            overflow: hidden;
            border-radius: 8px;
            margin-top: 80px;
        }

        .carousel-item img {
            width: 100%;
            height: 554px;
            object-fit: cover;
        }

        .carousel-caption {
            background: rgba(0, 0, 0, 0.6);
            padding: 1rem;
            bottom: 0;
            left: 0;
            right: 0;
            text-align: left;
        }

        .news-badge {
            background-color: #dc3545;
            color: white;
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
            display: inline-block;
            padding: 0.3rem 0.6rem;
            border-radius: 0.3rem;
        }

        .article-card:hover {
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            transition: box-shadow 0.2s ease-in-out;
            background-color: rgba(0, 0, 0, 0.056);
        }

        /* ✅ Tambahan untuk mobile */
        @media (max-width: 768px) {

            .carousel-container {
                max-height: 300px; /* Lebih pendek di HP */
                margin-top: 80px;
            }

            .carousel-item img {
                height: 300px; /* Cocok dengan max-height container */
            }

            .carousel-caption {
                font-size: 0.9rem;
                padding: 0.5rem;
            }

            .article-card .row {
                flex-direction: column; /* Tumpuk vertikal di HP */
            }

            .article-card .col-md-5,
            .article-card .col-md-7 {
                flex: 0 0 100%;
                max-width: 100%;
            }

            .article-card img {
                height: auto;
                max-height: 200px;
                object-fit: cover;
                width: 100%;
            }
        }
    </style>

    <div class="container berita my-4">
        <div id="beritaCarousel" class="carousel slide carousel-container" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ($carouselBeritas as $index => $berita)
                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                        <a href="{{ route('berita.show', $berita->id) }}" class="text-decoration-none text-white">
                            <img src="{{ asset('storage/berita/' . $berita->gambar) }}" class="d-block w-100" alt="...">
                            <div class="carousel-caption">
                                <h5>{{ $berita->judul }}</h5>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#beritaCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#beritaCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
    </div>

    <div class="container py-4 mt-4">
        <h1 class="text-center fw-bold mb-4">BERITA LAINNYA</h1>
        <div class="row g-2">
            @foreach ($otherBeritas as $berita)
                <div class="col-md-6 mb-2">
                    <a href="{{ route('berita.show', $berita->id) }}" class="text-decoration-none text-dark">
                        <div class="article-card border rounded shadow-sm overflow-hidden">
                            <div class="row g-0 h-100">
                                <div class="col-md-5">
                                    <img src="{{ asset('storage/berita/' . $berita->gambar) }}" alt="Picture"
                                        class="img-fluid w-100 object-fit-cover">
                                </div>
                                <div class="col-md-7 p-3 d-flex flex-column">
                                    <div class="article-title fw-bold fs-5">
                                        {{ $berita->judul }}
                                    </div>
                                    <div class="article-meta mb-2 text-muted">
                                        <span class="text-primary fw-bold">by Masjid Takhobbar</span> &nbsp;|&nbsp;
                                        <i class="bi bi-calendar-event"></i>
                                        {{ \Carbon\Carbon::parse($berita->tanggal)->format('F d, Y') }}
                                    </div>
                                    <p class="mb-0">
                                        {{ Str::limit(strip_tags($berita->deskripsi), 100) }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
