@extends('layout.tampilan')


@section('content')

  <body>
    <h1 class="text-center mb-3">Edit Data User</h1>

    <!-- CONTAINER -->
<div class="container">
  <div class="row justify-content-center">
  <div class="col-7">

    <div class="card-body">
      <form action="/updatedatauser/{{ $data->id}}"  method="POST" enctype="multipart/form-data">
        @csrf
        <div class="input-group mb-3">
              <input type="name" class="form-control" name="name" value="{{ $data->name}}" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-user"></span>
                </div>
              </div>
            </div>

          <div class="input-group mb-3">
              <select class="form-control" name="role">>
                <option selected>{{ $data->role}}</option>
                <option value="admin">Admin</option>
                <option value="guru">Guru</option>
                <option value="siswa">Siswa</option>
              </select>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-tag"></span>
                </div>
              </div>
            </div>

            <div class="input-group mb-3">
              <input type="email" class="form-control" name="email" value="{{ $data->email}}" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
            </div>

            <div class="input-group mb-3">
              <input type="password" class="form-control" name="password" placeholder="Masukan Password baru">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>

          <div class="row g-1">
          <div class="col-12 mt-4">
            <button type="submit" class="btn btn-success">Update</button>
            <a href="/users" class="btn btn-danger">Cencel</a>
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