@extends ('admin.layout.app')
@section('content')
    <div class="overflow-auto" style="max-height: 600px;">
        <div class="container py-5">
            <h2 class="text-center mb-4">Buat Donasi Baru</h2>

            <!-- Input gambar donasi -->
            <div class="mb-3">
                <label class="form-label">Input gambar</label>
                <input type="file" class="form-control">
            </div>

            <!-- Judul Donasi -->
            <div class="mb-3">
                <input type="text" class="form-control" placeholder="Input Judul Donasi">
            </div>

            <!-- Minimal & Maksimal Nominal + Tombol Tak Terbatas -->
            <div class="row g-2 mb-3">
                <div class="col-md-4">
                    <input type="number" class="form-control" placeholder="Minimal Nominal transaksi">
                    <!-- Minimal input transaksi nominal pada user untuk donasi -->
                </div>
                <div class="col-md-4">
                    <input type="number" id="maxNominal" class="form-control" placeholder="Maksimal Nominal">
                    <!-- Maksimal target nominal pada program donasi -->
                </div>
                <div class="col-md-4">
                    <button type="button" id="takTerbatasBtn" class="btn btn-dark w-100">Tak Terbatas</button>
                    <!-- Jika diaktifkan, maka tidak ada maksimal target nominal pada program donasi-->
                </div>
            </div>

            <!-- Input gambar lembaga -->
            <div class="mb-3">
                <label class="form-label">Input Gambar Lembaga</label>
                <input type="file" class="form-control" id="imageInput" name="image">
                <!-- Preview gambar -->
                <img src="" alt="Preview" id="imagePreview" class="img-fluid mt-2 d-none"
                    style="max-width: 50px;">
            </div>

            <!-- Nama Lembaga -->
            <div class="mb-3">
                <input type="text" class="form-control" placeholder="Nama Lembaga" id="namaLembaga" name="nama_lembaga">
            </div>

            <!-- Checkbox Mark as Trusted -->
            <div class="form-check mb-2">
                <input class="form-check-input" type="checkbox" id="trustedCheck" name="trusted">
                <label class="form-check-label" for="trustedCheck">
                    Mark as Trusted
                </label>
            </div>

            <!-- Checkbox Mark as Own Institution -->
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" id="ownInstitutionCheck" name="own_institution">
                <label class="form-check-label" for="ownInstitutionCheck">
                    Mark as Own Institution
                </label>
            </div>


            <!-- Tambah Tag -->
            <div class="container py-5">
                <!-- Tambah Tag -->
                <div class="row g-2 mb-3">
                    <div class="col-md-8">
                        <input type="text" id="tagInput" class="form-control" placeholder="Tambahkan Tag (max. 2 tag)">
                    </div>
                    <div class="col-md-4">
                        <button type="button" id="addTagBtn" class="btn btn-danger w-100">Tambah Tag</button>
                    </div>
                </div>

                <!-- Tag List Dynamic -->
                <div id="tagList" class="mb-3"></div>
            </div>

            <!-- Modal Warning Max 2 Tag -->
            <div class="modal fade" id="maxTagModal" tabindex="-1" aria-labelledby="maxTagModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="maxTagModalLabel">Peringatan</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                        </div>
                        <div class="modal-body">
                            Maksimal hanya boleh 2 tag!
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Input Deskripsi -->
            <div class="mb-3">
                <textarea class="form-control" rows="5" placeholder="Input Deskripsi"></textarea>
            </div>

            <!-- Tombol Create -->
            <div class="d-grid">
                <button type="submit" class="btn btn-danger btn-lg">Create</button>
            </div>
        </div>
    </div>

    <script>
  const ownInstitutionCheck = document.getElementById('ownInstitutionCheck');
  const trustedCheck = document.getElementById('trustedCheck');
  const imageInput = document.getElementById('imageInput');
  const namaLembaga = document.getElementById('namaLembaga');
  const imagePreview = document.getElementById('imagePreview');

  ownInstitutionCheck.addEventListener('change', () => {
    if (ownInstitutionCheck.checked) {
      trustedCheck.checked = true;
      trustedCheck.disabled = true;

      namaLembaga.value = 'Masjid Takhobbar';
      namaLembaga.disabled = true;

      imageInput.classList.add('d-none');
      imageInput.disabled = true;

      imagePreview.src = '/images/Masjidtakhobbar.png'; // ganti dengan link real
      imagePreview.classList.remove('d-none');

    } else {
      trustedCheck.checked = false;
      trustedCheck.disabled = false;

      namaLembaga.value = '';
      namaLembaga.disabled = false;

      imageInput.classList.remove('d-none');
      imageInput.disabled = false;
      imageInput.value = '';

      imagePreview.src = '';
      imagePreview.classList.add('d-none');
    }
  });
</script>

    <script>
        const takTerbatasBtn = document.getElementById('takTerbatasBtn');
        const maxNominalInput = document.getElementById('maxNominal');

        takTerbatasBtn.addEventListener('click', () => {
            if (maxNominalInput.disabled) {
                // Jika sudah disabled, aktifkan kembali
                maxNominalInput.disabled = false;
                takTerbatasBtn.classList.remove('btn-secondary');
                takTerbatasBtn.classList.add('btn-dark');
            } else {
                // Jika aktif, disable input
                maxNominalInput.disabled = true;
                maxNominalInput.value = ''; // Kosongkan input jika perlu
                takTerbatasBtn.classList.remove('btn-dark');
                takTerbatasBtn.classList.add('btn-secondary');
            }
        });
    </script>

    <script>
        const tagInput = document.getElementById('tagInput');
        const addTagBtn = document.getElementById('addTagBtn');
        const tagList = document.getElementById('tagList');

        let tags = [];

        addTagBtn.addEventListener('click', function() {
            const newTag = tagInput.value.trim().toLowerCase();
            if (newTag === '') return;

            if (tags.length >= 2) {
                // Tampilkan modal jika lebih dari 2 tag
                const modal = new bootstrap.Modal(document.getElementById('maxTagModal'));
                modal.show();
                return;
            }

            if (tags.includes(newTag)) {
                alert('Tag sudah ditambahkan.');
                return;
            }

            // Tentukan warna
            const color = (newTag === 'zakat' || newTag === 'ramadhan') ? 'bg-success' : 'bg-primary';

            // Buat elemen tag
            const span = document.createElement('span');
            span.className = `badge ${color} me-2 mb-2`;
            span.textContent = newTag.charAt(0).toUpperCase() + newTag.slice(1);

            // Buat tombol close
            const btn = document.createElement('button');
            btn.type = 'button';
            btn.className = 'btn-close btn-close-white btn-sm ms-1';
            btn.onclick = function() {
                tagList.removeChild(span);
                tags = tags.filter(tag => tag !== newTag);
            };

            span.appendChild(btn);
            tagList.appendChild(span);

            tags.push(newTag);
            tagInput.value = '';
        });
    </script>
@endsection
