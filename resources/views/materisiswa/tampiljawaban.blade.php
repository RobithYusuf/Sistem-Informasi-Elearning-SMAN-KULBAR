@extends('layout.tampilansiswa')

@section('content')

<body>
  <h1 class="text-center mb-3">Edit Jawaban Tugas Pelajaran</h1>

  <!-- CONTAINER -->
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-7">

        <div class="card-body">
          <form action="#" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row g-3">
              <div class="col">
                <label for="inputEmail4" class="form-label">Nama Tugas</label>
                <input type="text" name="nama_tugas" class="form-control" aria-label="First name"  readonly>
                <input type="hidden" name="kode_tugas">
              </div>

              <div class="col-4">
                <label for="inputEmail4" class="form-label">Deadline</label>
                <input type="text" name="deadline" class="form-control" aria-label="First name"  readonly>
              </div>
            </div>

            <div class="row g-3">
              <div class="col">
                <label for="inputEmail4" class="form-label"></label>
              </div>
            </div>

            <div class="row g-3">
              <div class="col">
                <label for="formFile" class="form-label">Upload Jawaban</label>
                <input class="form-control" type="file" id="formFile" name="file" required>
              </div>
            </div>

            <div class="row g-1">
              <div class="col-10 mt-2">
                <button type="submit" class="btn btn-success">Upload</button>
                <a href="/berandasiswa" class="btn btn-danger">Cancel</a>
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
