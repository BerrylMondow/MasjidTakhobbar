<style>
  body {
    margin: 0;
    padding: 0;
    height: 100vh;
    overflow: hidden;
  }

  .wrapper {
    display: flex;
    height: 100vh;
  }

  .sidebar {
    background-color: #be0b15;
    color: white;
    width: 250px;
    transition: transform 0.3s ease;
    overflow-y: auto;
    z-index: 1000;
    transform: translateX(0); /* default: always visible */
  }

  .sidebar h4 {
    font-weight: bold;
    padding: 20px;
    margin: 0;
  }

  .sidebar a {
    color: white;
    text-decoration: none;
    display: block;
    padding: 10px 20px;
  }

  .sidebar a:hover {
    background-color: #a10912;
  }

  .content {
    flex-grow: 1;
    background: #f8f9fa;
    display: flex;
    flex-direction: column;
    height: 100%;
    overflow: hidden;
  }

  .header {
    background-color: white;
    border-bottom: 1px solid #5b5b5b;
    padding: 10px 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    z-index: 1100;
  }

  .header .brand {
    display: flex;
    align-items: center;
    gap: 10px;
  }

  .logout-btn {
    background-color: #7a0a0a;
    color: white;
  }

  .logout-btn:hover {
    background-color: #5c0505;
  }

  .main-content {
    padding: 30px;
    overflow-y: auto;
    flex-grow: 1;
  }

  #toggleSidebar {
    border: none;
    background: none;
    font-size: 1.5rem;
    margin-right: 15px;
    display: none; /* hanya muncul di mobile */
  }

  /* Overlay */
  #overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.5);
    z-index: 900;
    opacity: 0;
    pointer-events: none;
    transition: opacity 0.3s ease;
  }

  #overlay.active {
    opacity: 1;
    pointer-events: all;
  }

  /* Responsive: di mobile, sidebar hidden by default */
  @media (max-width: 768px) {
    #toggleSidebar {
      display: block; /* tombol ☰ muncul di mobile */
    }

    .sidebar {
      position: fixed;
      left: 0;
      top: 0;
      height: 100%;
      transform: translateX(-100%); /* hidden by default di mobile */
    }

    .sidebar.active {
      transform: translateX(0); /* tampil ketika active */
    }
  }
</style>

<div class="wrapper">
  <!-- Sidebar -->
  <div id="sidebar" class="sidebar">
    <h4>admin.</h4>
    <a href="{{ route('admin.dashboard')}}"><i class="bi bi-clipboard-data-fill"></i> Dashboard</a>
    <a href="{{ route('admin.news.list') }}"><i class="bi bi-newspaper"></i> Berita</a>
    <a href="{{ route('admin.donasi.list') }}"><i class="bi bi-cash-coin"></i> Donasi</a>
    <a href="{{ route('admin.keuangan.list') }}"><i class="bi bi-wallet"></i> Keuangan</a>
  </div>

  <!-- Content -->
  <div class="content">
    <div class="header">
      <div class="brand">
        <button id="toggleSidebar">☰</button>
        <img src="{{ asset('images/masjidTakhobbar.png') }}" alt="Logo" width="35" height="35">
        <h5 class="m-0 fw-bold">Masjid Takhobbar</h5>
      </div>
      <form action="{{ route('admin.logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn logout-btn">Logout</button>
      </form>
    </div>

    <div class="main-content">
      @yield('content')
    </div>
  </div>
</div>

<!-- Overlay -->
<div id="overlay"></div>

<script>
  const toggleBtn = document.getElementById('toggleSidebar');
  const sidebar = document.getElementById('sidebar');
  const overlay = document.getElementById('overlay');

  toggleBtn.addEventListener('click', () => {
    sidebar.classList.toggle('active');
    overlay.classList.toggle('active');
  });

  overlay.addEventListener('click', () => {
    sidebar.classList.remove('active');
    overlay.classList.remove('active');
  });
</script>
