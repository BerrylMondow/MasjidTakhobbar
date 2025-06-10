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
    </style>

    <div class="container my-4">
        <div id="beritaCarousel" class="carousel slide carousel-container" data-bs-ride="carousel">
            <div class="carousel-inner">

                <div class="carousel-item active">
                    <img src="https://assets.promediateknologi.id/crop/0x0:0x0/0x0/webp/photo/p3/93/2024/07/07/apakah-catur-temasuk-olahragajp-20220720114858-2534784722.jpg"
                        alt="Slide 1">
                    <div class="carousel-caption">
                        <span class="news-badge">Berita Terbaru</span>
                        <h5 class="fw-bold mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit......</h5>
                    </div>
                </div>

                <div class="carousel-item">
                    <img src="https://blog-asset.jakartanotebook.com/2023/03/carlos-esteves-G8wvNzm_fK0-unsplash.jpg"
                        alt="Slide 2">
                    <div class="carousel-caption">
                        <span class="news-badge">Berita Terbaru</span>
                        <h5 class="fw-bold mb-0">Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua......
                        </h5>
                    </div>
                </div>

                <div class="carousel-item">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/4e/Chess_pieces_close_up.jpg/1200px-Chess_pieces_close_up.jpg"
                        alt="Slide 3">
                    <div class="carousel-caption">
                        <span class="news-badge">Berita Terbaru</span>
                        <h5 class="fw-bold mb-0">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris......
                        </h5>
                    </div>
                </div>

                <div class="carousel-item">
                    <img src="https://cdn.hswstatic.com/gif/chess-4.jpg" alt="Slide 4">
                    <div class="carousel-caption">
                        <span class="news-badge">Berita Terbaru</span>
                        <h5 class="fw-bold mb-0">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                            deserunt......</h5>
                    </div>
                </div>

                <div class="carousel-item">
                    <img src="https://media.npr.org/assets/img/2016/10/24/gettyimages-492378344_wide-f3e5a7f1f38d3b896dd2aff1bc1370dcaf3d9b89.jpg?s=1400&c=100&f=jpeg"
                        alt="Slide 5">
                    <div class="carousel-caption">
                        <span class="news-badge">Berita Terbaru</span>
                        <h5 class="fw-bold mb-0">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                            dolore eu fugiat nulla pariatur......</h5>
                    </div>
                </div>

            </div>

            <!-- Controls -->
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
            <!-- Komponen Artikel 1 -->
            <div class="col-md-6 mb-2">
                <a href="/detail-artikel/1" class="text-decoration-none text-dark">
                    <div class="article-card border rounded shadow-sm overflow-hidden">
                        <div class="row g-0 h-100">
                            <div class="col-md-5">
                                <img src="{{ Vite::asset('resources/img/masjid.png') }}" alt="Picture"
                                    class="img-fluid h-100 w-100 rounded-start object-fit-cover">
                            </div>
                            <div class="col-md-7 p-3 d-flex flex-column">
                                <div class="article-title fw-bold fs-5">
                                    Lorem ipsum dolor sit amet, consectetur…..
                                </div>
                                <div class="article-meta mb-2 text-muted">
                                    <span class="text-primary fw-bold">by Masjid Takhobbar</span> &nbsp;|&nbsp;
                                    <i class="bi bi-calendar-event"></i> December 16, 2023
                                </div>
                                <p class="mb-0">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vel justo nec arcu
                                    eleifend aliquet. Vestibulum ante ipsum primis in faucibus orci luctus et……
                                </p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>



            <!-- Komponen Artikel 2 (contoh kedua) -->
            <div class="col-md-6 mb-2">
                <div class="article-card border rounded shadow-sm overflow-hidden">
                    <div class="row g-0 h-100">
                        <div class="col-md-5">
                            <img src="{{ Vite::asset('resources/img/masjid.png') }}" alt="Picture"
                                class="img-fluid h-100 w-100 rounded-start object-fit-cover">
                        </div>
                        <div class="col-md-7 p-3 d-flex flex-column">
                            <div class="article-title fw-bold fs-5">
                                Lorem ipsum dolor sit amet, consectetur…..
                            </div>
                            <div class="article-meta mb-2 text-muted">
                                <span class="text-primary fw-bold">by Masjid Takhobbar</span> &nbsp;|&nbsp;
                                <i class="bi bi-calendar-event"></i> December 16, 2023
                            </div>
                            <p class="mb-0">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vel justo nec arcu
                                eleifend aliquet. Vestibulum ante ipsum primis in faucibus orci luctus et……
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-2">
                <div class="article-card border rounded shadow-sm overflow-hidden">
                    <div class="row g-0 h-100">
                        <div class="col-md-5">
                            <img src="{{ Vite::asset('resources/img/masjid.png') }}" alt="Picture"
                                class="img-fluid h-100 w-100 rounded-start object-fit-cover">
                        </div>
                        <div class="col-md-7 p-3 d-flex flex-column">
                            <div class="article-title fw-bold fs-5">
                                Lorem ipsum dolor sit amet, consectetur…..
                            </div>
                            <div class="article-meta mb-2 text-muted">
                                <span class="text-primary fw-bold">by Masjid Takhobbar</span> &nbsp;|&nbsp;
                                <i class="bi bi-calendar-event"></i> December 16, 2023
                            </div>
                            <p class="mb-0">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vel justo nec arcu
                                eleifend aliquet. Vestibulum ante ipsum primis in faucibus orci luctus et……
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-2">
                <div class="article-card border rounded shadow-sm overflow-hidden">
                    <div class="row g-0 h-100">
                        <div class="col-md-5">
                            <img src="{{ Vite::asset('resources/img/masjid.png') }}" alt="Picture"
                                class="img-fluid h-100 w-100 rounded-start object-fit-cover">
                        </div>
                        <div class="col-md-7 p-3 d-flex flex-column">
                            <div class="article-title fw-bold fs-5">
                                Lorem ipsum dolor sit amet, consectetur…..
                            </div>
                            <div class="article-meta mb-2 text-muted">
                                <span class="text-primary fw-bold">by Masjid Takhobbar</span> &nbsp;|&nbsp;
                                <i class="bi bi-calendar-event"></i> December 16, 2023
                            </div>
                            <p class="mb-0">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vel justo nec arcu
                                eleifend aliquet. Vestibulum ante ipsum primis in faucibus orci luctus et……
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-2">
                <div class="article-card border rounded shadow-sm overflow-hidden">
                    <div class="row g-0 h-100">
                        <div class="col-md-5">
                            <img src="{{ Vite::asset('resources/img/masjid.png') }}" alt="Picture"
                                class="img-fluid h-100 w-100 rounded-start object-fit-cover">
                        </div>
                        <div class="col-md-7 p-3 d-flex flex-column">
                            <div class="article-title fw-bold fs-5">
                                Lorem ipsum dolor sit amet, consectetur…..
                            </div>
                            <div class="article-meta mb-2 text-muted">
                                <span class="text-primary fw-bold">by Masjid Takhobbar</span> &nbsp;|&nbsp;
                                <i class="bi bi-calendar-event"></i> December 16, 2023
                            </div>
                            <p class="mb-0">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vel justo nec arcu
                                eleifend aliquet. Vestibulum ante ipsum primis in faucibus orci luctus et……
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-2">
                <div class="article-card border rounded shadow-sm overflow-hidden">
                    <div class="row g-0 h-100">
                        <div class="col-md-5">
                            <img src="{{ Vite::asset('resources/img/masjid.png') }}" alt="Picture"
                                class="img-fluid h-100 w-100 rounded-start object-fit-cover">
                        </div>
                        <div class="col-md-7 p-3 d-flex flex-column">
                            <div class="article-title fw-bold fs-5">
                                Lorem ipsum dolor sit amet, consectetur…..
                            </div>
                            <div class="article-meta mb-2 text-muted">
                                <span class="text-primary fw-bold">by Masjid Takhobbar</span> &nbsp;|&nbsp;
                                <i class="bi bi-calendar-event"></i> December 16, 2023
                            </div>
                            <p class="mb-0">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vel justo nec arcu
                                eleifend aliquet. Vestibulum ante ipsum primis in faucibus orci luctus et……
                            </p>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection
