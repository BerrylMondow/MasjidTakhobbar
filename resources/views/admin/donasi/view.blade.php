@extends('admin.layout.app')

@section('content')
<div class="container">
    <a href="{{route('admin.donasi.list')}}" class="btn btn-primary"><i class="bi bi-arrow-left-circle-fill"></i> Kembali</a>
</div>

<!-- Kontainer Scrollable -->
<div class="container my-4 p-4 bg-white shadow rounded overflow-auto" style="max-height: 80vh;">

  <!-- Gambar Utama -->
  <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/e5/2020_Toyota_GR_Supra_%28United_States%29.png/960px-2020_Toyota_GR_Supra_%28United_States%29.png" class="img-fluid rounded mb-4" alt="Zakat">

  <!-- Judul dan Deskripsi -->
  <h3 class="fw-bold mb-3">ZAKAT FITRAH</h3>
  <p class="text-justify">
    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
  </p>

  <!-- Nama Lembaga -->
  <div class="d-flex align-items-center mb-3">
    <img src="{{ Vite::asset('resources/img/masjidTakhobbar.png') }}" alt="Nama Lembaga" class="rounded-circle me-2" width="40" height="40">
    <h6 class="mb-0 fw-semibold">Masjid Takhobbar</h6>
  </div>

  <!-- Progress Bar & Total Donasi -->
  <div class="mb-2">
    <div class="progress" style="height: 10px;">
      <div class="progress-bar bg-success" role="progressbar" style="width: 100%"></div>
    </div>
  </div>
  <p class="fw-bold text-success mb-4">
    Rp. 150.000 <span class="text-muted fw-normal">terkumpul dari <strong>∞ Tak Terbatas</strong></span>
  </p>

  <!-- Daftar Donatur -->
  <h5 class="fw-bold mb-3">Daftar Donatur</h5>
  <div class="table-responsive">
    <table class="table table-bordered table-hover align-middle text-center">
      <thead class="table-success">
        <tr>
          <th>Tanggal</th>
          <th>Nama</th>
          <th>Nominal</th>
          <th>Email</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>01-01-2000</td>
          <td>John</td>
          <td>Rp. 50.000</td>
          <td>Abc@gmail</td>
        </tr>
        <tr>
          <td>20-12-1999</td>
          <td>Doe</td>
          <td>Rp. 100.000</td>
          <td>Abc@gmail</td>
        </tr>
      </tbody>
    </table>
  </div>

</div>
@endsection
