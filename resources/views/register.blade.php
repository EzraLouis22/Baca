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
                  <option value="admin">Admin</option>
              </select>
          </div>
          <div class="form-group">
              <label for="image">Foto Profil</label>
              <input type="file" name="image" id="image" class="form-control" accept="image/*">
          </div>
          <button type="submit" class="btn btn-primary" id="registerButton">Daftar</button>
          <p>Sudah punya akun? <a href="{{ route('root') }}">Login</a></p>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<script>
document.getElementById('registerButton').addEventListener('click', async function(event) {
    event.preventDefault(); // cegah submit langsung

    const form = event.target.closest('form');

    // Loading popup
    await Swal.fire({
        title: 'Registering...',
        text: 'Please wait while we register you.',
        timer: 1500,
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    // Success popup setelah loading
    await Swal.fire({
        title: 'Berhasil Terdaftar!',
        text: 'Akun Anda berhasil didaftarkan.',
        icon: 'success',
        timer: 2000,
        showConfirmButton: false
    });

    // Submit form setelah semua popup selesai
    form.submit();
});
</script>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- jQuery -->
<script src="{{ asset('AdminLTE/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('AdminLTE/dist/js/adminlte.min.js') }}"></script>
</body>
</html>
