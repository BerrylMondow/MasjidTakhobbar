@extends('admin.layout.app')

@section('content')
    <div class="container">
        <div class="mb-4">
            <a href="{{ route('admin.news.list') }}" class="btn btn-primary">← Kembali ke Daftar Berita</a>
        </div>

        <div class="card">
            <div class="card-header bg-dark text-white">
                <h5 class="mb-0">Form Edit Berita</h5>
            </div>
            <div class="card-body" style="max-height: 500px; overflow-y: auto;">

                <!-- FORM MULAI -->
                <form action="{{ route('admin.berita.update', $news->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="gambar" class="form-label">Ganti Gambar (Opsional)</label>
                        <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*">
                        <small class="text-muted">Biarkan kosong jika tidak ingin mengganti gambar.</small><br>
                        <img src="{{ asset('uploads/berita/' . $news->gambar) }}" alt="Gambar Lama" width="150" class="mt-2">
                    </div>

                    <div class="mb-3">
                        <label for="gambar_caption" class="form-label">Caption Gambar</label>
                        <input type="text" class="form-control" id="gambar_caption" name="gambar_caption"
                            value="{{ old('gambar_caption', $news->gambar_caption) }}" placeholder="Masukkan caption gambar">
                    </div>

                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul Berita</label>
                        <input type="text" class="form-control" id="judul" name="judul"
                            value="{{ old('judul', $news->judul) }}" placeholder="Masukkan judul berita" required>
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi Berita</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" placeholder="Masukkan deskripsi berita" required>{{ old('deskripsi', $news->deskripsi) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal Berita</label>
                        <input type="datetime-local" class="form-control" id="tanggal" name="tanggal"
                            value="{{ old('tanggal', \Carbon\Carbon::parse($news->tanggal)->format('Y-m-d\TH:i')) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="keyword" class="form-label">Kata Kunci</label>
                        <input type="text" class="form-control" id="keyword" name="keyword"
                            value="{{ old('keyword', $news->keyword) }}" placeholder="Contoh: Ramadhan, Masjid, Kegiatan" required>
                    </div>

                    <button type="submit" class="btn btn-success">Update Berita</button>
                </form>
                <!-- FORM SELESAI -->

            </div>
        </div>
    </div>
@endsection
