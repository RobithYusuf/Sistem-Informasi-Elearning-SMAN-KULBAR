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
                        <!-- Kolom Tambah Data Guru -->
                        <div class="col-sm-6 mb-2 mb-sm-0">
                            <a href="/tambahdataguru" class="btn btn-info">Tambah Data</a>
                        </div>

                        <!-- Kolom Pencarian -->
                        <div class="col-sm-4 mb-2 mb-sm-0">
                            <form action="/guru" method="get" class="form-inline d-flex justify-content-end">
                                <div class="input-group input-group-sm">
                                    <input type="text" name="search" class="form-control" placeholder="Cari..." value="{{ $search }}">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <!-- Akhir Form Pencarian -->
                        </div>
                    </div>
                </div>

                <!-- Tampilan Data Guru dan Notifikasi -->
                <div class="card-body">
                    @if(count($data) > 0)
                    <table>
                        <!-- Tampilkan data guru -->
                    </table>
                    @else
                    <p>Tidak ada data guru.</p>
                    @endif

                    <!-- Notifikasi -->
                    <div class="card-tools" style="font-size: small;">
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

                        @if ($message = Session::get('daftar'))
                        <div class="alert alert-success" role="alert">
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
                                <th scope="col">Nama</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">No Telpon</th>
                                <th scope="col">Akun</th>
                                <th scope="col" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $no => $value)
                            <tr>
                                <th scope="row">{{ $no+1}}</th>
                                <td>{{ $value->nama_guru}}</td>
                                <td>{{ $value->alamat}}</td>
                                <td>{{ $value->no_telp}}</td>
                                <td>
                                    @if($value->user_id)
                                    <i class="fas fa-check-circle text-success"></i>Terdaftar
                                    @else
                                    <a href="/daftarguru/{{ $value->id_guru}}"><i class="fas fa-times-circle text-danger"></i></a> Belum Terdaftar
                                    @endif
                                </td>
                                <td style="text-align: center;">
                                    <a href="/tampildataguru/{{ $value->id_guru}}" style="color: blue;"><i class="fas fa-edit"></i></a>
                                    <a href="#" style="color: red;"><i class="fas fa-trash-alt delete" data-id="{{ $value->id_guru }}" data-nama="{{ $value->nama_guru }}"></i></a>
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
                    var guruid = $(this).attr('data-id');
                    var gurunam = $(this).attr('data-nama');
                    swal({
                            title: "Yakin ?",
                            text: "Untuk Menghapus Data " + gurunam + " ",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                        })
                        .then((willDelete) => {
                            if (willDelete) {
                                window.location = "/deletedataguru/" + guruid + ""
                                swal("Data Berhasil DiHapus", {
                                    icon: "success",
                                });
                            } else {
                                swal("Data Tidak Dihapus");
                            }
                        });
                });
            </script>
        </div>
    </div>
</div>

@endsection