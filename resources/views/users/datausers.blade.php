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
                        <!-- Kolom Tambah Data Siswa -->
                        <div class="col-sm-4 mb-2 mb-sm-0">
                            <a href="/register" class="btn btn-info" style="margin-bottom: 10px;">Tambah Data</a>
                        </div>

                        <!-- Kolom Pencarian -->
                        <div class="col-sm-4 mb-2 mb-sm-0">
                            <form action="/users" method="get" class="form-inline d-flex justify-content-end">
                                <div class="input-group input-group-sm">
                                    <input type="text" name="search" class="form-control" placeholder="Cari..." value="{{ $search }}">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @if(count($data) > 0)
                    <table>
                        <!-- Tampilkan data siswa -->
                    </table>
                    @else
                    <p>Tidak ada data Users</p>
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
                    </div>
                </div>

                <div class="card-body p-0">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">User Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Role</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $no => $value)
                            <tr>
                                <th scope="row">{{ $no+1}}</th>
                                <td>{{ $value->name}}</td>
                                <td>{{ $value->email}}</td>
                                <td>{{ $value->role}}</td>
                                <td>
                                    <a href="/tampildatauser/{{ $value->id}}" style="color: blue;"><i class="fas fa-edit"></i></a>
                                    <a href="#" style="color: red;"><i class="fas fa-trash-alt delete" data-id="{{ $value->id }}" data-nama="{{ $value->name }}"></i></a>
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
                    var userid = $(this).attr('data-id');
                    var usernam = $(this).attr('data-nama');
                    swal({
                            title: "Yakin ?",
                            text: "Untuk Menghapus user " + usernam + " ",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                        })
                        .then((willDelete) => {
                            if (willDelete) {
                                window.location = "/deletedatauser/" + userid + ""
                                swal("user Berhasil DiHapus", {
                                    icon: "success",
                                });
                            } else {
                                swal("User Tidak Dihapus");
                            }
                        });
                });
            </script>
        </div>

        @endsection