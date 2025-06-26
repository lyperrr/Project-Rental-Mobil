<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>@yield('title', 'Admin Dashboard')</title>
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  
  {{-- Navbar --}}
  @include('components.admin-navbar')

  {{-- Sidebar --}}
  @include('components.admin-sidebar')

  {{-- Content --}}
  <div class="content-wrapper">
    <section class="content p-4">
      @yield('content')
    </section>
  </div>

  {{-- Footer --}}
  @include('components.admin-footer')

</div>

<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
</body>
</html>
