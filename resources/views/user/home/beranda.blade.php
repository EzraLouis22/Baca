@extends('layoutuser.app')

@section('content')
  <body class="bg-gray-100 font-sans antialiased">
    <article class="max-w-3xl mx-auto px-4 py-8 bg-white rounded shadow-md text-white" style="background: linear-gradient(to bottom, #827271 0%, #46445C 50%,  #827271 100%);">
      @csrf
      @foreach ($renungans as $renungan)
        {{-- Header Renungan --}}
        <div class="flex items-center justify-between mb-6">
          <h2 class="text-2xl font-semibold text-white">Renungan Harian</h2>
          <a href="{{ route('user.renungans.index') }}" class="text-white hover:underline">Kembali ke Daftar Renungan</a>
        </div>

        {{-- Judul Renungan --}}
        <h1 class="text-4xl font-bold mb-2 text-white">{{ $renungan->judul }}</h1>
        <p class="text-sm text-white mb-6">{{ \Carbon\Carbon::parse($renungan->date_renungan)->isoFormat('dddd, D MMMM Y') }}</p>

        {{-- Konten Renungan --}}
        <div class="prose prose-gray max-w-none">
          <p>Bacaan: <strong>{{ $renungan->bacaan }}</strong></p>

          <blockquote class="border-l-4 border-blue-500 pl-4 my-4 text-white-600 italic">
            "{{ $renungan->ayat_bacaan }}"
          </blockquote>

          <p class="mt-8 p-4 rounded-lg text-black" style="background-color:#c4c4c4;"><em>Ayat Kunci:</em> {{ $renungan->ayat_kunci }}</p>
          <br>
          <p>{!! nl2br(e($renungan->isi_renungan)) !!}</p>

          {{-- Refleksi dan Pertanyaan --}}
          @if ($renungan->refleksi)
            <div class="mt-8 p-4 rounded-lg text-black" style="background-color:#BCC3D3;">
              <h3 class="font-semibold text-lg mb-2">Renungkan:</h3>
              <p>{{ $renungan->pertanyaan }} {{ $renungan->refleksi }}</p>
            </div>
          @endif

          {{-- Prinsip --}}
          @if ($renungan->prinsip)
            <div class="p-4 rounded my-6 text-black text-white text-base font-bold uppercase leading-relaxed tracking-wide">
              <p class="inline px-0.5"" style="background-color:#45383F;">"{{ $renungan->prinsip }}"</p>
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
