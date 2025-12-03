@extends('admin.layout.app')

@section('content')
<div class="container mb-4">
    <a href="{{ route('admin.donasi.list') }}" class="btn btn-primary">
        <i class="bi bi-arrow-left-circle-fill me-1"></i> Kembali
    </a>
</div>

<div class="overflow-auto" style="margin-bottom: 7vh;">
    <div class="container">
        <h1 class="mb-4">Tambah Donasi</h1>

        <form action="{{ route('admin.donasi.store') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
            @csrf

            <!-- Gambar -->
            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar (wajib)</label>
                <input type="file" class="form-control @error('gambar') is-invalid @enderror" name="gambar" id="gambar" required>
                <div class="invalid-feedback">
                    Gambar harus diisi!
                </div>
                @error('gambar')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Nama Program -->
            <div class="mb-3">
                <label for="nama_program" class="form-label">Nama Program Donasi</label>
                <input type="text" class="form-control @error('nama_program') is-invalid @enderror"
                       name="nama_program" id="nama_program" value="{{ old('nama_program') }}" required>
                <div class="invalid-feedback">
                    Nama program donasi harus diisi!
                </div>
                @error('nama_program')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Tanggal -->
            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal"
                       id="tanggal" value="{{ old('tanggal') }}" required>
                <div class="invalid-feedback">
                    Tanggal harus dipilih!
                </div>
                @error('tanggal')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Opsi Unlimited Target -->
            <div class="form-check mb-3">
                <input type="checkbox" class="form-check-input" name="unlimited_target" id="unlimited_target" value="1" {{ old('unlimited_target') ? 'checked' : '' }}>
                <label class="form-check-label" for="unlimited_target">Target Tak Terbatas</label>
            </div>

            <!-- Target -->
            <div class="mb-3">
                <label for="target" class="form-label">Target (Rupiah)</label>
                <input type="text" class="form-control @error('target') is-invalid @enderror" name="target"
                       id="target" value="{{ old('target') }}" {{ old('unlimited_target') ? 'disabled' : '' }} required>
                <div class="invalid-feedback">
                    Target harus diisi jika tidak tak terbatas!
                </div>
                @error('target')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Deskripsi -->
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" id="deskripsi" rows="4" required>{{ old('deskripsi') }}</textarea>
                <div class="invalid-feedback">
                    Deskripsi harus diisi!
                </div>
                @error('deskripsi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Tag -->
            <div class="mb-3">
                <label for="tag" class="form-label">Tag (opsional)</label>
                <input type="text" class="form-control @error('tag') is-invalid @enderror" name="tag" id="tag" value="{{ old('tag') }}">
                <div class="invalid-feedback">
                    Tag tidak valid!
                </div>
                @error('tag')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Tombol Submit -->
            <button type="submit" class="btn btn-primary"><i class="bi bi-floppy-fill me-2"></i>Simpan Donasi</button>
        </form>
    </div>
</div>

<script>
    // Toggle target jika checkbox unlimited dicentang
    const unlimitedCheckbox = document.getElementById('unlimited_target');
    const targetInput = document.getElementById('target');

    function toggleTarget() {
        if (unlimitedCheckbox.checked) {
            targetInput.disabled = true;
            targetInput.value = '';
        } else {
            targetInput.disabled = false;
        }
    }

    unlimitedCheckbox.addEventListener('change', toggleTarget);
    toggleTarget();

    // Format Rupiah Live
    targetInput.addEventListener('input', function(e) {
        let value = e.target.value.replace(/\./g, '').replace(/[^\d]/g, '');
        e.target.value = value ? parseInt(value).toLocaleString('id-ID') : '';
    });

    // Bootstrap validation
    (function () {
        'use strict';
        const forms = document.querySelectorAll('.needs-validation');
        Array.from(forms).forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    })();
</script>
@endsection
