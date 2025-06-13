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
      grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
      gap: 20px;
    }

    .card {
      background-color: #e6effa;
      border: 3px solid #000;
      border-radius: 30px 30px 60px 30px;
      padding: 16px;
      min-height: 120px;
      font-weight: bold;
      color: #3b3750;
      display: flex;
      align-items: flex-start;
    }
  </style>
</head>
<body>
  @foreach ($catatanRenungan as $item)
  <div class="grid">
    <div class="renungan-container grid grid-cols-3 flex-wrap justify-start gap-6 p-4">
      <div class="card">
        <p>{{ $item->prinsip }}</p>
        <p>{{ $item->penerapan }}</p>
        <a href="{{ route('renungan.show', $item->id) }}">Baca lebih lanjut</a>
      </div>
    </div>
  </div>
  @endforeach
</body>
</html>

@endsection