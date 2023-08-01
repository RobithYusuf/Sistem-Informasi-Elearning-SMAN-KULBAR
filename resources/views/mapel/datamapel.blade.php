@extends ('layout.tampilan')

@section('content')


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="card">
                <h1 class="text-center mb-1">SMA NEGERI 1 KULISUSU BARAT</h1>
                <div class="card-header">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-sm-6 mb-2 mb-sm-0">
                            <!-- Button Tambah Data -->
                            <a href="/tambahdatamapel" class="btn btn-info" style="margin-bottom: 10px;">Tambah Data</a>
                        </div>

                        <div class="col-sm-4 mb-2 mb-sm-0">
                            <!-- Kolom Pencarian -->
                            <form action="/siswa" method="get" class="form-inline d-flex justify-content-end">
                                <div class="input-group input-group-sm">
                                    <input type="text" name="search" class="form-control" placeholder="Cari...">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <!-- Akhir Kolom Pencarian -->
                        </div>
                    </div>

                    <!-- Notifikasi -->
                    <div class="row">
                        <div class="col-sm-12">
                            @if ($message = Session::get('success'))
                            <div class="alert alert-success" role="alert">
                                {{ $message }}
                            </div>
                            @endif

                            @if ($message = Session::get('update'))
                            <div class="alert alert-success" role="alert">
                                {{ $message }}
                            </div>
                            @endif

                            @if ($message = Session::get('delete'))
                            <div class="alert alert-success" role="alert">
                                {{ $message }}
                            </div>
                            @endif
                        </div>
                    </div>
                </div>


                <div class="card-body p-0">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <!-- <th scope="col" style="text-align: center;">Kode Mata Pelajaran</th> -->
                                <th scope="col">Nama Mata Pelajaran</th>
                                <th scope="col">Nama Pengajar</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($data as $no => $value)
                            <tr>
                                <th scope="row">{{ $no+1}}</th>
                                <!-- <td>{{ $value->kode_mapel}}</td> -->
                                <td>{{ $value->nama_mapel}}</td>
                                <td>{{ $value->nama_guru}}</td>
                                <td>
                                    <div>
                                        <a href="/tampildatamapel/{{ $value->kode_mapel}}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                        <a href="#" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt delete" data-id="{{ $value->kode_mapel }}" data-nama="{{ $value->nama_mapel }}"></i></a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                        <script src="https://code.jquery.com/jquery-3.7.0.slim.js" integrity="sha256-7GO+jepT9gJe9LB4XFf8snVOjX3iYNb0FHYr5LI1N5c=" crossorigin="anonymous"></script>
                    </table>
                </div>
            </div>
            <script>
                $('.delete').click(function() {
                    var mapelid = $(this).attr('data-id');
                    var mapelnam = $(this).attr('data-nama');
                    swal({
                            title: "Yakin ?",
                            text: "Untuk Menghapus Mata Pelajaran " + mapelnam + " ",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                        })
                        .then((willDelete) => {
                            if (willDelete) {
                                window.location = "/deletedatamapel/" + mapelid + ""
                                swal("Mata Pelajaran Berhasil DiHapus", {
                                    icon: "success",
                                }).then(() => {
                                    window.location.href = "/mapel";
                                });
                            } else {
                                swal("Mata Pelajaran Tidak Dihapus");
                            }
                        });
                });
            </script>
        </div>

        @endsection