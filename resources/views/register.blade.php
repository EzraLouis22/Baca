<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>BACA Perkantas | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('AdminLTE/dist/css/adminlte.min.css') }}">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>BACA</b> Perkantas</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <img src="{{ asset('picture/logo_baca.png') }}" alt="BACA Perkantas Logo" style="display: block; margin-left: auto; margin-right: auto; width: 100%">
      <br>
      <h5 class="login-box-msg" style="text-size: 40px" >Sign in to start your session</h5>

      {{-- alert here --}}
      @if (session('error'))
        <div class="alert alert-danger">
            {{session('error')}}
        </div>
      @endif

      <!-- resources/views/user/register.blade.php -->
      
      <form method="POST" action="{{ route('user.auth.postRegister') }}" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
              <label for="name">Nama</label>
              <input type="text" name="name" id="name" class="form-control">
          </div>
          <div class="form-group">
              <label for="email">Email</label>
              <input type="email" name="email" id="email" class="form-control">
          </div>
          <div class="form-group">
              <label for="password">Password</label>
              <input type="password" name="password" id="password" class="form-control">
          </div>
          <div class="form-group">
              <label for="role">Role</label>
              <select name="role" id="role" class="form-control">
                  <option value="member">Member</option>
              </select>
          </div>
          <div class="form-group">
              <label for="image">Foto Profil</label>
              <input type="file" name="image" id="image" class="form-control" accept="pp/*" max-size="2048">
          </div>
          <button type="submit" class="btn btn-primary">Daftar</button>
          <p>Sudah punya akun? <a href="{{ route('root') }}">Login</a></p>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ asset('AdminLTE/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('AdminLTE/dist/js/adminlte.min.js') }}"></script>
</body>
</html>
