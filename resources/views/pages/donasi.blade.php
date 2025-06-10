@extends('layout.app')
@section('content')
    <style>
        .card-img-top {
            border-top-left-radius: 1rem;
            border-top-right-radius: 1rem;
            height: 220px;
            object-fit: cover;
        }

        .badge-custom {
            font-size: 0.75rem;
            padding: 0.4em 0.6em;
        }

        .progress {
            height: 10px;
            border-radius: 5px;
        }

        .verified-icon {
            color: #0d6efd;
            font-size: 1rem;
            margin-left: 4px;
        }

        .donation-btn {
            border-radius: 0.75rem;
            font-size: 1.1rem;
        }

        .card {
            border-radius: 1rem;
        }
    </style>

    <div class="container" style="margin-top: 90px; margin-bottom: 40px;">
        <div class="row row-cols-3">
            <div class="col">
                <div class="card shadow mx-auto" style="max-width: 400px;">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/4e/Chess_pieces_close_up.jpg/1200px-Chess_pieces_close_up.jpg"
                        class="card-img-top" alt="Zakat Fitrah">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0 fw-bold">Zakat Fitrah</h5>
                            <div>
                                <span class="badge bg-success badge-custom">Zakat</span>
                                <span class="badge bg-danger badge-custom">Ramadhan</span>
                            </div>
                        </div>

                        <!-- Progress Bar -->
                        <div class="mt-3">
                            <div class="progress mb-2">
                                <div class="progress-bar bg-success" style="width: 100%;"></div>
                            </div>
                            <small>
                                <span class="text-success fw-bold">Rp.1.000.000</span> terkumpul dari ∞ Tak Terbatas
                            </small>
                        </div>

                        <!-- Lembaga Info -->
                        <div class="d-flex align-items-center mt-3">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6f/ChessSet.jpg/640px-ChessSet.jpg"
                                class="rounded-circle me-2" alt="Lembaga" width="40" height="40">
                            <div class="d-flex align-items-center">
                                <span class="fw-medium">Nama Lembaga</span>
                                <i class="bi bi-patch-check-fill verified-icon"></i>
                            </div>
                        </div>

                        <!-- Button -->
                        <a href="#" class="btn btn-success w-100 mt-4 donation-btn">Mulai Bayar Zakat</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow mx-auto" style="max-width: 400px;">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/4e/Chess_pieces_close_up.jpg/1200px-Chess_pieces_close_up.jpg"
                        class="card-img-top" alt="Zakat Fitrah">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">Zakat Fitrah</h5>
                            <div>
                                <span class="badge bg-success badge-custom">Zakat</span>
                                <span class="badge bg-danger badge-custom">Ramadhan</span>
                            </div>
                        </div>

                        <!-- Progress Bar -->
                        <div class="mt-3">
                            <div class="progress mb-2">
                                <div class="progress-bar bg-success" style="width: 100%;"></div>
                            </div>
                            <small>
                                <span class="text-success fw-bold">Rp.1.000.000</span> terkumpul dari ∞ Tak Terbatas
                            </small>
                        </div>

                        <!-- Lembaga Info -->
                        <div class="d-flex align-items-center mt-3">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6f/ChessSet.jpg/640px-ChessSet.jpg"
                                class="rounded-circle me-2" alt="Lembaga" width="40" height="40">
                            <div class="d-flex align-items-center">
                                <span class="fw-medium">Nama Lembaga</span>
                                <i class="bi bi-patch-check-fill verified-icon"></i>
                            </div>
                        </div>

                        <!-- Button -->
                        <a href="#" class="btn btn-success w-100 mt-4 donation-btn">Mulai Bayar Zakat</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow mx-auto" style="max-width: 400px;">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/4e/Chess_pieces_close_up.jpg/1200px-Chess_pieces_close_up.jpg"
                        class="card-img-top" alt="Zakat Fitrah">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">Zakat Fitrah</h5>
                            <div>
                                <span class="badge bg-success badge-custom">Zakat</span>
                                <span class="badge bg-danger badge-custom">Ramadhan</span>
                            </div>
                        </div>

                        <!-- Progress Bar -->
                        <div class="mt-3">
                            <div class="progress mb-2">
                                <div class="progress-bar bg-success" style="width: 100%;"></div>
                            </div>
                            <small>
                                <span class="text-success fw-bold">Rp.1.000.000</span> terkumpul dari ∞ Tak Terbatas
                            </small>
                        </div>

                        <!-- Lembaga Info -->
                        <div class="d-flex align-items-center mt-3">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6f/ChessSet.jpg/640px-ChessSet.jpg"
                                class="rounded-circle me-2" alt="Lembaga" width="40" height="40">
                            <div class="d-flex align-items-center">
                                <span class="fw-medium">Nama Lembaga</span>
                                <i class="bi bi-patch-check-fill verified-icon"></i>
                            </div>
                        </div>

                        <!-- Button -->
                        <a href="#" class="btn btn-success w-100 mt-4 donation-btn">Mulai Bayar Zakat</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow mx-auto" style="max-width: 400px;">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/4e/Chess_pieces_close_up.jpg/1200px-Chess_pieces_close_up.jpg"
                        class="card-img-top" alt="Zakat Fitrah">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">Zakat Fitrah</h5>
                            <div>
                                <span class="badge bg-success badge-custom">Zakat</span>
                                <span class="badge bg-danger badge-custom">Ramadhan</span>
                            </div>
                        </div>

                        <!-- Progress Bar -->
                        <div class="mt-3">
                            <div class="progress mb-2">
                                <div class="progress-bar bg-success" style="width: 100%;"></div>
                            </div>
                            <small>
                                <span class="text-success fw-bold">Rp.1.000.000</span> terkumpul dari ∞ Tak Terbatas
                            </small>
                        </div>

                        <!-- Lembaga Info -->
                        <div class="d-flex align-items-center mt-3">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6f/ChessSet.jpg/640px-ChessSet.jpg"
                                class="rounded-circle me-2" alt="Lembaga" width="40" height="40">
                            <div class="d-flex align-items-center">
                                <span class="fw-medium">Nama Lembaga</span>
                                <i class="bi bi-patch-check-fill verified-icon"></i>
                            </div>
                        </div>

                        <!-- Button -->
                        <a href="#" class="btn btn-success w-100 mt-4 donation-btn">Mulai Bayar Zakat</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
