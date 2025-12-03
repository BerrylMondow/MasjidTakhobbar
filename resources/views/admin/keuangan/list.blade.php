@extends ('admin.layout.app')
@section('content')
    <div class="container py-5">
        <h3 class="mb-4">Tabel Keuangan Infaq</h3>

        <!-- Tombol Tambah -->
        <a href="{{ route('admin.keuangan.add') }}" class="btn btn-primary mb-3"><i class="bi bi-plus-circle-fill"></i> Tambah Infaq</a>

        <!-- Tabel Keuangan -->
        <div class="table-responsive">
            <table class="table table-bordered table-hover text-center">
                <thead class="table-success">
                    <tr>
                        <th>Tanggal</th>
                        <th>Nominal</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($infaqs as $infaq)
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($infaq->tanggal)->format('d-m-Y') }}</td>
                            <td>Rp. {{ number_format($infaq->nominal, 0, ',', '.') }}</td>
                            <td>{{ $infaq->keterangan }}</td>
                            <td>
                                <div class="d-flex justify-content-center align-items-center gap-2">
                                    <a href="{{ route('admin.keuangan.edit', $infaq->id) }}"
                                        class="btn btn-sm btn-warning">Edit</a>

                                    <form action="{{ route('admin.keuangan.destroy', $infaq->id) }}" method="POST"
                                        class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </div>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">Belum ada data infaq.</td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>
    </div>
@endsection
