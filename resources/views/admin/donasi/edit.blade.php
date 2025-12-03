@extends('admin.layout.app')

@section('content')
    <div class="container mb-4">
        <a href="{{ route('admin.donasi.list') }}" class="btn btn-primary"><i class="bi bi-arrow-left-circle-fill me-1"></i>
            Kembali</a>
    </div>
    <div class="overflow-auto" style="height: 600px;">
        <div class="container">
            <h1 class="mb-4">Edit Donasi</h1>

            <form action="{{ route('admin.donasi.update', $donasi->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Gambar -->
                <div class="mb-3">
                    <label for="gambar" class="form-label">Gambar</label>
                    <input type="file" class="form-control @error('gambar') is-invalid @enderror" name="gambar"
                        id="gambar">
                    @error('gambar')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    @if ($donasi->gambar)
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $donasi->gambar) }}" alt="Gambar Donasi"
                                style="max-height: 150px;">
                        </div>
                    @endif
                </div>

                <!-- Nama Program -->
                <div class="mb-3">
                    <label for="nama_program" class="form-label">Nama Program Donasi</label>
                    <input type="text" class="form-control @error('nama_program') is-invalid @enderror"
                        name="nama_program" id="nama_program" value="{{ old('nama_program', $donasi->nama_program) }}"
                        required>
                    @error('nama_program')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Tanggal -->
                <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal"
                        id="tanggal" value="{{ old('tanggal', $donasi->tanggal) }}" required>
                    @error('tanggal')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Opsi Unlimited Target -->
                <div class="form-check mb-3">
                    <input type="checkbox" class="form-check-input" name="unlimited_target" id="unlimited_target"
                        value="1" {{ old('unlimited_target', $donasi->unlimited_target) ? 'checked' : '' }}>
                    <label class="form-check-label" for="unlimited_target">
                        Target Tak Terbatas
                    </label>
                </div>

                <!-- Target -->
                <div class="mb-3">
                    <label for="target" class="form-label">Target Rupiah</label>
                    <input type="text" class="form-control @error('target') is-invalid @enderror" name="target"
                        id="target" value="{{ old('target', number_format($donasi->target, 0, ',', '.')) }}"
                        {{ old('unlimited_target', $donasi->unlimited_target) ? 'disabled' : '' }} inputmode="numeric"
                        pattern="^[0-9\.]+$" autocomplete="off" placeholder="Masukkan nominal contoh: 1.000.000" required>

                    <!-- Pesan invalid custom -->
                    <div class="invalid-feedback" id="targetError">
                        Hanya boleh memasukkan angka, tanpa huruf atau simbol khusus.
                    </div>

                    @error('target')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Deskripsi -->
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" id="deskripsi" rows="4"
                        required>{{ old('deskripsi', $donasi->deskripsi) }}</textarea>
                    @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Tag -->
                <div class="mb-3">
                    <label for="tag" class="form-label">Tag (opsional)</label>
                    <input type="text" class="form-control @error('tag') is-invalid @enderror" name="tag"
                        id="tag" value="{{ old('tag', $donasi->tag) }}">
                    @error('tag')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Tombol Submit -->
                <button type="submit" class="btn btn-primary"><i class="bi bi-floppy-fill me-2"></i>Update Donasi</button>
            </form>
        </div>
    </div>

    <!-- Script: Enable/Disable Target -->
    <script>
        const unlimitedCheckbox = document.getElementById('unlimited_target');
        const targetInput = document.getElementById('target');

        function toggleTarget() {
            if (unlimitedCheckbox.checked) {
                targetInput.disabled = true;
                targetInput.value = ''; // Kosongkan
            } else {
                targetInput.disabled = false;
            }
        }

        unlimitedCheckbox.addEventListener('change', toggleTarget);

        // Jalankan saat load
        toggleTarget();
    </script>

    <script>
        const targetInput = document.getElementById('target');
        const targetError = document.getElementById('targetError');

        // Fungsi format angka ke format rupiah (tanpa simbol Rp)
        function formatRupiah(angka) {
            let numberString = angka.replace(/\D/g, '');
            let split = numberString.split(',');
            let sisa = split[0].length % 3;
            let rupiah = split[0].substr(0, sisa);
            let ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                let separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            return split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;
        }

        // Event: ketika mengetik
        targetInput.addEventListener('input', function(e) {
            let rawValue = this.value;

            // Jika ada huruf atau karakter selain angka/titik
            if (/[^0-9]/g.test(rawValue.replace(/\./g, ''))) {
                this.classList.add('is-invalid');
                targetError.style.display = 'block';
            } else {
                this.classList.remove('is-invalid');
                targetError.style.display = 'none';
            }

            // Format jadi ribuan
            let cleanValue = rawValue.replace(/\./g, '');
            this.value = formatRupiah(cleanValue);
        });

        // Saat form dikirim, ubah ke angka murni
        document.querySelector('form').addEventListener('submit', function() {
            targetInput.value = targetInput.value.replace(/\./g, '');
        });
    </script>
@endsection
