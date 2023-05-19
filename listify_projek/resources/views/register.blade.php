<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Register</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('template/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('template/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('template/dist/css/adminlte.min.css') }}">

  
</head>

<body class="hold-transition login-page">
<body background = "{{ asset('template/dist/img/bglistify.jpg') }}"class="hold-transition login-page">
  <div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <h1><b>REGISTER</b></h1>
      </div>
      <div class="card-body">

        <form action="/registeruser" method="post">
        @csrf
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="name" placeholder="name">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          
          <div class="input-group mb-3">
            <input type="email" class="form-control" name="email" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          
          <div class="input-group mb-3">
            <input type="password" class="form-control" name="password" placeholder="Password" id="password">            
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          
          <div class="input-group mb-3">
            <input type="password" class="form-control" name="re-password" placeholder="Confirm Password" id="re-password">            
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          
          <div class="input-group mb-3">
            <input type="drive" class="form-control" name="gdrive" placeholder="gdrive Folder's Link">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-link"></span>
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
              <button type="submit" class="btn btn-primary btn-block">Sign In</button>
            </div>
            <!-- /.col -->
          </div>
        </form>


        <!-- /.social-auth-links -->

    
        <p class="mb-0">
          <a href="/login" class="text-center">Login</a>
        </p>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.login-box -->

  <script>
    const passwordInput = document.querySelector('input[name="password"]');
    const rePasswordInput = document.querySelector('input[name="re-password"]');
  
    rePasswordInput.addEventListener('input', () => {
      if (rePasswordInput.value !== passwordInput.value) {
        rePasswordInput.setCustomValidity('Passwords do not match');
      } else {
        rePasswordInput.setCustomValidity('');
      }
    });
  </script>

  <!-- jQuery -->
  <script src="{{ asset('template/plugins/jquery/jquery.min.js') }}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{ asset('template/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('template/dist/js/adminlte.min.js') }}"></script>
</body>


</html>