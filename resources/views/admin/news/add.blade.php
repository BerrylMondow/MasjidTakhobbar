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
                        <input type="file" class="form-control" id="gambar" name="gambar" required
                            oninvalid="if (!this.validity.customError) this.setCustomValidity('Silakan pilih gambar berita dengan format JPG, JPEG, atau PNG!')"
                            oninput="this.setCustomValidity('')"
                            onchange="
               const file = this.files[0];
               if (file) {
                   const ext = file.name.split('.').pop().toLowerCase();
                   if (!['jpg','jpeg','png'].includes(ext)) {
                       this.setCustomValidity('Format gambar harus JPG, JPEG, atau PNG!');
                   } else {
                       this.setCustomValidity('');
                   }
               } else {
                   this.setCustomValidity('Pilih gambar berita (Format gambar harus JPG, JPEG, atau PNG !)');
               }
           ">
                        <div id="gambar-error" class="invalid-feedback"></div>
                    </div>


                    <!-- CAPTION GAMBAR -->
                    <div class="mb-3">
                        <label for="gambar_caption" class="form-label">Caption Gambar</label>
                        <input type="text" class="form-control" id="gambar_caption" name="gambar_caption"
                            placeholder="Masukkan caption gambar" required
                            oninvalid="this.setCustomValidity('Silakan masukkan caption gambar!')"
                            oninput="this.setCustomValidity('')">
                        <div class="invalid-feedback">
                            Harap memasukkan caption gambar!
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
                            Silahkan masukkan judul berita !
                        </div>
                    </div>

                    <!-- DESKRIPSI -->
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi Berita</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" placeholder="Masukkan deskripsi berita"
                            required oninvalid="this.setCustomValidity('Silakan masukkan deskripsi berita!')"
                            oninput="this.setCustomValidity('')"></textarea>
                        <div class="invalid-feedback">
                            Silahkan masukkan deskripsi berita!
                        </div>
                    </div>

                    <!-- TANGGAL -->
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal Berita</label>
                        <input type="datetime-local" class="form-control" id="tanggal" name="tanggal" required
                            oninvalid="this.setCustomValidity('Silakan pilih tanggal berita!')"
                            oninput="this.setCustomValidity('')">
                        <div class="invalid-feedback">
                            Pilih tanggal berita!
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
                            Harap memasukkan kata kunci!
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success">Simpan Berita</button>
                </form>
                <!-- FORM SELESAI -->

            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('form-berita');
            const gambarInput = document.getElementById('gambar');
            const gambarError = document.getElementById('gambar-error');
            const maxSizeMB = 2;
            const maxSizeBytes = maxSizeMB * 1024 * 1024;

            // Validasi saat user memilih file
            gambarInput.addEventListener('change', function() {
                this.setCustomValidity('');
                this.classList.remove('is-invalid');
                gambarError.textContent = '';

                const file = this.files[0];
                if (file) {
                    const ext = file.name.split('.').pop().toLowerCase();

                    if (!['jpg', 'jpeg', 'png'].includes(ext)) {
                        this.setCustomValidity('Format gambar harus JPG, JPEG, atau PNG!');
                        gambarError.textContent = 'Format gambar harus JPG, JPEG, atau PNG!';
                        this.classList.add('is-invalid');
                    } else if (file.size > maxSizeBytes) {
                        this.setCustomValidity(`Ukuran gambar maksimal ${maxSizeMB} MB!`);
                        gambarError.textContent = `Ukuran gambar maksimal ${maxSizeMB} MB!`;
                        this.classList.add('is-invalid');
                    }
                } else {
                    this.setCustomValidity('Silakan pilih gambar berita!');
                    gambarError.textContent = 'Silakan pilih gambar berita!';
                    this.classList.add('is-invalid');
                }
            });

            // Validasi saat submit
            form.addEventListener('submit', function(event) {
                const file = gambarInput.files[0];
                gambarInput.setCustomValidity('');
                gambarError.textContent = '';

                if (!file) {
                    gambarInput.setCustomValidity('Silakan pilih gambar berita!');
                    gambarError.textContent = 'Silakan pilih gambar berita!';
                    gambarInput.classList.add('is-invalid');
                } else {
                    const ext = file.name.split('.').pop().toLowerCase();
                    if (!['jpg', 'jpeg', 'png'].includes(ext)) {
                        gambarInput.setCustomValidity('Format gambar harus JPG, JPEG, atau PNG!');
                        gambarError.textContent = 'Format gambar harus JPG, JPEG, atau PNG!';
                        gambarInput.classList.add('is-invalid');
                    } else if (file.size > maxSizeBytes) {
                        gambarInput.setCustomValidity(`Ukuran gambar maksimal ${maxSizeMB} MB!`);
                        gambarError.textContent = `Ukuran gambar maksimal ${maxSizeMB} MB!`;
                        gambarInput.classList.add('is-invalid');
                    }
                }

                // Kalau ada error, hentikan submit
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }

                form.classList.add('was-validated');
            });
        });
    </script>
@endsection
