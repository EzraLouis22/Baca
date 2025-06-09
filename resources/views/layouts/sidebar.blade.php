<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="/admin" class="brand-link">
    <img src="{{ asset('picture/logo_baca.png') }}" alt="BACA Perkantas Logo" class="brand-image img-rounded elevation-3" style="opacity: .8; transition: transform 0.2s ease-in-out;">
    <br>
    <span class="brand-text font-weight-light">BACA Perkantas</span>
  </a>
  <style>
    .brand-image {
      transition: transform 0.2s ease-in-out;
      transform: scale(1.2); /* ukuran awal */
    }

    .brand-image:hover {
      transform: scale(1); /* ukuran akhir */
    }
  </style>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{asset('AdminLTE/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Admin</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="/admin" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dasboard
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('users.index')}}" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Users
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('renungan.index')}}" class="nav-link">
            <i class="nav-icon fas fa-bible"></i>
            <p>
              Renungan
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('admin.auth.logout')}}" class="nav-link">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>
              Log Out
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
