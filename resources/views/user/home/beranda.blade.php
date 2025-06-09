@extends('layoutuser.app')

@section('content')
  <body class="bg-gray-100 font-sans antialiased">
    <article class="max-w-3xl mx-auto px-4 py-8 bg-white rounded shadow-md">
      @csrf
      @foreach ($renungans as $renungan)
        {{-- Judul Renungan --}}
        <h1 class="text-4xl font-bold text-gray-800 mb-2">{{ $renungan->judul }}</h1>
        <p class="text-sm text-gray-500 mb-6">{{ \Carbon\Carbon::parse($renungan->date_renungan)->isoFormat('dddd, D MMMM Y') }}</p>

        {{-- Konten Renungan --}}
        <div class="prose prose-gray max-w-none">
          <p><strong>Bacaan:</strong> {{ $renungan->bacaan }}</p>

          <blockquote class="border-l-4 border-blue-500 pl-4 my-4 text-gray-700">
            "{{ $renungan->ayat_bacaan }}"
          </blockquote>

          <p><em>Ayat Kunci:</em> {{ $renungan->ayat_kunci }}</p>
          <br>
          <p>{!! nl2br(e($renungan->isi_renungan)) !!}</p>

          {{-- Refleksi dan Pertanyaan --}}
          @if ($renungan->refleksi)
            <div class="mt-8 p-4 bg-gray-100 rounded-lg">
              <h3 class="font-semibold text-lg mb-2">Refleksi</h3>
              <p><strong>Pertanyaan:</strong> {{ $renungan->pertanyaan }}</p>
              <p>{{ $renungan->refleksi }}</p>
            </div>
          @endif

          {{-- Prinsip --}}
          @if ($renungan->prinsip)
            <div class="bg-yellow-100 border-l-4 border-yellow-400 p-4 rounded my-6">
              <p><strong>Prinsip Firman</strong> <br>
              {{ $renungan->prinsip }}</p>
            </div>
          @endif

          {{-- Doa --}}
          <h2 class="text-2xl font-semibold mt-6 mb-2">Doa</h2>
          <p>{{ $renungan->doa }}</p>
          <br>
          <div>
            <a href="{{ route('user.catatan.create', ['renungan_id' => $renungan->id]) }}" class="btn-tambah">+</a>
          </div>
          <style>
            .btn-tambah {
              background-color: #4CAF50;
              color: #fff;
              padding: 10px 20px;
              border: none;
              border-radius: 5px;
              cursor: pointer;
            }
            
            .btn-tambah:hover {
              background-color: #3e8e41;
            }
          </style>
        </div>
      @endforeach
    </article>
  </body>
@endsection
