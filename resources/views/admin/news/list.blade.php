@extends('admin.layout.app')
@section('content')

    <!-- Modal Konfirmasi Hapus -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus berita ini?
                </div>
                <div class="modal-footer">
                    <form id="deleteForm" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

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
                                <img src="{{ asset('storage/' . $news->gambar) }}" class=" p-1" width="35"
                                    height="35" alt="Gambar">
                            </td>
                            <td>
                                <div class="d-flex justify-content-center gap-2 flex-wrap">
                                    <a href="{{ route('admin.news.edit', $news->id) }}" class="btn btn-success btn-sm">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <button type="button" class="btn btn-danger btn-sm" 
                                            data-bs-toggle="modal"
                                            data-bs-target="#deleteModal" 
                                            data-id="{{ $news->id }}">
                                        <i class="bi bi-trash"></i>
                                    </button>
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

    @push('scripts')
        <script>
            const deleteModal = document.getElementById('deleteModal');
            deleteModal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget;
                const newsId = button.getAttribute('data-id');
                const form = document.getElementById('deleteForm');
                form.action = `/admin/berita/${newsId}`;
            });
        </script>
    @endpush

@endsection
