<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>E-Learning | SMAN 1 Kulisusu Barat</title>
  <style>
        /* CSS to center the logo and adjust its size */
        .logo-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 110px; 
        }

        .logo-image {
            max-width: 130px; 
            max-height: 130px;
            border-radius: 30%; 
        }
        .title {
            font-size: 26px;
            /* Menghapus teks "bold" */
            font-weight: bold;
            margin-bottom: 5px;
        }
        .center {
            text-align: center;
        }
        body.hold-transition.login-page {
            background-color: #f0f0f0; 
        }
    </style>

  <!-- Ikon Favicon -->
  <link rel="icon" href="{{ asset('favicon-16x16') }}">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('template/plugins/fontawesome-free/css/all.min.css') }} ">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('template/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }} ">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('template/dist/css/adminlte.min.css') }} ">
</head>
<section class="vh-100" style="background-color:aliceblue;"> 
<!-- warna -->
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-4">
        <div class="card shadow-2-strong">
        <div class="card card-outline card-primary">
          <div class="card-header text-center">
              <div class="logo-container">
                  <div class="image">
                      <!-- Make sure the image path is correct -->
                      <img src="{{ asset('template/dist/img/sma.png') }}" class="logo-image" alt="Logo">
                  </div>
              </div>
          </div>
          <div class="card-body">
          <div class="center title">Welcome</div>
        <form action="/loginproses" method="post">
          @csrf
          <div class="input-group mb-3">
            <input type="email" class="form-control" name="email" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" name="password" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="remember">
                <label for="remember">
                  Remember Me
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Log in</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
  
        <p class="mb-0">
          <!-- tulisan dibawah remeber me -->
        </p>
      </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- jQuery -->
<script src="{{ asset('template/plugins/jquery/jquery.min.js') }} "></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('template/plugins/bootstrap/js/bootstrap.bundle.min.js') }} "></script>
<!-- AdminLTE App -->
<script src="{{ asset('template/dist/js/adminlte.min.js') }} "></script>
</body>
</html>
