@extends('admin.layout.app')
@section('content')

<div class="container py-4">

  <!-- Top Bar -->
  <div class="d-flex justify-content-between mb-4">
    <input type="text" class="form-control w-50 me-3" placeholder="Cari Daftar Donasi">
    <div>
      <a href="#" class="btn btn-primary me-2">Buat Donasi</a>
      <button class="btn btn-danger">Filters</button>
    </div>
  </div>

  <!-- Cards -->
  <div class="overflow-auto" style="max-height: 500px;">
  <div class="row row-cols-1 row-cols-md-3 g-4">

    <!-- Card Item -->
    <div class="col">
      <div class="card h-100">
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/e5/2020_Toyota_GR_Supra_%28United_States%29.png/960px-2020_Toyota_GR_Supra_%28United_States%29.png" class="card-img-top" alt="Zakat">
        <div class="card-body">
          <h5 class="card-title"><a href="{{route('admin.donasi.view')}}" class="text-decoration-none text-dark">Lorem Ipsum der sit amet</a></h5>
          <p class="card-text text-muted mb-1">
            <small class="fw-bold text-primary"><i class="bi bi-clock"></i> Desember 16, 2023</small>
          </p>
          <p class="card-text">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vel justo nec arcu eleifend aliquet...
          </p>
        </div>
        <div class="card-footer bg-transparent border-0 d-flex justify-content-between">
          <button class="btn btn-success w-50 me-2">Edit</button>
          <button class="btn btn-danger w-50">Delete</button>
        </div>
      </div>
    </div>

    <!-- Copy Card Item for more cards -->
    <div class="col">
      <div class="card h-100">
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/e5/2020_Toyota_GR_Supra_%28United_States%29.png/960px-2020_Toyota_GR_Supra_%28United_States%29.png" class="card-img-top" alt="Zakat">
        <div class="card-body">
          <h5 class="card-title"><a href="{{route('admin.donasi.view')}}" class="text-decoration-none text-dark">Lorem Ipsum der sit amet</a></h5>
          <p class="card-text text-muted mb-1">
            <small class="fw-bold text-primary"><i class="bi bi-clock"></i> Desember 16, 2023</small>
          </p>
          <p class="card-text">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vel justo nec arcu eleifend aliquet...
          </p>
        </div>
        <div class="card-footer bg-transparent border-0 d-flex justify-content-between">
          <button class="btn btn-success w-50 me-2">Edit</button>
          <button class="btn btn-danger w-50">Delete</button>
        </div>
      </div>
    </div>

    <!-- Tambahkan lebih banyak col-card di sini sesuai kebutuhan -->
    <div class="col">
      <div class="card h-100">
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/e5/2020_Toyota_GR_Supra_%28United_States%29.png/960px-2020_Toyota_GR_Supra_%28United_States%29.png" class="card-img-top" alt="Zakat">
        <div class="card-body">
          <h5 class="card-title"><a href="{{route('admin.donasi.view')}}" class="text-decoration-none text-dark">Lorem Ipsum der sit amet</a></h5>
          <p class="card-text text-muted mb-1">
            <small class="fw-bold text-primary"><i class="bi bi-clock"></i> Desember 16, 2023</small>
          </p>
          <p class="card-text">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vel justo nec arcu eleifend aliquet...
          </p>
        </div>
        <div class="card-footer bg-transparent border-0 d-flex justify-content-between">
          <button class="btn btn-success w-50 me-2">Edit</button>
          <button class="btn btn-danger w-50">Delete</button>
        </div>
      </div>
    </div>

    <div class="col">
      <div class="card h-100">
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/e5/2020_Toyota_GR_Supra_%28United_States%29.png/960px-2020_Toyota_GR_Supra_%28United_States%29.png" class="card-img-top" alt="Zakat">
        <div class="card-body">
          <h5 class="card-title"><a href="{{route('admin.donasi.view')}}" class="text-decoration-none text-dark">Lorem Ipsum der sit amet</a></h5>
          <p class="card-text text-muted mb-1">
            <small class="fw-bold text-primary"><i class="bi bi-clock"></i> Desember 16, 2023</small>
          </p>
          <p class="card-text">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vel justo nec arcu eleifend aliquet...
          </p>
        </div>
        <div class="card-footer bg-transparent border-0 d-flex justify-content-between">
          <button class="btn btn-success w-50 me-2">Edit</button>
          <button class="btn btn-danger w-50">Delete</button>
        </div>
      </div>
    </div>

    <div class="col">
      <div class="card h-100">
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/e5/2020_Toyota_GR_Supra_%28United_States%29.png/960px-2020_Toyota_GR_Supra_%28United_States%29.png" class="card-img-top" alt="Zakat">
        <div class="card-body">
          <h5 class="card-title"><a href="{{route('admin.donasi.view')}}" class="text-decoration-none text-dark">Lorem Ipsum der sit amet</a></h5>
          <p class="card-text text-muted mb-1">
            <small class="fw-bold text-primary"><i class="bi bi-clock"></i> Desember 16, 2023</small>
          </p>
          <p class="card-text">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vel justo nec arcu eleifend aliquet...
          </p>
        </div>
        <div class="card-footer bg-transparent border-0 d-flex justify-content-between">
          <button class="btn btn-success w-50 me-2">Edit</button>
          <button class="btn btn-danger w-50">Delete</button>
        </div>
      </div>
    </div>

    <div class="col">
      <div class="card h-100">
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/e5/2020_Toyota_GR_Supra_%28United_States%29.png/960px-2020_Toyota_GR_Supra_%28United_States%29.png" class="card-img-top" alt="Zakat">
        <div class="card-body">
          <h5 class="card-title"><a href="{{route('admin.donasi.view')}}" class="text-decoration-none text-dark">Lorem Ipsum der sit amet</a></h5>
          <p class="card-text text-muted mb-1">
            <small class="fw-bold text-primary"><i class="bi bi-clock"></i> Desember 16, 2023</small>
          </p>
          <p class="card-text">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vel justo nec arcu eleifend aliquet...
          </p>
        </div>
        <div class="card-footer bg-transparent border-0 d-flex justify-content-between">
          <button class="btn btn-success w-50 me-2">Edit</button>
          <button class="btn btn-danger w-50">Delete</button>
        </div>
      </div>
    </div>

  </div>
</div>
</div>

@endsection