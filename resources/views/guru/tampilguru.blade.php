@extends('layout.tampilan')


@section('content')

  <body>
    <h1 class="text-center mb-3">Edit Data Guru</h1>

    <!-- CONTAINER -->
<div class="container">
  <div class="row justify-content-center">
  <div class="col-7">

    <div class="card-body">
      <form action="/updatedataguru/{{ $data->id_guru}}"  method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row g-3"> 
        <div class="col">
            <label for="inputEmail4" class="form-label">NIP</label>
            <input type="text" name="id_guru" class="form-control" aria-label="First name" value="{{ $data->id_guru}}" required>
            </div>
        <div class="col">
            <label for="inputEmail4" class="form-label">Nama Guru</label>
            <input type="text" name="nama_guru" class="form-control" aria-label="Last name" value="{{ $data->nama_guru}}" required>
            </div>
        </div>

        <div class="row g-3"> 
          <div class="col">
            <label for="inputAddress2" class="form-label">No Telepon</label>
            <input type="text" name="no_telp" class="form-control" id="inputAddress2" value="{{ $data->no_telp}}" required>
           </div>
        <div class="col">
        <label for="inputEmail4" class="form-label">Tanggal Lahir</label>
            <input type="date" name="tgl_lahir" class="form-control" aria-label="Last name" value="{{ $data->tgl_lahir}}" required>
            </div>
        </div>

        <div class="row g-3"> 
        <div class="col">
          <label for="inputCity" class="form-label">Alamat</label>
            <input type="text" name="alamat" class="form-control" id="inputCity" value="{{ $data->alamat}}" required>
            </div>
        </div>

        <div class="row g-3"> 
        <div class="col">
          
            </div>
            </div>

        <!-- <div class="row g-3">
        <div class="col">
            <label for="inputEmail4" class="form-label">Username</label>
            <input type="text" name="username" class="form-control" aria-label="First name" value="{{ $data->username}}" value="{{ $data->username}}">
            </div> 
        <div class="col">
            <label for="inputEmail4" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" aria-label="Last name" value="{{ $data->password}}">
            </div>
        </div> -->

          <div class="row g-1">
          <div class="col-12 mt-4">
            <button type="submit" class="btn btn-success">Update</button>
            <a href="/guru" class="btn btn-danger">Cencel</a href="/guru">
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