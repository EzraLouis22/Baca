@extends('layoutuser.app')

@section('content')
    <form action="{{ route('user.catatan.create') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="prinsip" class="form-label">Prinsip</label>
            <input type="text" class="form-control" id="prinsip" name="prinsip" required>
        </div>

        <div class="mb-3">
            <label for="penerapan" class="form-label">Pilih Penerapan</label>
            <select class="form-control" id="penerapan" name="penerapan" required>
                <option value="">-- Pilih Penerapan --</option>
                <option value="{{ $renungan->penerapan1 }}">{{ $renungan->penerapan1 }}</option>
                <option value="{{ $renungan->penerapan2 }}">{{ $renungan->penerapan2 }}</option>
                <option value="{{ $renungan->penerapan3 }}">{{ $renungan->penerapan3 }}</option>
            </select>
        </div>

        <input type="hidden" name="renungan_id" value="{{ $renungan->id }}">

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection