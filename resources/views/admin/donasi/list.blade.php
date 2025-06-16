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
  <div class="row row-cols-1 row-cols-md-3 g-4">

    <!-- Card Item -->
    <div class="col">
      <div class="card h-100">
        <img src="https://via.placeholder.com/400x200" class="card-img-top" alt="Zakat">
        <div class="card-body">
          <h5 class="card-title">Lorem Ipsum der sit amet</h5>
          <p class="card-text text-muted mb-1">
            <small><i class="bi bi-clock"></i> Desember 16, 2023</small>
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
        <img src="https://via.placeholder.com/400x200" class="card-img-top" alt="Zakat">
        <div class="card-body">
          <h5 class="card-title">Lorem Ipsum der sit amet</h5>
          <p class="card-text text-muted mb-1">
            <small><i class="bi bi-clock"></i> Desember 16, 2023</small>
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

  </div>
</div>

@endsection