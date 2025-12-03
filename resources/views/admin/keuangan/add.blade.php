@extends ('admin.layout.app')
@section('content')

<div class="container py-4">
    <h3 class="mb-4">{{ $pageTitle }}</h3>

    <form action="{{ route('admin.keuangan.store') }}" method="POST" class="needs-validation" novalidate>
        @csrf

        <!-- Tanggal -->
        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" name="tanggal" id="tanggal" class="form-control @error('tanggal') is-invalid @enderror" 
                   value="{{ old('tanggal') }}" required>
            <div class="invalid-feedback">
                Tanggal harus diisi!
            </div>
            @error('tanggal')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Nominal -->
        <div class="mb-3">
            <label for="nominal" class="form-label">Nominal</label>
            <input type="text" name="nominal" id="nominal" class="form-control @error('nominal') is-invalid @enderror" 
                   value="{{ old('nominal') }}" required>
            <div class="invalid-feedback">
                Nominal harus diisi!
            </div>
            @error('nominal')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Keterangan -->
        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <input type="text" name="keterangan" id="keterangan" class="form-control @error('keterangan') is-invalid @enderror" 
                   value="{{ old('keterangan') }}" required>
            <div class="invalid-feedback">
                Keterangan harus diisi!
            </div>
            @error('keterangan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.keuangan.list') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>

{{-- Script format nominal otomatis --}}
<script>
    const nominalInput = document.getElementById('nominal');

    nominalInput.addEventListener('input', function(e) {
        // Ambil hanya angka
        let value = this.value.replace(/\D/g, '');

        // Format dengan titik pemisah ribuan
        value = new Intl.NumberFormat('id-ID').format(value);

        this.value = value;
    });

    // Saat submit, hilangkan titik biar bisa disimpan sebagai angka
    document.querySelector('form').addEventListener('submit', function() {
        nominalInput.value = nominalInput.value.replace(/\./g, '');
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
