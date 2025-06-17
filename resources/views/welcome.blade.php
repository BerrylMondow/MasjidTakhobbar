@extends('layouts.app')

@section('content')
    <style>
        .calendar .row {
            margin-bottom: 0.3rem;
        }

        .calendar .col {
            background-color: #f8f9fa;
        }

        .calendar .col:hover {
            background-color: #e2e6ea;
        }
    </style>
    <style>
        .calendar {
            max-width: 600px;
            margin: auto;
        }

        .calendar .day {
            border: 1px solid #ddd;
            height: 80px;
            text-align: center;
            vertical-align: middle;
            line-height: 80px;
        }

        .calendar .day-header {
            background-color: #007bff;
            color: #fff;
            font-weight: bold;
        }


        .overlay {
            background-color: rgba(0, 0, 0, 0.5);
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

    <!-- ✅ HERO -->
    <section class="hero">
        <div class="overlay text-center">
            <h1 class="display-5 fw-bold">Selamat Datang di Masjid<br>Takhobbar Surabaya</h1>
            <a href="#" class="btn btn-maroon mt-4">Baca Selengkapnya</a>
        </div>
    </section>

    <!-- ✅ SECTION JADWAL SHOLAT -->
    <section class="JadwalSholat">
        <div class="container w-25 my-5">
            <div class="bg-danger text-white rounded p-4 text-center">
                <h5 id="today-date" class="mb-3">Senin, 1 Januari 2000</h5>
                <h1 id="next-prayer-name" class="fw-bold">Sholat</h1>
                <div class="d-flex justify-content-center align-items-center mt-3">
                    <div class="mx-2 text-center">
                        <h2 id="hours" class="mb-0">0</h2>
                        <small>Hours</small>
                    </div>
                    <div class="mx-2 text-center">
                        <h2 id="minutes" class="mb-0">0</h2>
                        <small>Minutes</small>
                    </div>
                    <div class="mx-2 text-center">
                        <h2 id="seconds" class="mb-0">0</h2>
                        <small>Seconds</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <h1 class="text-center text-uppercase fw-bold">Jadwal Sholat</h1>
            <div class="container-fluid">
                <ul class="list-group w-50 mt-4 mx-auto" id="prayer-list">
                    <!-- Akan diisi otomatis oleh JS -->
                </ul>
            </div>
        </div>
    </section>

    <!-- ✅ SECTION ARTIKEL BERITA -->
    <section class="ArtikelBerita">
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

                <!-- Komponen Artikel 2 -->
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

                <!-- Tambah artikel lain di sini -->
            </div>

        </div>
    </section>

    <section class="Infaq my-5">
  <div class="container">
    <h1 class="text-center text-uppercase fw-bold mb-4">Infaq Masjid</h1>
    <div class="table-responsive">
      <table class="table table-bordered table-striped">
        <thead class="table-dark">
          <tr>
            <th scope="col">Tanggal</th>
            <th scope="col">Nominal</th>
            <th scope="col">Keterangan</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>17 Juni 2025</td>
            <td>Rp 100.000</td>
            <td>Infaq Pembangunan</td>
          </tr>
          <tr>
            <td>18 Juni 2025</td>
            <td>Rp 50.000</td>
            <td>Infaq Sholat Jum'at</td>
          </tr>
          <tr>
            <td>19 Juni 2025</td>
            <td>Rp 200.000</td>
            <td>Infaq Rutin</td>
          </tr>
          <!-- Tambahkan baris lainnya sesuai kebutuhan -->
        </tbody>
      </table>
    </div>
  </div>
</section>













    <script>
        function formatDateID(date) {
            const days = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
            const months = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September",
                "Oktober", "November", "Desember"
            ];
            return `${days[date.getDay()]}, ${date.getDate()} ${months[date.getMonth()]} ${date.getFullYear()}`;
        }

        function timeToMinutes(timeStr) {
            const [h, m] = timeStr.split(':').map(Number);
            return h * 60 + m;
        }

        const labelMap = {
            "Imsak": "Imsak",
            "Fajr": "Shubuh",
            "Sunrise": "Syuruq",
            "Dhuhr": "Dzuhur",
            "Asr": "Ashar",
            "Maghrib": "Maghrib",
            "Isha": "Isya"
        };

        const latitude = -7.2574719;
        const longitude = 112.7520883;

        let timings = {};
        let orderedKeys = [];

        function updateDate() {
            const today = new Date();
            document.getElementById("today-date").textContent = formatDateID(today);
        }

        updateDate();

        fetch(`https://api.aladhan.com/v1/timings?latitude=${latitude}&longitude=${longitude}&method=11`)
            .then(res => res.json())
            .then(data => {
                timings = data.data.timings;
                orderedKeys = Object.keys(labelMap);

                const prayerList = document.getElementById('prayer-list');
                prayerList.innerHTML = '';

                orderedKeys.forEach(key => {
                    const li = document.createElement('li');
                    li.className = 'list-group-item d-flex justify-content-between align-items-center';
                    li.innerHTML = `
          ${labelMap[key]}
          <span class="badge text-bg-dark rounded-pill">${timings[key]}</span>
        `;
                    prayerList.appendChild(li);
                });

                updateHighlightAndCountdown();
            })
            .catch(err => console.error(err));

        function updateHighlightAndCountdown() {
            const now = new Date();
            const nowMinutes = now.getHours() * 60 + now.getMinutes();
            const listItems = document.querySelectorAll('#prayer-list li');

            const times = orderedKeys.map((key, idx) => {
                const [h, m] = timings[key].split(':').map(Number);
                let t = new Date();
                t.setHours(h, m, 0, 0);
                return {
                    key,
                    label: labelMap[key],
                    date: t,
                    minutes: h * 60 + m,
                    li: listItems[idx]
                };
            });

            // 1) Reset highlight
            times.forEach(t => t.li.classList.remove('bg-primary', 'text-light'));

            // 2) Cari yang aktif (terdekat yang waktu nya <= sekarang)
            let active = times[0];
            for (let i = 0; i < times.length; i++) {
                if (nowMinutes >= times[i].minutes) {
                    active = times[i];
                } else {
                    break;
                }
            }

            // Highlight yang aktif
            active.li.classList.add('bg-primary', 'text-light');

            // 3) Cari countdown ke berikutnya (> sekarang)
            let next = times.find(t => t.minutes > nowMinutes);
            if (!next) {
                // Sudah lewat Isya -> ke Imsak besok
                next = times[0];
                next.date.setDate(next.date.getDate() + 1);
            }

            // Update nama jadwal berikutnya
            document.getElementById("next-prayer-name").textContent = next.label;

            // Update countdown
            const diffSec = Math.floor((next.date - now) / 1000);
            const hrs = Math.floor(diffSec / 3600);
            const mins = Math.floor((diffSec % 3600) / 60);
            const secs = diffSec % 60;

            document.getElementById("hours").textContent = hrs;
            document.getElementById("minutes").textContent = mins;
            document.getElementById("seconds").textContent = secs;

            // Update tanggal juga
            updateDate();
        }

        setInterval(updateHighlightAndCountdown, 1000);
    </script>
@endsection
