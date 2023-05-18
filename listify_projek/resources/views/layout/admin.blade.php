<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Listify</title>

  {{-- CSS --}}
  @include('layout.partials.css')

  @stack('css')
  {{-- END CSS --}}
</head>
<body class="hold-transition light-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="{{ asset('template/dist/img/SCLogo.png') }}" alt="SCLogo" height="80" width="80">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-danger navbar-badge"> {{ $notif->count() }} </span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          
          @foreach ($notif as $row)      
            @php
              $fdate = Carbon\Carbon::now()->format('Y-m-d');
              $tdate = $row->deadline;
              $datetime1 = new DateTime($fdate);
              $datetime2 = new DateTime($tdate);
              $interval = $datetime1->diff($datetime2);
              $days = $interval->format('%a');
            @endphp      
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    {{ $row->nama }}
                  </h3>
                  <p>
                    {{ Carbon\Carbon::now()->addDay()->format('d M Y') }}
                  </p>
                  <p class="text-sm">{{ $row->status }}</p>
                  <p class="text-sm text-muted"><i class="far fa-calendar mr-1"></i> - {{ $days; }} Hari </p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
          @endforeach
          
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <div class="brand-link">
      <img src="{{ asset('template/dist/img/SCLogo.png') }}" alt="SCLogo" height="50" width="50">
      <span class="brand-text font-weight-light">Listify</span>
</div>

    <!-- Sidebar -->
    @include('layout.partials.sidebar')
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  @yield('content')
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2023 <a href="https://adminlte.io">Listify.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.1.0
    </div>
  </footer>
</div>
<!-- ./wrapper -->

{{-- JS --}}
@include('layout.partials.js')

@stack('scripts')
{{-- END JS --}}
</body>
</html>