@extends('admin.layout.appAuth')
@section('content')

<style>
    body {
      background-color: #f5f5f5;
    }

    .login-container {
      margin-top: 80px;
    }

    .login-card {
      border-radius: 10px;
      padding: 30px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      background-color: #fff;
    }

    .login-logo {
      width: 200px;
      height: 200px;
      object-fit: contain;
      margin-bottom: 20px;
    }

    .login-btn {
      background-color: #9b0f0f;
      color: white;
    }

    .login-btn:hover {
      background-color: #7f0c0c;
    }
  </style>
</head>
<body>

<div class="container d-flex justify-content-center align-items-center login-container mb-4">
    <div class="text-center">
      <img src="{{ Vite::asset('resources/img/masjidTakhobbar.png') }}" alt="Logo Masjid" class="login-logo rounded-circle p-3">
      <div class="login-card mt-2">
        @if ($errors->any())
          <div class="alert alert-danger">{{ $errors->first() }}</div>
        @endif
        <form action="{{ route('admin.login.submit') }}" method="POST">
          @csrf
          <div class="mb-3">
            <input type="text" name="username" class="form-control" placeholder="Username" required>
          </div>
          <div class="mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password" required>
          </div>
          <button type="submit" class="btn login-btn w-100">Login</button>
        </form>
      </div>
    </div>
  </div>

</body>

@endsection