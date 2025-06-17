@extends('layout.app')

@section('content')
<style>
    .author-name {
        color: #2f6de1;
        font-weight: 600;
    }

    .share-icons img {
        width: 28px;
        margin-right: 10px;
    }

    .news-image-caption {
        font-size: 13px;
        text-align: center;
        margin-top: 5px;
        color: #888;
    }

    .news-container {
        margin-top: 100px;
    }
</style>

<div class="container news-container mb-4">
    {{-- JUDUL DAN META --}}
    <h1 class="fw-bold text-center">{{ $berita->judul }}</h1>
    <p class="text-center mb-1">
        <span class="author-name"><b>by Masjid Takhobbar</b></span><br>
        <small>{{ \Carbon\Carbon::parse($berita->tanggal)->translatedFormat('l, d F Y, H.i') }} WIB</small>
    </p>

    {{-- GAMBAR UTAMA --}}
    <div class="my-4 text-center">
        <img src="{{ asset('storage/berita/' . $berita->gambar) }}" class="img-fluid rounded" alt="Gambar Berita">
        <div class="news-image-caption">{{ $berita->gambar_caption }}</div>
    </div>

    {{-- KONTEN BERITA (PAKE PAGINATION JS) --}}
    <div id="original-content" style="display:none">
        <p>{!! nl2br(e($berita->deskripsi)) !!}</p>
    </div>

    <div id="text-content" class="mb-4 content"></div>

    <div class="container">
        <nav aria-label="...">
            <ul id="pagination" class="pagination justify-content-center"></ul>
        </nav>
    </div>

    {{-- KATA KUNCI --}}
    <div class="d-flex">
        <p class="fw-bold fs-5 me-2 text-primary">Kata Kunci:</p>
        <p class="fs-5 fw-bold">{{ $berita->keyword }}</p>
    </div>

    {{-- BAGIKAN --}}
    <div class="d-flex align-items-center mt-5">
        <p class="fs-5 fw-bold me-2">Bagikan:</p>
        <div class="share-icons d-flex">
            <a href="#"><img src="https://cdn-icons-png.flaticon.com/512/733/733547.png" alt="Facebook" title="Facebook"></a>
            <a href="#"><img src="https://cdn-icons-png.flaticon.com/512/2111/2111728.png" alt="WhatsApp" title="WhatsApp"></a>
            <a href="#"><img src="https://cdn-icons-png.flaticon.com/512/3046/3046122.png" alt="TikTok" title="TikTok"></a>
        </div>
    </div>
</div>

{{-- PAGINATION SCRIPT --}}
<script>
    const charsPerPage = 3000;
    const originalParagraphs = document.querySelectorAll("#original-content p");
    let combinedText = "";

    originalParagraphs.forEach(p => {
        combinedText += p.textContent + "\n\n";
    });

    const totalPages = Math.ceil(combinedText.length / charsPerPage);
    const textContainer = document.getElementById('text-content');
    const paginationContainer = document.getElementById('pagination');

    function showPage(page) {
        const start = (page - 1) * charsPerPage;
        const end = page * charsPerPage;
        const pageText = combinedText.slice(start, end);

        const paragraphs = pageText.split("\n\n");
        textContainer.innerHTML = "";
        paragraphs.forEach(par => {
            const p = document.createElement("p");
            p.textContent = par;
            textContainer.appendChild(p);
        });

        paginationContainer.innerHTML = '';

        const prevLi = document.createElement('li');
        prevLi.className = 'page-item' + (page === 1 ? ' disabled' : '');
        const prevA = document.createElement('a');
        prevA.className = 'page-link';
        prevA.href = '#';
        prevA.innerText = 'Previous';
        prevA.onclick = (e) => {
            e.preventDefault();
            if (page > 1) showPage(page - 1);
        };
        prevLi.appendChild(prevA);
        paginationContainer.appendChild(prevLi);

        for (let i = 1; i <= totalPages; i++) {
            const li = document.createElement('li');
            li.className = 'page-item' + (i === page ? ' active' : '');
            const a = document.createElement('a');
            a.className = 'page-link';
            a.href = '#';
            a.innerText = i;
            a.onclick = (e) => {
                e.preventDefault();
                showPage(i);
            };
            li.appendChild(a);
            paginationContainer.appendChild(li);
        }

        const nextLi = document.createElement('li');
        nextLi.className = 'page-item' + (page === totalPages ? ' disabled' : '');
        const nextA = document.createElement('a');
        nextA.className = 'page-link';
        nextA.href = '#';
        nextA.innerText = 'Next';
        nextA.onclick = (e) => {
            e.preventDefault();
            if (page < totalPages) showPage(page + 1);
        };
        nextLi.appendChild(nextA);
        paginationContainer.appendChild(nextLi);
    }

    showPage(1);
</script>

@endsection
