@extends('layout.app')
@section('content')
    <style>
        .profile {
            margin-top: 90px;
            margin-bottom: 80px;
        }

        .berita-terbaru {
            background-color: #6d0000;
            color: white;
            padding: 8px 16px;
            font-weight: bold;
            border-radius: 3px 3px 0 0;
        }

        .berita-item {
            display: flex;
            gap: 10px;
            margin-bottom: 12px;
        }

        .berita-item img {
            width: 100px;
            height: 60px;
            object-fit: cover;
            border-radius: 3px;
        }

        .berita-list {
            background: #fff;
            padding: 15px;
            border-radius: 0 0 5px 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        .berita-item small {
            font-size: 12px;
            color: gray;
        }


        .berita-hover:hover .berita-judul {
            color: #0d6efd;
            transition: color 0.3s;
        }

        h2 {
            font-weight: 700;
        }
    </style>

    <div class="container profile">
        <div class="row">
            <!-- Kolom Tentang Kami -->
            <div class="col-md-8">
                <h2 class="mb-4">Tentang Kami</h2>

                <p>Masjid Takhobbar, orang biasa menyebut dengan Masjid Telkom, dibangun dan diresmikan pada tanggal 12
                    Agustus
                    1991 oleh Direktur Utama PT. Telekomunikasi saat itu, Bapak H. Cacuk Sudarijanto, adalah sarana ibadah
                    yang
                    mulanya memfasilitasi kegiatan ibadah karyawan di lingkungan Telkom Jatim yang berlokasi di Jl.
                    Ketintang
                    156 Surabaya.</p>

                <p>Namun seiring dengan akselerasi kegiatan yang dilaksanakan oleh BKM Masjid Takhobbar khususnya program
                    pengajian harian ba’da Dhuhur dan ba’da Maghrib yang diapresiasi oleh Masyarakat sekitar Telkom, maka
                    Masjid
                    Takhobbar disamping sebagai sarana ibadah karyawan Telkom, keberadaannya pun sangat dirasakan manfaatnya
                    oleh Masyarakat sekitar Telkom juga kalangan akademisi, baik UINSA, UNESA maupun yang lain.</p>

                <p>Untuk menunjang layanan ibadah dan kenyamanan jamaah dalam shalat serta menambah cakrawala informasi dan
                    memperkuat keimanan dan ketaqwaaan kepada Allah SWT. juga menumbuhkan solidaritas sosial dengan sesama
                    dan
                    ikatan tali silaturrahim, setiap hari ba’da shalat Dhuhur diadakan kegiatan ceramah Dhuhur dengan materi
                    yang variatif dan ustadz yang kompeten di bidangnya. Adapun materinya antara lain: Tazkiyatun Nafs,
                    Tafsir
                    Al-Qur’an, ESQ, Sejarah Peradaban Islam, Kajian Tauhid, Islam Sehari-hari, Fiqh Ibadah, Tasawuf dan
                    Imunologi, Ulumul Qur'an, Mustholah Hadits, Sirah Nabawiyah, Hadits Tematik, Fiqhus Sunnah, dan
                    Manajemen
                    Islami.</p>

                <p>Disamping ceramah ba’da Dhuhur, untuk memberikan pencerahan dan bimbingan spiritual kepada jamaah selain
                    karyawan Telkom juga diadakan kegiatan ceramah Ba’da Shalat Maghrib.</p>

                <p>Selain itu, ada juga kegiatan taslim yang diadakan di Masjid Takhobbar Telkom. Kegiatan ini, kata
                    H.Muhamad,
                    Ketua Takmir Masjid Takhobbar, untuk memberikan tashih sekaligus syahadah bagi para pemeluk agama lain
                    yang
                    berkeinginan untuk memeluk agama Islam dengan mengucapkan dua kalimat syahadat yang dibimbing langsung
                    oleh
                    Ustadz, Kiai dan profesor yang bertugas ceramah atau khutbah pada saat itu. Biasanya BKM Masjid
                    Takhobbar
                    mengumumkan sebelum dimulai shalat Dhuhur kepada para jamaah karyawan Telkom untuk turut serta
                    menyaksikan
                    keislaman orang yang masuk agama Islam sekaligus mohon keikhlasannya untuk memberikan support baik dalam
                    bentuk material maupun spiritual.</p>

                <p>Untuk layanan sosial kemanusiaan, Masjid Takhobbar juga menyediakan Ambulance Gratis bagi dluafa’ dan
                    hanya
                    ganti BBM serta ongkos sopir bagi karyawan Telkom maupun masyarakat. Untuk bidang layanan ini, bisa
                    menghubungi driver Ambulance Bapak Sampirno: NO. HP. 085101156068.</p>
            </div>


            <!-- Kolom Berita Terbaru -->
            <div class="col-md-4">
                <div class="berita-terbaru fw-bold mb-3">Berita Terbaru</div>

                <div class="berita-list">
                    @forelse ($beritas as $berita)
                        <div class="berita-item d-flex mb-3 berita-hover" style="cursor: pointer;">
                            <img src="{{ asset('storage/berita/' . $berita->gambar) }}" alt="Berita"
                                style="width: 100px; height: 60px; object-fit: cover; margin-right: 10px; border-radius: 5px;">
                            <div>
                                <a href="{{ route('berita.show', $berita->id) }}" class="text-decoration-none text-dark">
                                    <p class="mb-1 fw-semibold berita-judul" style="font-size: 14px;">
                                        {{ Str::limit($berita->judul, 50, '...') }}
                                    </p>
                                </a>
                                <small>{{ \Carbon\Carbon::parse($berita->tanggal)->format('d-m-Y') }}</small>
                            </div>
                        </div>
                    @empty
                        <p class="text-muted">Belum ada berita terbaru.</p>
                    @endforelse
                </div>
            </div>


        </div>

    </div>
@endsection
