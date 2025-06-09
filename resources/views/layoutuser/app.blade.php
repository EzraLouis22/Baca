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
</head>
<body class="bg-gray-100 text-gray-900 leading-relaxed font-sans">
  <header class="bg-white shadow">
    <nav class="bg-gray-200 py-4">
      <div class="max-w-4xl mx-auto px-4 flex justify-between">
        <img src="{{ asset('picture/logo_baca.png') }}" alt="BACA Perkantas Logo" class="brand-image img-rounded elevation-3" width="10%" height="10%" style="float: left">
        <ul class="flex items-center justify-end">
          <li class="mr-6">
            <a href="{{ route('user.auth.beranda') }}" class="text-gray-600 hover:text-gray-900">Beranda</a>
          </li>
          <li class="mr-6">
            <a href="" class="text-gray-600 hover:text-gray-900">Renungan</a>
          </li>
          <li class="mr-6">
            <a href="{{ route('user.catatan.index') }}" class="text-gray-600 hover:text-gray-900">Catatanku</a>
          </li>
          <li class="mr-6">
            <a href="#" class="text-gray-600 hover:text-gray-900">A</a>
          </li>
        </ul>
      </div>
    </nav>
    <div class="max-w-4xl mx-auto px-4 py-4">
      <h1 class="text-2xl font-semibold">Renungan Harian</h1>
    </div>
    
  </header>

  <main class="max-w-4xl mx-auto px-4 py-10">
    @yield('content')
  </main>

  <footer class="bg-white shadow mt-16">
    <div class="max-w-4xl mx-auto px-4 py-6 text-sm text-gray-500">
      &copy; {{ date('Y') }} BACA - Perkantas Semarang
    </div>
  </footer>
</body>
</html>
