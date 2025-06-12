@extends ('admin.layout.app')
@section('content')
    <div class="container">
        <div class="mb-4">
            <a href="{{ route('admin.berita') }}" class="btn btn-primary">← Kembali ke Daftar Berita</a>
        </div>

        <div class="card">
            <div class="card-header bg-dark text-white">
                <h5 class="mb-0">Form Buat Berita</h5>
            </div>
            <div class="card-body">

                <!-- FORM MULAI -->
                <form>

                    <div class="mb-3">
                        <label for="gambar" class="form-label">Gambar Berita</label>
                        <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*" required>
                    </div>

                    <div class="mb-3">
                        <label for="gambar_caption" class="form-label">Caption Gambar</label>
                        <input type="text" class="form-control" id="gambar_caption" name="gambar_caption"
                            placeholder="Masukkan caption gambar">
                    </div>


                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul Berita</label>
                        <input type="text" class="form-control" id="judul" name="judul"
                            placeholder="Masukkan judul berita" required>
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi Berita</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" placeholder="Masukkan deskripsi berita"
                            required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="keyword" class="form-label">Kata Kunci</label>
                        <input type="text" class="form-control" id="keyword" name="keyword"
                            placeholder="Contoh: Ramadhan, Masjid, Kegiatan" required>
                    </div>

                    <button type="submit" class="btn btn-success">Simpan Berita</button>
                </form>
                <!-- FORM SELESAI -->

            </div>
        </div>
    </div>
@endsection
