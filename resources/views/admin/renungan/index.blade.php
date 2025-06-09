@extends('base')

@section('title', 'Renungan')

@section('header_title', 'Renungan')

@section('content')
<div class="col-12">
    <div class="card-body table-responsive p-0">
        <div class="mb-3">
            <button'><a href="{{ route('renungan.create') }}" class="btn btn-primary">Tambah Data</a></button>
        </div>
        <div class="table-responsive">
            <table id="users" name="users" class="table table-hover text-nowrap">
                @csrf
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Date Created</th>
                        <th>Judul</th>
                        <th>Bacaan</th>
                        <th>Prinsip</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($renungan as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->date_renungan }}</td>
                        <td>{{ $item->judul }}</td>
                        <td>{{ $item->bacaan }}</td>
                        <td>{{ $item->prinsip }}</td>
                        <td>
                            <div class="d-flex justify-content-center">
                                <a href='{{ route('renungan.edit', $item->id) }}'
                                    class="btn btn-sm btn-info btn-icon">
                                    <i class="fas fa-edit"></i>
                                    Edit
                                </a>

                                <form action="{{ route('renungan.destroy', $item->id) }}" method="POST"
                                    class="ml-2">
                                    <input type="hidden" name="_method" value="DELETE" />
                                    <input type="hidden" name="_token"
                                        value="{{ csrf_token() }}" />
                                    <button class="btn btn-sm btn-danger btn-icon confirm-delete">
                                        <i class="fas fa-times"></i> Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('js')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
@endsection
