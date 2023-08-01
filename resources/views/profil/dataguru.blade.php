@extends ('layout.tampilanguru')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="card">
        <div class="card-header">
        </div>

        <div class="row">
          @foreach($data as $no => $value)
          <div class="col-lg-4">
            <div class="card mb-4">
              <div class="card-body text-center">
                <img src="{{ asset('template/dist/img/user0-128x128.jpg' )}} " alt="avatar" class="img-fluid" style="width: 250px;">
                <h5 class="my-3">{{ $value->name}}</h5>

                <div class="mb-4 mb-lg-0">
                  <div class="body p-0">
                    <a href="/editguru" class="btn btn-info btn-sm"><i class="fa fa-edit"> Edit Profil</i></a>
                  </div>
                </div>

              </div>
            </div>
            <div class="card mb-4 mb-lg-0">
              <div class="card-body p-0">

              </div>
            </div>
          </div>
          <div class="col-lg-8">
            <div class="card mb-4">
              <div class="card-body">
                Biodata
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Nama Lengkap</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0">{{ $value->nama_guru}}</p>
                  </div>
                </div>
                <hr>

                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Mata Pelajaran</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0">{{ $value->nama_mapel}}</p>
                  </div>
                </div>
                <hr>

                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">No Telepon</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0">{{ $value->no_telp}}</p>
                  </div>
                </div>
                <hr>

                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Email</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0">{{ $value->email}}</p>
                  </div>
                </div>
                <hr>

                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Alamat</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0">{{ $value->alamat}}</p>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0" style="visibility: hidden;">jjjj</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0" style="visibility: hidden;">jjjj</p>
                  </div>
                </div>


              </div>
            </div>

            @endforeach

@endsection