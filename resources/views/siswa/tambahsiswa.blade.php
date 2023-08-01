@extends('layout.tampilan')


@section('content')

<body>
  <h1 class="text-center mb-3">Tambah Data Siswa</h1>

  <!-- CONTAINER -->
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-7">

        <div class="card-body">
          <form action="/insertdatasiswa" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row g-3">
              <div class="col">
                <label for="inputEmail4" class="form-label">NIS</label>
                <input type="text" name="id_siswa" class="form-control" aria-label="First name" required>
              </div>
              <div class="col">
                <label for="inputEmail4" class="form-label">Nama Siswa</label>
                <input type="text" name="nama_siswa" class="form-control" aria-label="First name" required>
              </div>
            </div>

            <div class="row g-3">
              <div class="col">
                <label for="nama_kelas" class="form-label"></label>
                <select class="form-control" name="nama_kelas" id="nama_kelas">
                  <option value="">Pilih Kelas</option>
                  @foreach($dt_kelas as $kelas)
                  <option value="{{ $kelas->kode_kelas }}">{{ $kelas->nama_kelas }}</option>
                  @endforeach
                </select>
              </div>
              <div class="col">
                <label for="inputEmail4" class="form-label"></label>
                <input type="date" name="tgl_lahir" class="form-control" aria-label="First name" required>
              </div>
            </div>


            <div class="row g-3">
              <div class="col">
                <label for="inputEmail4" class="form-label">No Telepon</label>
                <input type="text" name="no_telp" class="form-control" aria-label="First name" required>
              </div>
              <div class="col">
                <label for="inputEmail4" class="form-label">Alamat</label>
                <input type="text" name="alamat" class="form-control" aria-label="First name" required>
              </div>
            </div>

            <!-- <div class="row g-3">
        <div class="col">
            <label for="inputEmail4" class="form-label">Username</label>
            <input type="text" name="username" class="form-control" aria-label="First name" required>
            </div>
        <div class="col">
            <label for="inputEmail4" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" aria-label="First name" required>
            </div>
        </div> -->

            <div class="row g-1">
              <div class="col-10 mt-2">
                <button type="submit" class="btn btn-success">Tambah</button>
                <a href="/siswa" class="btn btn-danger">Cencel</a>
              </div>
            </div>


          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

@endsection