<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $title ?? 'Renungan' }}</title>
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <style>
    body {
      margin: 0;
      padding: 20px;
      font-family: Arial, sans-serif;
      background-image: url('../bg/bg-header.png');
      background-color: rgba(34, 43, 70, 1);
      background-position: top;
      background-size: 101% 50%;
      background-repeat: no-repeat;
    }
    header {
      background-color: rgba(130, 114, 113, 0.7);
      padding: 1rem;
      text-align: center;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      transition: all 0.3s ease-in-out;
    }
    nav {
      padding: 1em;
      text-align: center;
      transition: all 0.3s ease-in-out;
    }
    nav img {
      width: 100px;
      height: auto;
      margin: 0 auto;
      transition: all 0.3s ease-in-out;
    }
    @media only screen and (max-width: 768px) {
      nav img {
        width: 50px;
      }
    }
    .logo-menu {
      display: flex;
      flex-direction: column;
      align-items: center;
      margin: 0 auto;
      width: 100%;
      text-align: center;
      transition: all 0.3s ease-in-out;
    }
    .logo-menu img {
      margin: 0 auto;
      transition: all 0.3s ease-in-out;
    }
    .logo-menu ul {
      margin: 20px auto;
      transition: all 0.3s ease-in-out;
      font-size: 1.2rem;
    }
    .logo-menu a {
      color: #fff;
      text-decoration: none;
      transition: all 0.3s ease-in-out;
    }
    .logo-menu a:hover {
      color: #ccc;
      transition: all 0.3s ease-in-out;
    }
  </style>
<body class="text-gray-900 leading-relaxed font-sans">
  <header class="shadow text-white">
    <nav class="px-4 py-2 shadow">
      <div class="logo-menu">
        <img src="{{ asset('picture/logo_baca.png') }}" alt="BACA Perkantas Logo" class="w-40 h-auto" />
        <ul class="flex flex-wrap items-center justify-center space-x-4 mt-2 md:mt-0">
          <li><a href="{{ route('user.auth.beranda') }}" class="hover:text-gray-900">Beranda</a></li>
          <li><a href="{{ route('user.auth.renungan') }}" class="hover:text-gray-900">Renungan</a></li>
          <li><a href="{{ route('user.catatan.index') }}" class="hover:text-gray-900">Catatanku</a></li>
          <li><a href="#" class="hover:text-gray-900">A</a></li>
        </ul>
      </div>
    </nav>
  </header>
  <main>
    @yield('content')
  </main>

  <footer class="shadow mt-16 text-white" style="background-color: rgba(130, 114, 113, 1);">
    <div class="max-w-4xl mx-auto px-4 py-6 text-sm">
      &copy; {{ date('Y') }} BACA - Perkantas Semarang
    </div>
  </footer>
</body>
</html>
