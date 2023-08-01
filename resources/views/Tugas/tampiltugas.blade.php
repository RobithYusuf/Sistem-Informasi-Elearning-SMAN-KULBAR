@extends('layout.tampilanguru')


@section('content')

<body>
  <h1 class="text-center mb-3">Upload Tugas Pelajaran</h1>

  <!-- CONTAINER -->
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-7">

        <div class="card-body">
          <form action="/updatedatatugas/{{ $data->kode_tugas}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row g-3">
              <div class="col">
                <label for="inputEmail4" class="form-label">Nama Tugas</label>
                <input type="text" name="nama_tugas" class="form-control" aria-label="Last name" value="{{ $data->nama_tugas}}" required>
              </div>

              <div class="col-4">
                <label for="nama_kelas" class="form-label">Kelas</label>
                <select class="form-control" name="nama_kelas" id="nama_kelas" disabled>
                  @foreach ($kelasData as $kelas)
                  <option value="{{ $kelas->kode_kelas }}" {{ $kelas->kode_kelas == $data->kelas->kode_kelas ? 'selected' : '' }}>
                    {{ $kelas->nama_kelas }}
                  </option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="row g-3">
              <div class="col">
                <label for="formFile" class="form-label"></label>
              </div>

              <div class="col-4">
                <label for="inputEmail4" class="form-label"></label>
              </div>
            </div>


            <div class="row g-3">
              <div class="col">
                <label for="exampleFormControlTextarea1" class="form-label">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" id="exampleFormControlTextarea1" rows="3" required>{{ $data->deskripsi }}</textarea>
              </div>
            </div>

            <div class="row g-3">
              <div class="col">
                <label for="formFile" class="form-label"></label>
              </div>

              <div class="col-4">
                <label for="inputEmail4" class="form-label"></label>
              </div>
            </div>

            <div class="row g-3">
              <div class="col">
                <label for="formFile" class="form-label" style="font-weight: normal;">Silahkan upload file, jika ingin mengganti file tugas</label>
                <input class="form-control" type="file" id="formFile" name="file" value="{{ $data->file }}">
              </div>
              <div class="col-4">
                <label for="inputEmail4" class="form-label" style="font-weight: normal;">Batas Pengumpulan</label>
                <input type="datetime-local" name="deadline" class="form-control" aria-label="Last name" value="{{ $data->deadline }}" required>
              </div>
            </div>

            <div class="row g-3">
              <div class="col">
                <label for="formFile" class="form-label"></label>
              </div>

              <div class="col-4">
                <label for="inputEmail4" class="form-label"></label>
              </div>
            </div>

            <div class="row g-1">
              <div class="col-10 mt-2">
                <button type="submit" class="btn btn-success">Update</button>
                <a href="/berandaguru" class="btn btn-danger">Cencel</a>
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