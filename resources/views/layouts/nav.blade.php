<style>
  .navbar{
    transition: background-color 0.5s ease-in-out, box-shadow 0.5s ease-in-out;

  }

  .navbar-transparent {
    background-color: transparent;
  }

  .navbar .nav-link,
.navbar .navbar-brand {
  color: white !important;
}

  .navbar-red {
  background-color: #C3040E !important;
}





</style>

<script>
  window.addEventListener('scroll', function () {
    const navbar = document.querySelector('.navbar');
    if (window.scrollY > 50) {
      navbar.classList.add('navbar-red');
      navbar.classList.remove('navbar-transparent');
    } else {
      navbar.classList.remove('navbar-red');
      navbar.classList.add('navbar-transparent');
    }
  });
  </script>
  

<nav class="navbar navbar-transparent fixed-top navbar-expand-lg">
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