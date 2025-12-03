@extends ('admin.layout.app')
@section('content')

<div class="container py-4">
    <h3 class="mb-4">{{ $pageTitle }}</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Periksa inputan Anda:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.keuangan.update', $infaq->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" name="tanggal" id="tanggal" class="form-control"
                value="{{ old('tanggal', $infaq->tanggal) }}" required>
        </div>

        <div class="mb-3">
            <label for="nominal" class="form-label">Nominal</label>
            <input type="text" name="nominal" id="nominal" class="form-control"
                value="{{ old('nominal', number_format($infaq->nominal, 0, ',', '.')) }}" required>
        </div>

        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <input type="text" name="keterangan" id="keterangan" class="form-control"
                value="{{ old('keterangan', $infaq->keterangan) }}" required>
        </div>

        <button type="submit" class="btn btn-success">Perbarui</button>
        <a href="{{ route('admin.keuangan.list') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>

{{-- Script format nominal ribuan --}}
<script>
    const nominalInput = document.getElementById('nominal');

    nominalInput.addEventListener('input', function(e) {
        let value = this.value.replace(/\D/g, ''); // Hapus semua bukan angka
        if(value) {
            value = new Intl.NumberFormat('id-ID').format(value);
        }
        this.value = value;
    });

    // Hapus titik sebelum submit
    document.querySelector('form').addEventListener('submit', function() {
        nominalInput.value = nominalInput.value.replace(/\./g, '');
    });
</script>

@endsection
