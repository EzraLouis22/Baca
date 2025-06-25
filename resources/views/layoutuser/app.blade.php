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

    footer {
      height: auto;
      position: absolute; /* add this line */
      width: 100%; /* add this line */
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
          <li>
              <a href="{{ route('user.auth.beranda') }}" class="hover:text-gray-900 flex items-center">
                  <svg class="w-4 h-4 mr-2" xmlns="[http://www.w3.org/2000/svg"](http://www.w3.org/2000/svg") fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                  </svg>
                  Beranda
              </a>
          </li>

          <li>
              <a href="{{ route('user.renungans.index') }}" class="hover:text-gray-900 flex items-center">
                  <svg class="w-4 h-4 mr-2" xmlns="[http://www.w3.org/2000/svg"](http://www.w3.org/2000/svg") fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.477 6.936 9.268 8.03 7.5 9.4c-4.418 3.444-1.29 8.484 5.12 8.484V16c-3.075.034-5.068-1.464-6.158-3.498A1.989 1.989 0 000 9.05v-1.833c0-3.214 1.571-6.046 4.25-6.046 1.603 0 3.125.545 4.25 1.455V2.25c0-.966.626-1.75 1.475-1.75a1.74 1.74 0 013.02 0c.85.787 1.475 2.15 1.475 3.53v6.135A1.74 1.74 0 0112 9.73v1.833c0 3.214-1.571 6.046-4.25 6.046-1.603 0-3.125-.545-4.25-1.455V14.4c0-.966-.626-1.75-1.475-1.75a1.74 1.74 0 01-3.02 0c-.85.787-1.475 2.15-1.475 3.53v1.833A1.74 1.74 0 0112 21.73v2.135z" />
                  </svg>
                  Renungan
              </a>
          </li>

          <li>
              <a href="{{ route('user.catatan.index') }}" class="hover:text-gray-900 flex items-center">
                  <svg class="w-4 h-4 mr-2" xmlns="[http://www.w3.org/2000/svg"](http://www.w3.org/2000/svg") fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V3a2 2 0 012-2h12a2 2 0 012 2v12a2 2 0 01-2 2h-6" />
                  </svg>
                  Catatanku
              </a>
          </li>
          <li>
              <a href="{{ route('user.auth.profile') }}" class="hover:text-gray-900 flex items-center">
                  <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                  </svg>
                  Profile
              </a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <main>
    @yield('content')
  </main>

  <footer class="shadow text-white" style="background-color: rgba(130, 114, 113, 1);">
    <div class="max-w-4xl mx-auto px-4 py-6 text-sm">
      &copy; {{ date('Y') }} BACA - Perkantas Semarang
    </div>
  </footer>
</body>
</html>
