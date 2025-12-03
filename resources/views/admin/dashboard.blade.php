@extends('admin.layout.app')
@section('content')
    <style>
        .project-card {
            border: none;
            border-radius: 15px;
            background: linear-gradient(to right, #f8fff9, #ffd2d2);
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
            padding: 20px;
            transition: transform 0.2s;
        }

        .project-card:hover {
            transform: translateY(-3px);
        }

        .project-icon {
            color: #a41f1f;
            font-size: 24px;
        }

        .project-total {
            font-size: 42px;
            font-weight: 700;
            color: #0a0a0a;
            margin: 10px 0 0 0;
        }

        .project-completed {
            color: #a41f1f;
            font-weight: 500;
        }
    </style>

    <div class="row justify-content-center g-4">
        <div class="col-md-4">
            <div class="card project-card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <h6 class="text-muted text-uppercase mb-0">Donasi Terkumpul Bulan ini</h6>
                        <i class="bi bi-cash-coin project-icon"></i>
                    </div>
                    <div class="project-total">Rp. {{ number_format($totalDonasi, 0, ',', '.') }}</div>
                    <div class="project-completed">{{ $jumlahDonasi }} Donasi Masuk</div>
                </div>
            </div>
        </div>


        <div class="col-md-4">
            <div class="card project-card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <h6 class="text-muted text-uppercase mb-0">Total Berita di Publish</h6>
                        <i class="bi bi-newspaper project-icon"></i>
                    </div>
                    <div class="project-total">{{ $totalBerita }}</div>
                    <div class="project-completed">Telah Dipublikasikan</div>
                </div>
            </div>
        </div>


        <div class="col-md-4">
            <div class="card project-card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <h6 class="text-muted text-uppercase mb-0">Catatan Keuangan</h6>
                        <i class="bi bi-journal-text project-icon"></i>
                    </div>
                    <div class="project-total">Rp. {{ number_format($totalInfaq ?? 0, 0, ',', '.') }}</div>
                    <div class="project-completed">Total Infaq & Sedekah</div>
                </div>
            </div>
        </div>

    </div>
@endsection
