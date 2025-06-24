@extends('base')

@section('title', 'Users')

@section('header_title', 'Users')

@section('content')
<div class="col-12">
    <div class="card-body table-responsive p-0">
        <div class="table-responsive">
            <table id="users" name="users" class="table table-hover text-nowrap">
                @csrf
                <thead>
                    <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Profil Picture</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td><img alt="thumbnail" src="{{ asset('storage/'.$user->image) }}" width="100" height="100"></td>
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
