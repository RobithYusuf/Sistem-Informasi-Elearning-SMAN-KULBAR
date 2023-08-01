@extends ('layout.tampilanguru')

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
                        @if ($message = Session::get('update'))
                        <div class="alert alert-secondary" role="alert">
                            {{ $message }}
                        </div>
                        @endif
                    </div>
                    <div class="card-tools" style="font-size: small;">
                        @if ($message = Session::get('delete'))
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
            <div class="small-box bg-info">
              <div class="inner">
              <p>Kelas</p>
                <h3>XII IPA 1</h3>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="/materipelajaran/1" class="small-box-footer">Materi <i class="fas fa-arrow-circle-right"></i></a>
              <a href="/tugaspelajaran/1" class="small-box-footer">Tugas <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
            <div class="inner">
              <p>Kelas</p>
                <h3>XII IPA 2</h3>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="/materipelajaran/2" class="small-box-footer">Materi <i class="fas fa-arrow-circle-right"></i></a>
              <a href="/tugaspelajaran/2" class="small-box-footer">Tugas <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-secondary">
            <div class="inner">
              <p>Kelas</p>
                <h3>XII IPS 1</h3>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="/materipelajaran/3" class="small-box-footer">Materi <i class="fas fa-arrow-circle-right"></i></a>
              <a href="/tugaspelajaran/3" class="small-box-footer">Tugas <i class="fas fa-arrow-circle-right"></i></a>
          </div>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
            <div class="inner">
              <p>Kelas</p>
                <h3>XII IPS 2</h3>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="/materipelajaran/20" class="small-box-footer">Materi <i class="fas fa-arrow-circle-right"></i></a>
              <a href="/tugaspelajaran/20" class="small-box-footer">Tugas <i class="fas fa-arrow-circle-right"></i></a>
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