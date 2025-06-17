@extends('admin.layout.app')

@section('content')
<div class="overflow-auto" style="height: 600px;">
    <div class="container">
        <h1 class="mb-4">Tambah Donasi</h1>

        <form action="{{ route('admin.donasi.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Gambar -->
            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar (wajib)</label>
                <input type="file" class="form-control @error('gambar') is-invalid @enderror" name="gambar" id="gambar" required>
                @error('gambar')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Nama Program -->
            <div class="mb-3">
                <label for="nama_program" class="form-label">Nama Program Donasi</label>
                <input type="text" class="form-control @error('nama_program') is-invalid @enderror"
                    name="nama_program" id="nama_program" value="{{ old('nama_program') }}" required>
                @error('nama_program')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Tanggal -->
            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" class="form-control @error('tanggal') is-invalid @enderror"
                    name="tanggal" id="tanggal" value="{{ old('tanggal') }}" required>
                @error('tanggal')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Opsi Unlimited Target -->
            <div class="form-check mb-3">
                <input type="checkbox" class="form-check-input" name="unlimited_target" id="unlimited_target"
                    value="1" {{ old('unlimited_target') ? 'checked' : '' }}>
                <label class="form-check-label" for="unlimited_target">
                    Target Tak Terbatas
                </label>
            </div>

            <!-- Target -->
            <div class="mb-3">
                <label for="target" class="form-label">Target (Rupiah)</label>
                <input type="number" class="form-control @error('target') is-invalid @enderror"
                    name="target" id="target" value="{{ old('target') }}"
                    {{ old('unlimited_target') ? 'disabled' : '' }}>
                @error('target')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Deskripsi -->
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control @error('deskripsi') is-invalid @enderror"
                    name="deskripsi" id="deskripsi" rows="4" required>{{ old('deskripsi') }}</textarea>
                @error('deskripsi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Tag -->
            <div class="mb-3">
                <label for="tag" class="form-label">Tag (opsional)</label>
                <input type="text" class="form-control @error('tag') is-invalid @enderror"
                    name="tag" id="tag" value="{{ old('tag') }}">
                @error('tag')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Tombol Submit -->
            <button type="submit" class="btn btn-primary">Simpan Donasi</button>
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
            targetInput.value = ''; // Bersihkan
        } else {
            targetInput.disabled = false;
        }
    }

    unlimitedCheckbox.addEventListener('change', toggleTarget);

    // Panggil saat load untuk sinkron old value
    toggleTarget();
</script>
@endsection
