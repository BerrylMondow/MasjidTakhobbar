@extends ('admin.layout.app')

@section('content')
<div class="container">
    <div class="mb-4">
        <a href="{{ route('admin.news.list') }}" class="btn btn-primary">← Kembali ke Daftar Berita</a>
    </div>

    <div class="card">
        <div class="card-header bg-dark text-white">
            <h5 class="mb-0">Form Buat Berita</h5>
        </div>
        <div class="card-body" style="max-height: 500px; overflow-y: auto;">

            <!-- FORM MULAI -->
            <form id="form-berita" action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data"
                novalidate>
                @csrf

                <!-- GAMBAR -->
                <div class="mb-3">
                    <label for="gambar" class="form-label">Gambar Berita</label>
                    <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*" required
                        oninvalid="if (!this.validity.customError) this.setCustomValidity('Silakan pilih gambar berita!')"
                        oninput="this.setCustomValidity('')">
                    <div id="gambar-error" class="invalid-feedback">
                        
                    </div>
                </div>

                <!-- CAPTION GAMBAR -->
                <div class="mb-3">
                    <label for="gambar_caption" class="form-label">Caption Gambar</label>
                    <input type="text" class="form-control" id="gambar_caption" name="gambar_caption"
                        placeholder="Masukkan caption gambar" required
                        oninvalid="this.setCustomValidity('Silakan masukkan caption gambar!')"
                        oninput="this.setCustomValidity('')">
                    <div class="invalid-feedback">
                        Silakan masukkan caption gambar!
                    </div>
                </div>

                <!-- JUDUL BERITA -->
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul Berita</label>
                    <input type="text" class="form-control" id="judul" name="judul"
                        placeholder="Masukkan judul berita" required
                        oninvalid="this.setCustomValidity('Silakan masukkan judul berita!')"
                        oninput="this.setCustomValidity('')">
                    <div class="invalid-feedback">
                        Silakan masukkan judul berita!
                    </div>
                </div>

                <!-- DESKRIPSI -->
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi Berita</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4"
                        placeholder="Masukkan deskripsi berita" required
                        oninvalid="this.setCustomValidity('Silakan masukkan deskripsi berita!')"
                        oninput="this.setCustomValidity('')"></textarea>
                    <div class="invalid-feedback">
                        Silakan masukkan deskripsi berita!
                    </div>
                </div>

                <!-- TANGGAL -->
                <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal Berita</label>
                    <input type="datetime-local" class="form-control" id="tanggal" name="tanggal" required
                        oninvalid="this.setCustomValidity('Silakan pilih tanggal berita!')"
                        oninput="this.setCustomValidity('')">
                    <div class="invalid-feedback">
                        Silakan pilih tanggal berita!
                    </div>
                </div>

                <!-- KATA KUNCI -->
                <div class="mb-3">
                    <label for="keyword" class="form-label">Kata Kunci</label>
                    <input type="text" class="form-control" id="keyword" name="keyword"
                        placeholder="Contoh: Ramadhan, Masjid, Kegiatan" required
                        oninvalid="this.setCustomValidity('Silakan masukkan kata kunci!')"
                        oninput="this.setCustomValidity('')">
                    <div class="invalid-feedback">
                        Silakan masukkan kata kunci!
                    </div>
                </div>

                <button type="submit" class="btn btn-success">Simpan Berita</button>
            </form>
            <!-- FORM SELESAI -->

        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('form-berita');
    const gambarInput = document.getElementById('gambar');
    const gambarError = document.getElementById('gambar-error');
    const maxSizeMB = 2;
    const maxSizeBytes = maxSizeMB * 1024 * 1024;

    gambarInput.addEventListener('change', function () {
        // Reset dulu
        this.setCustomValidity('');
        this.classList.remove('is-invalid');

        if (this.files && this.files[0]) {
            if (this.files[0].size > maxSizeBytes) {
                this.setCustomValidity(`Ukuran gambar maksimal ${maxSizeMB} MB!`);
                gambarError.textContent = `Ukuran gambar maksimal ${maxSizeMB} MB!`;
                this.classList.add('is-invalid');
            } else {
                // Reset jika ukuran valid
                gambarError.textContent = '';
            }
        } else {
            // Reset jika tidak ada file
            gambarError.textContent = '';
        }
    });

    form.addEventListener('submit', function (event) {
        // Handle error pesan default jika file belum dipilih
        if (!gambarInput.files || gambarInput.files.length === 0) {
            gambarError.textContent = 'Silakan pilih gambar berita!';
        }

        if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
        }

        form.classList.add('was-validated');
    }, false);
});

</script>
@endsection
