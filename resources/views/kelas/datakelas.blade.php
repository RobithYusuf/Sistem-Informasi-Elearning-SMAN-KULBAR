@extends ('layout.tampilan')

@section('content')


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="card">
                <h1 class="text-center mb-1">SMA NEGERI 1 KULISUSU BARAT</h1>
                <div class="card-header">
                    <a href="/tambahdatakelas" class="btn btn-info" style="margin-bottom: 10px;">Tambah Data</a>
                    <div class="card-tools" style="font-size: small;">
                        @if ($message = Session::get('success'))
                        <div class="alert alert-secondary" role="alert">
                            {{ $message }}
                        </div>
                        @endif

                        @if ($message = Session::get('update'))
                        <div class="alert alert-secondary" role="alert">
                            {{ $message }}
                        </div>
                        @endif

                        @if ($message = Session::get('delete'))
                        <div class="alert alert-secondary" role="alert">
                            {{ $message }}
                        </div>
                        @endif
                    </div>
                </div>

                <div class="card-body p-0">
                    <table class="table">
                        <thead> 
                            <tr>
                                <th scope="col">No</th>
                                <!-- <th scope="col" style="text-align: center;">Kode Kelas</th> -->
                                <th scope="col" style="text-align: center;">Nama Kelas</th>
                                <th scope="col" style="text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($data as $no => $value)
                            <tr>
                                <th scope="row">{{ $no+1}}</th>
                                <!-- <td style="text-align: center;">{{ $value->kode_kelas}}</td> -->
                                <td style="text-align: center;">{{ $value->nama_kelas}}</td>
                                <td>
                                    <div style="text-align: center;">
                                        <a href="/lihatdatakelas/{{ $value->kode_kelas}}" class="btn btn-success btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                        <a href="/tampildatakelas/{{ $value->kode_kelas}}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                        <a href="#" class="btn btn-danger btn-sm delete" data-id="{{ $value->kode_kelas }}" data-nama="{{ $value->nama_kelas }}"><i class="fas fa-trash-alt"></i></a>
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
                    var kelasid = $(this).attr('data-id');
                    var kelasnam = $(this).attr('data-nama');
                    swal({
                            title: "Yakin ?",
                            text: "Untuk Menghapus Kelas "+kelasnam+" ",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                        })
                        .then((willDelete) => {
                            if (willDelete) {
                                window.location = "/deletedatakelas/"+kelasid+""
                                swal("Kelas Berhasil DiHapus", {
                                    icon: "success",
                                });
                            } else {
                                swal("Kelas Tidak Dihapus");
                            }
                        });
                });
            </script>
        </div>
        @endsection