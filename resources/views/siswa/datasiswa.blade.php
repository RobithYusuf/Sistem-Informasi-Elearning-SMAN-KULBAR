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
                            <a href="/tambahdatasiswa" class="btn btn-info">Tambah Data</a>
                        </div>

                        <!-- Kolom Filter dan Pencarian -->
                        <div class="col-sm-4 mb-2 mb-sm-0">
                            <!-- Form for Filter -->
                            <form action="/siswa" method="get" class="form-inline d-flex justify-content-end mb-2">
                                <div class="input-group input-group-sm">
                                    <select name="kelas" class="form-control" onchange="this.form.submit()">
                                        <option value="">Semua</option>
                                        <option value="XII IPA 1" {{$filterOption === 'XII IPA 1' ? 'selected' : '' }}>XII IPA 1</option>
                                        <option value="XII IPA 2" {{ $filterOption === 'XII IPA 2' ? 'selected' : '' }}>XII IPA 2</option>
                                        <option value="XII IPS 1" {{ $filterOption === 'XII IPS 1' ? 'selected' : '' }}>XII IPS 1</option>
                                        <option value="XII IPS 2" {{ $filterOption === 'XII IPS 2' ? 'selected' : '' }}>XII IPS 2</option>
                                        <!-- Tambahkan opsi filter lain sesuai kebutuhan -->
                                    </select>
                                    <button type="submit" class="btn btn-primary ml-2">Filter</button>
                                </div>
                            </form>

                            <!-- Form for Pencarian -->
                            <form action="/siswa" method="get" class="form-inline d-flex justify-content-end mb-2">
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

                <!-- Tampilan Data Siswa dan Notifikasi -->
                <div class="card-body">
                    @if(count($data) > 0)
                    <table>
                        <!-- Tampilkan data siswa -->
                    </table>
                    @else
                    <p>Tidak ada data siswa.</p>
                    @endif

                    <!-- Notifikasi -->
                    <div class="card-tools" style="font-size: small;">
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success" role="alert">
                            {{ $message }}
                        </div>
                        @endif

                        @if ($message = Session::get('delete'))
                        <div class="alert alert-success" role="alert">
                            {{ $message }}
                        </div>
                        @endif

                        @if ($message = Session::get('update'))
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
                                <th scope="col">Nama Siswa</th>
                                <!-- <th scope="col" style="text-align: center;">Email</th> -->
                                <th scope="col" style="text-align: center;">Kelas</th>
                                <th scope="col" style="text-align: center;">Tanggal Lahir</th>
                                <th scope="col" style="text-align: center;">Alamat</th>
                                <th scope="col" style="text-align: center;">No Telepon</th>
                                <th scope="col" style="text-align: center;">Akun</th>
                                <th scope="col" style="text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($data as $no => $value)
                            <tr>
                                <th scope="row">{{ $no+1}}</th>
                                <td>{{ $value->nama_siswa}}</td>
                                <!-- <td style="text-align: center;">{{ $value->email}}</td> -->
                                <td style="text-align: center;">{{ $value->nama_kelas}}</td>
                                <td style="text-align: center;">{{ $value->tgl_lahir->format('d/m/Y') }}</td>
                                <td style="text-align: center;">{{ $value->alamat}}</td>
                                <td style="text-align: center;">{{ $value->no_telp}}</td>
                                <td style="text-align: center;">
                                    @if($value->user_id)
                                    <i class="fas fa-check-circle text-success"></i>Terdaftar
                                    @else
                                    <a href="/daftarsiswa/{{ $value->id_siswa}}"><i class="fas fa-times-circle text-danger"></i></a> Belum Terdaftar
                                    @endif
                                </td>
                                <td>
                                    <div style="text-align: center;">
                                        <a href="/tampildatasiswa/{{ $value->id_siswa}}" style="color: blue;"><i class="fas fa-edit"></i></a>
                                        <a href="#" style="color: red;"><i class="fas fa-trash-alt delete" data-id="{{ $value->id_siswa }}" data-nama="{{ $value->nama_siswa }}"></i></a>
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
                var siswaid = $(this).attr('data-id');
                var siswanam = $(this).attr('data-nama');
                swal({
                        title: "Yakin ?",
                        text: "Untuk Menghapus Data " + siswanam + " ",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            window.location = "/deletedatasiswa/" + siswaid + ""
                            swal("Data Siswa Berhasil DiHapus", {
                                icon: "success",
                            });
                        } else {
                            swal("Data Siswa Tidak Dihapus");
                        }
                    });
            });
        </script>
    </div>
</div>
</div>

@endsection