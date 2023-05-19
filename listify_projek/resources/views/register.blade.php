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
  @vite('resources/css/app.css')
</head>

<body class="bg-cover bg-no-repeat bg-center" style="background-image: url('{{ asset('template/dist/img/bglistify.jpg') }}')">
  <div class="flex items-center justify-center min-h-screen">
  <div class="max-w-md w-1/2 h-1/4 mx-auto">
      <div class="bg-white shadow-lg overflow-hidden">
        <div class="px-6 py-4">
          <h1 class="text-3xl font-bold text-center">REGISTER</h1>
        </div>
        <div class="p-6">
          <form action="/registeruser" method="post">
            @csrf
            <div class="mb-4">
              <input type="text" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:border-indigo-500"
                name="name" placeholder="Name">
            </div>
            <div class="mb-4">
              <input type="email" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:border-indigo-500"
                name="email" placeholder="Email">
            </div>
            <div class="mb-4">
              <input type="password" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:border-indigo-500"
                name="password" placeholder="Password" id="password">
            </div>
            <div class="mb-4">
              <input type="password" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:border-indigo-500"
                name="re-password" placeholder="Confirm Password" id="re-password">
            </div>
            <div class="mb-4">
              <input type="drive" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:border-indigo-500"
                name="gdrive" placeholder="gdrive Folder's Link">
            </div>
            <div class="flex items-center mb-4">
              <input type="checkbox" id="remember"
                class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
              <label for="remember" class="ml-2 text-sm text-gray-600">Remember Me</label>
            </div>
            <div class="text-center">
              <button type="submit"
                class="w-full px-4 py-2 rounded-lg text-white bg-indigo-500 hover:bg-indigo-600 focus:outline-none">Sign Up</button>
            </div>
          </form>
        </div>
        <div class="px-6 py-4 bg-gray-100">
          <p class="text-sm text-center">Already have an account? <a href="/login" class="text-indigo-500">Login</a></p>
        </div>
      </div>
    </div>
  </div>

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