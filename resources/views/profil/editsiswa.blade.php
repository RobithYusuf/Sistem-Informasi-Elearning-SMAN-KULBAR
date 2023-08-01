@extends('layout.tampilansiswa')

@section('content')
<body>
    <h1 class="text-center mb-3">Edit Data Guru</h1>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-7">
                <div class="card-body">
                    <form action="/update"  method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-3"> 
                            <div class="col">
                                <label for="inputEmail4" class="form-label">Nama Lengkap</label>
                                <input type="text" name="nama_siswa" class="form-control" aria-label="First name" value="{{ $data->nama_siswa ?? '' }}" required>
                            </div>
                            <div class="col">
                                <label for="inputEmail4" class="form-label">Email</label>
                                <input type="text" name="email" class="form-control" aria-label="Last name" value="{{ $data->users->email ?? '' }}" required>
                            </div>
                        </div>

                        <div class="row g-3"> 
                            <div class="col">
                                <label for="inputAddress2" class="form-label">Tanggal Lahir</label>
                                <input type="date" name="tgl_lahir" class="form-control" id="inputAddress2" value="{{ $data->tgl_lahir ?? '' }}" required>
                            </div>
                            <div class="col">
                                <label for="inputEmail4" class="form-label">Alamat</label>
                                <input type="text" name="alamat" class="form-control" aria-label="Last name" value="{{ $data->alamat ?? '' }}" required>
                            </div>
                        </div>

                        <div class="row g-3"> 
                            <div class="col">
                                <label for="inputCity" class="form-label">No Telepon</label>
                                <input type="text" name="no_telp" class="form-control" id="inputCity" value="{{ $data->no_telp ?? '' }}" required>
                            </div>
                            <div class="col">
                                <label for="inputCity" class="form-label">Password (Untuk DiPerbarui)</label>
                                <input type="password" name="password" class="form-control" id="inputCity" placeholder="Masukan Password Baru">
                            </div>
                        </div>

                        <div class="row g-1">
                            <div class="col-12 mt-4">
                                <button type="submit" class="btn btn-success">Update</button>
                                <a href="/profilsiswa" class="btn btn-danger">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection
