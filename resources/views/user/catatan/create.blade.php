@extends('layoutuser.app')

@section('content')
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
</style>
<body class="container mx-auto p-4">
    <article class="max-w-3xl mx-auto px-4 py-8 bg-white rounded shadow-md text-white" style="background: linear-gradient(to bottom, #827271 0%, #46445C 50%,  #827271 100%);">
        <h1 class="text-2xl font-bold mb-4">Tambah Catatan Renungan</h1>
        <p class="mb-4">Isi catatan Anda berdasarkan renungan yang telah Anda baca.</p>
        <form action="{{ route('user.catatan.create') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="prinsip" class="form-label">Prinsip</label> <br>
                <textarea class="form-control text-black" id="prinsip" name="prinsip" required rows="10" cols="50" style="resize: none;"></textarea>
            </div>

            <div class="mb-3">
                <label for="penerapan" class="form-label">Pilih Penerapan</label>
                <select class="form-control text-black" id="penerapan" name="penerapan" required>
                    <option value="">-- Pilih Penerapan --</option>
                    <option value="{{ $renungan->penerapan1 }}">{{ $renungan->penerapan1 }}</option>
                    <option value="{{ $renungan->penerapan2 }}">{{ $renungan->penerapan2 }}</option>
                    <option value="{{ $renungan->penerapan3 }}">{{ $renungan->penerapan3 }}</option>
                </select>
            </div>

            <input type="hidden" name="renungan_id" value="{{ $renungan->id }}">

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
        <div class="mt-6">
            <a href="{{ route('user.catatan.index') }}" class="btn btn-secondary">Kembali ke Daftar Catatan</a>
        </div>
    </article>
</body>
@endsection