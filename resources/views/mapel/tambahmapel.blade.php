@extends('layout.tampilan')


@section('content')

<body>
  <h1 class="text-center mb-3">Data Mapel</h1>

  <!-- CONTAINER -->
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-7">

        <div class="card-body">
          <form action="/insertdatamapel" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row g-3">
              <!--
              <div class="col">
                <label for="inputEmail4" class="form-label">Kode Mata Pelajaran</label>
                <input type="text" name="kode_mapel" class="form-control" aria-label="First name">
              </div>
-->
              <div class="col">
                <label for="inputEmail4" class="form-label">Nama Mata Pelajaran</label>
                <input type="text" name="nama_mapel" class="form-control" aria-label="Last name" required>
              </div>
            </div>

            <!-- <label for="browser">Choose your browser from the list:</label>
            <input list="browsers" name="browser" id="browser">
            <datalist id="browsers">
              <option value="Edge">
            </datalist> -->

            <label for="nama_guru" class="form-label">Nama Guru Pengajar</label>
            <select class="form-control" name="nama_guru" id="nama_guru" required>
              <option value="">Pilih Guru</option>
              @foreach($data as $guru)
              <option value="{{ $guru->id_guru}}">{{ $guru->nama_guru }}</option>
              @endforeach
            </select>

            <div class="row g-1">
              <div class="col-12 mt-2">
                <button type="submit" class="btn btn-success">Tambah</button>
                <a href="/mapel" class="btn btn-danger">Cencel</a>
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