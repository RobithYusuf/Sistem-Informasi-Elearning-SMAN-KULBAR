<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>E-Learning | SMAN 1 Kulisusu Barat</title>

  <!-- Ikon Favicon -->
  <link rel="icon" href="{{ asset('favicon-16x16') }}">

<!-- ... (kode lainnya) ... -->
</head>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('template/plugins/fontawesome-free/css/all.min.css') }} ">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('template/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }} ">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('template/dist/css/adminlte.min.css') }} ">
</head>
<body class="hold-transition light-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="{{ asset('template/dist/img/sma.png') }} " alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/berandaguru" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/profilguru" class="nav-link">Profil</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/logout" class="nav-link">Logout</a>
      </li>
     
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <span class="brand-text font-weight-light">SMAN 1 KULISUSU BARAT</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('template/dist/img/user0-128x128.jpg')}} " class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
        <a class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item menu-open">
            <a href="/berandaguru" class="nav-link active">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-header">_______________________________</li>
          <li class="nav-item">
            <a href="/kontenguru" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Bahan Ajar
                <span class="right badge badge-danger"></span>
              </p>
            </a>
          </li>
          </li>
          <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-clone"></i>
                <p>
                  Add Konten
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="/tambahdatamateri" class="nav-link">
                  <!-- <i class="fa fa-user-plus" aria-hidden="true"></i> -->
                    <i class="far fa-circle nav-icon"></i>
                    <p>Materi</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/tambahdatatugas" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Tugas</p>
                  </a>
                </li>
              </ul>
            </li>

            
      
          
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  @yield('content')
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-light">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong><a href="https://adminlte.io"></a>E-LEARNING | SMA NEGERI 1 KULISUSU BARAT</strong>
    
    <div class="float-right d-none d-sm-inline-block">
      <!-- <b>Versio</b>  -->
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{ asset('template/plugins/jquery/jquery.min.js')}} "></script>
<!-- Bootstrap -->
<script src="{{ asset('template/plugins/bootstrap/js/bootstrap.bundle.min.js')}} "></script>
<!-- overlayScrollbars -->
<script src="{{ asset('template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}} "></script>
<!-- AdminLTE App -->
<script src="{{ asset('template/dist/js/adminlte.js')}}"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{ asset('template/plugins/jquery-mousewheel/jquery.mousewheel.js')}} "></script>
<script src="{{ asset('template/plugins/raphael/raphael.min.js')}} "></script>
<script src="{{ asset('template/plugins/jquery-mapael/jquery.mapael.min.js')}} "></script>
<script src="{{ asset('template/plugins/jquery-mapael/maps/usa_states.min.js')}} "></script>
<!-- ChartJS -->
<script src="{{ asset('template/plugins/chart.js/Chart.min.js')}} "></script>

<!-- AdminLTE for demo purposes -->
<script src="{{ asset('template/dist/js/demo.js')}} "></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('template/dist/js/pages/dashboard2.js')}} "></script>
</body>
</html>
