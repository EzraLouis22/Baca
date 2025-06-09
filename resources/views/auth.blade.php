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

      <form action="{{route('admin.auth.login')}}" method="post">
          @csrf
          <div class="container">
              <div class="row">
                  <div class="col-md-6">
                      <a href="{{ route('admin.auth.index') }}" class="btn btn-primary">Login sebagai Admin</a>
                  </div>
                  <div class="col-md-6">
                      <a href="{{ route('user.auth.login') }}" class="btn btn-primary">Login sebagai User</a>
                  </div>
              </div>
          </div>
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
