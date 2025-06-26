@extends('layoutuser.app')

@section('content')
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Prinsip & Penerapan</title>
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background: linear-gradient(to bottom, #f9fbff, #d1e3f8);
    }

    .grid {
      display: grid;
      padding: 20px;
      grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
      grid-gap: 20px;
    }

    .card {
      background-color: #e6effa;
      border: 2px solid #000;
      border-radius: 20px;
      padding: 20px;
      color: #3b3750;
    }

    .card h3 {
      margin-top: 0;
      margin-bottom: 10px;
      font-size: 1.1rem;
      color: #2b2b4f;
    }

    .card p {
      margin: 0;
      word-wrap: break-word;
      background: #f0f0f0;
      padding: 12px;
      border-radius: 10px;
      border: 1px solid #ccc;
      font-weight: normal;
    }
  </style>
</head>
<body>
  <div class="grid">
    @foreach ($catatanRenungan as $item)
    <div class="card">
        <h2><strong>Judul Renungan</strong></h2>
        <p>{{ $item->judul }}</p> <br>
        <h2><strong>Tanggal Renungan</strong></h2>
        <p>{{ $item->date_renungan }}</p> <br>
        <h2><strong>Tanggal Buat</strong></h2>
        <p>{{ $item->created_at->format('d-m-Y') }}</p> <br>
        <h2><strong>Prinsip</strong></h2>
        <p>"{{ $item->prinsip }}"</p> <br>
        <h2><strong>Penerapan</strong></h2>
        <p>{{ $item->penerapan }}</p>
        <br>
        <div class="justify-center">
          <div class="flex justify-between">
            <button class="mr-2">
              <a href="{{ route('user.catatan.edit', $item->id) }}">Edit</a>
            </button>
            <form action="{{ route('user.catatan.destroy', $item->id) }}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" class="ml-2">Hapus</button>
            </form>
          </div>
        </div>    
    </div>
    @endforeach
  </div>
  <style>
    button {
      background-color: #4CAF50; /* warna hijau */
      color: #fff; /* warna putih */
      border: none; /* tidak ada border */
      padding: 10px 20px; /* jarak antara teks dan border */
      font-size: 16px; /* ukuran font */
      cursor: pointer; /* cursor berubah menjadi tangan saat diarahkan */
    }

    button:hover {
      background-color: #3e8e41; /* warna hijau tua saat dihover */
    }

    button a {
      text-decoration: none; /* tidak ada garis bawah pada teks */
      color: #fff; /* warna putih */
    }
    .flex {
      display: flex;
    }

    .justify-between {
      justify-content: space-between;
    }

    .mr-2 {
      margin-right: 2px;
    }

    .ml-2 {
      margin-left: 2px;
    }
  </style>
</body>
</html>
@endsection