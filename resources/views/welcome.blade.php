@extends('layouts.app')
@section('content')
    <style>
        .overlay {
            background-color: rgba(0, 0, 0, 0.5);
            /* Efek gelap transparan */
            padding: 40px;
            border-radius: 10px;
            color: white;
        }

        .btn-maroon {
            background-color: #8b0000;
            color: white;
        }

        .btn-maroon:hover {
            background-color: #a00000;
        }

        .article-card img {
            height: 200px;
            object-fit: cover;
        }

        .article-meta {
            font-size: 0.9rem;
            color: gray;
        }

        .article-title {
            font-size: 1.5rem;
            font-weight: bold;
        }
    </style>

    <section class="hero">
        <div class="overlay text-center">
            <h1 class="display-5 fw-bold">Selamat Datang di Masjid<br>Takhobbar Surabaya</h1>
            <a href="#" class="btn btn-maroon mt-4">Baca Selengkapnya</a>
        </div>
    </section>

    <section class="JadwalSholat">
        <div class="container">
            <h1 class="text-center text-uppercase fw-bold">jadwal sholat</h1>

            <div class="container-fluid">
                <ul class="list-group w-50 mt-4 mx-auto" id="prayer-list">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Shubuh
                        <span class="badge text-bg-primary rounded-pill">10.40</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Dhuhur
                        <span class="badge text-bg-primary rounded-pill">22:46</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Ashar
                        <span class="badge text-bg-primary rounded-pill">22:00</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Maghrib
                        <span class="badge text-bg-primary rounded-pill">22:42</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Isya'
                        <span class="badge text-bg-primary rounded-pill">22:43</span>
                    </li>
                </ul>
            </div>

            <div class="container py-4 mt-4">

                <h1 class="text-center fw-bold mb-4">ARTIKEL BERITA</h1>
                <div class="row g-2">
                    <!-- Komponen Artikel 1 -->
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


        </div>
    </section>

    <script>
        function timeToMinutes(timeStr) {
            const [hours, minutes] = timeStr.split(':').map(Number);
            return hours * 60 + minutes;
        }

        function getCurrentMinutes() {
            const now = new Date();
            return now.getHours() * 60 + now.getMinutes();
        }

        function highlightPrayerTime() {
            const nowMinutes = getCurrentMinutes();
            const listItems = document.querySelectorAll('#prayer-list li');

            // Ambil semua waktu dan konversi ke menit
            const times = Array.from(listItems).map(li => {
                const timeStr = li.querySelector('span').textContent.trim();
                return {
                    li,
                    span: li.querySelector('span'),
                    minutes: timeToMinutes(timeStr)
                };
            });

            // Reset semua
            times.forEach(({
                li,
                span
            }) => {
                li.classList.remove('bg-primary', 'text-light');
                span.className = 'badge text-bg-primary rounded-pill';
            });

            // Cari waktu aktif
            for (let i = 0; i < times.length; i++) {
                const curr = times[i];
                const next = times[i + 1];
                const start = curr.minutes;
                const end = next ? next.minutes : 1440;

                if (nowMinutes >= start && nowMinutes < end) {
                    curr.li.classList.add('bg-primary', 'text-light');
                    curr.span.className = 'badge text-bg-danger rounded-pill';
                    break;
                }
            }
        }

        highlightPrayerTime();
        setInterval(highlightPrayerTime, 60000);
    </script>
@endsection
