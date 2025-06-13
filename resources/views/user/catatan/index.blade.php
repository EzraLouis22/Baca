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
      padding: 20px;
      font-family: Arial, sans-serif;
      background: linear-gradient(to bottom, #f9fbff, #d1e3f8);
    }

    .grid {
      display: grid;
      padding: 20px;
      grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
      gap: 20px;
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
        <h2><strong>Tanggal Buat</strong></h2>
        <p>{{ $item->created_at->format('d-m-Y') }}</p> <br>
        <h2><strong>Prinsip</strong></h2>
        <p>"{{ $item->prinsip }}"</p> <br>
        <h2><strong>Penerapan</strong></h2>
        <p>{{ $item->penerapan }}</p>
    </div>
    @endforeach
  </div>
</body>
</html>
@endsection