@extends ('layout.tampilansiswa')

@section('content')

<style>
  .small-box .inner {
    text-align: center;
  }
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="d-block">BERANDA</h1>
          <!-- <h1 class="d-block">Welcome {{ Auth::user()->name }}</h1> -->
          <div class="card-tools" style="font-size: small;">
            @if ($message = Session::get('success'))
            <div class="alert alert-secondary" role="alert">
              {{ $message }}
            </div>
            @endif
          </div>

          <div class="card-tools" style="font-size: small;">
            @if ($message = Session::get('edit'))
            <div class="alert alert-secondary" role="alert">
              {{ $message }}
            </div>
            @endif
          </div>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-primary">
            <div class="inner">
              <h3>Agama</h3>
              <p>
                <a href="/materi/1020" class="btn btn-outline-light"><strong>Materi</strong></a>
                <a href="/tugas/1020" class="btn btn-outline-light"><strong>Tugas</strong></a>
              </p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>PKN</h3>
              <p>
                <a href="/materi/1002" class="btn btn-outline-secondary"><strong>Materi</strong></a>
                <a href="/tugas/1002" class="btn btn-outline-secondary"><strong>Tugas</strong></a>
              </p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>Matematika</h3>
              <p>
                <a href="/materi/1005" class="btn btn-outline-dark"><strong>Materi</strong></a>
                <a href="/tugas/1005" class="btn btn-outline-dark"><strong>Tugas</strong></a>
              </p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-secondary">
            <div class="inner">
              <h3>B.Indonesia</h3>
              <p>
                <a href="/materi/1003" class="btn btn-outline-warning"><strong>Materi</strong></a>
                <a href="/tugas/1003" class="btn btn-outline-warning"><strong>Tugas</strong></a>
              </p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->

        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->

          @endsection