@extends('layoutuser.app')

@section('content')
<style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background-image: url('{{ asset('bg/bg-header.png') }}');
      background-color: rgba(34, 43, 70, 1);
      background-position: top;
      background-size: 101% 50%;
      background-repeat: no-repeat;
    }
</style>
<body>
    <article class="max-w-3xl mx-auto px-4 py-8 bg-white rounded shadow-md text-white" style="background: linear-gradient(to bottom, #827271 0%, #46445C 50%,  #827271 100%);">
        <h1 class="text-2xl font-bold mb-4">Edit Catatan Renungan</h1>
        <p class="mb-4">Ubahlah catatan Anda berdasarkan prinsip dan penerapan yang telah Anda catat.</p>
        <form action="{{ route('user.catatan.update', $catatanRenungan, $catatanRenungan->renungan) }}" method="POST" class="bg-gray-600 p-4 rounded shadow-md">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="judul" class="form-label text-gray">Judul Renungan</label>
                <input type="text" class="form-control text-black border border-gray-300 rounded-lg p-2" id="judul" name="judul" value="{{ $catatanRenungan->judul }}" required readonly>
            </div>
            <div class="mb-3">
                <label for="date_renungan" class="form-label text-gray">Tanggal Renungan</label>
                <input type="date" class="form-control text-black border border-gray-300 rounded-lg p-2" id="date_renungan" name="date_renungan" value="{{ $catatanRenungan->date_renungan }}" required readonly>
            </div>
            <div class="mb-3">
                <label for="prinsip" class="form-label text-gray">Prinsip</label>
                <textarea class="form-control text-black border border-gray-300 rounded-lg p-2" id="prinsip" name="prinsip" required rows="10" cols="50">{{ $catatanRenungan->prinsip }}</textarea>
            </div>
            <div class="mb-3">
                <label for="penerapan" class="form-label text-gray">Pilih Penerapan</label>
                <select class="form-control text-black border-gray-300 rounded-lg p-2" id="penerapan" name="penerapan" required>
                    <option value="">-- Pilih Penerapan --</option>
                    <option value="{{ $catatanRenungan->renungan->penerapan1 }}">{{ $catatanRenungan->renungan->penerapan1 }}</option>
                    <option value="{{ $catatanRenungan->renungan->penerapan2 }}">{{ $catatanRenungan->renungan->penerapan2 }}</option>
                    <option value="{{ $catatanRenungan->renungan->penerapan3 }}">{{ $catatanRenungan->renungan->penerapan3 }}</option>
                </select>
            </div>
            <input type="hidden" name="renungan_id" value="{{ $catatanRenungan->renungan_id }}">
            <button type="submit" class="btn btn-primary rounded-lg p-2 text-white">Simpan Perubahan</button>
        </form>
        <div class="mt-6">
            <a href="{{ route('user.catatan.index') }}" class="btn btn-secondary">Kembali ke Daftar Catatan</a>
        </div>
    </article>
</body>
    <style>
        .btn {
            display: inline-block;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            color: #fff;
            background-color: rgba(34, 43, 70, 1);
            transition: background-color 0.3s ease;
        }
        .btn:hover {
            background-color: #45a049;
        }
        .btn-secondary {
            background-color: rgba(34, 43, 70, 1);
        }
        .btn-secondary:hover {
            background-color: #0056b3;
        }
        .form-control {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        .form-label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .form-select {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        .form-textarea {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            resize: vertical;
        }
    </style>
@endsection