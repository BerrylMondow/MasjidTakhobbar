  <style>
    body {
      margin: 0;
      padding: 0;
      height: 100vh;
      overflow: hidden;
    }
    .sidebar {
      background-color: #be0b15;
      color: white;
      height: 100vh;
      padding-top: 20px;
    }
    .sidebar h4 {
      font-weight: bold;
      padding-left: 20px;
      margin-bottom: 30px;
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
    .header {
      background-color: white;
      border-bottom: 1px solid #5b5b5b;
      padding: 10px 20px;
      display: flex;
      justify-content: space-between;
      align-items: center;
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
    }
  </style>

<!-- Sidebar dan Navbar -->
<div class="row">
  <!-- Sidebar -->
  <div class="col-md-2 sidebar d-flex flex-column">
    <h4>admin.</h4>
    <a href="#"><i class="bi bi-brightness-high"></i> Dashboard</a>
    <a href="{{route('admin.news.list')}}"><i class="bi bi-brightness-high"></i> Berita</a>
    <a href="{{ route('admin.donasi.list') }}"><i class="bi bi-brightness-high"></i> Donasi</a>
    <a href="#"><i class="bi bi-brightness-high"></i> Keuangan</a>
  </div>

  <!-- Main Content Wrapper -->
  <div class="col-md-10 bg-light p-0">
    <!-- Navbar -->
    <div class="header">
      <div class="brand">
        <img src="{{ Vite::asset('resources/img/masjidTakhobbar.png') }}" alt="Logo" width="35" height="35">
        <h5 class="m-0 fw-bold">Masjid Takhobbar</h5>
      </div>
      <form action="{{ route('admin.logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn logout-btn">Logout</button>
      </form>
    </div>

    <!-- Main content starts here -->
    <div class="main-content p-4">
      @yield('content')
    </div>
  </div>
</div>
