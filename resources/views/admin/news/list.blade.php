@extends('admin.layout.app')

@section('content')



    <!-- Konten Daftar Berita -->
    <div class="container mt-4">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i>
                <div>{{ session('success') }}</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <a href="{{ route('admin.news.add') }}" class="btn btn-primary mb-3">Buat Berita</a>

        <div class="table-responsive">
            <table class="table text-center align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Judul Berita</th>
                        <th>Deskripsi</th>
                        <th>Tanggal</th>
                        <th>Gambar</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($newss as $index => $news)
                        <tr class="{{ $index % 2 == 0 ? 'bg-light' : '' }}">
                            <td><strong>{{ $index + 1 }}</strong></td>
                            <td>{{ Str::limit($news->judul, 40) }}</td>
                            <td>{{ Str::limit($news->deskripsi, 50) }}</td>
                            <td>{{ \Carbon\Carbon::parse($news->tanggal)->format('d M Y') }}</td>
                            <td>
                                <img src="{{ asset('storage/berita/' . $news->gambar) }}" class="p-1 rounded" width="50"
                                    height="50" alt="Gambar">
                            </td>
                            <td>
                                <div class="d-flex justify-content-center gap-2 flex-wrap">
                                    <a href="{{ route('admin.news.edit', $news->id) }}" class="btn btn-success btn-sm">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('admin.news.destroy', $news->id) }}" method="POST"
                                        onsubmit="return confirm('Yakin mau hapus?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">Tidak ada berita ditemukan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>


@endsection
