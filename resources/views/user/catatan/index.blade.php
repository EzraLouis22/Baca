@extends('layoutuser.app')

@section('content')
    <h1>Catatan Renungan</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Prinsip</th>
                <th>Penerapan</th>
                <th>Label</th>
            </tr>
        </thead>
        <tbody>
            @foreach($catatanRenungan as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->prinsip }}</td>
                    <td>{{ $item->penerapan }}</td>
                    <td>{{ $item->label }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection