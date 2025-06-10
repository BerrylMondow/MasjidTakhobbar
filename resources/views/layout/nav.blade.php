<style>


  .navbar .nav-link,
.navbar .navbar-brand {
  color: white !important;
}

</style>
  

<nav class="navbar navbar-transparent fixed-top navbar-expand-lg" style="background-color: #C3040E;">
  <div class="container">
    <a class="navbar-brand d-flex align-items-center" href="#">
      <img src="{{ Vite::asset('resources/img/masjidTakhobbar.png') }}" alt="Logo Masjid" width="40" height="40" class="me-2">
      <b>Masjid Takhobbar</b>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Beranda</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Tentang Kami</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('donasi') }}">Donasi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('berita') }}">Berita</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
