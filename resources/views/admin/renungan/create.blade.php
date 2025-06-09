@extends('base')

@section('title', 'Renungan')

@section('header_title', 'Renungan')

@section('content')
<div class="col-12">
    <div class="card-body table-responsive p-0">
        <div class="section-body">
            <div class="card">
                <form action="{{ route('renungan.store') }}" method="POST">
                    @csrf
                    <div class="card-header">
                        <h4>Create Renungan</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Judul</label>
                            <input type="text"
                                class="form-control @error('judul')
                                is-invalid
                            @enderror"
                                id="judul" name="judul" value="">
                            @error('judul')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Date Created</label>
                            <input type="date"
                                class="form-control @error('date_renungan')
                                is-invalid
                            @enderror"
                                id="date_renungan" name="date_renungan" value="">
                            @error('date_renungan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Bacaan</label>
                            <input type="text"
                                class="form-control @error('bacaan')
                                is-invalid
                            @enderror"
                                id="bacaan" name="bacaan" value="">
                            @error('bacaan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Ayat Bacaan</label>
                            <textarea class="form-control" name="ayat_bacaan" id="ayat_bacaan" value="" rows="3" placeholder="Enter ..."
                            cols="30" rows="10" style="resize: none; width:100%; height:100%"></textarea>
                            @error('ayat_bacaan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Ayat Kunci</label>
                            <input type="text"
                                class="form-control @error('ayat_kunci')
                                is-invalid
                            @enderror"
                                id="ayat_kunci" name="ayat_kunci" value="">
                            @error('ayat_kunci')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Isi Renungan</label>
                            <textarea class="form-control" name="isi_renungan" id="isi_renungan" value="" rows="3" placeholder="Enter ..."
                            cols="30" rows="10" style="resize: none; width:100%; height:100%"></textarea>
                            @error('isi_renungan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Refleksi</label>
                            <input type="text"
                                class="form-control @error('refleksi')
                                is-invalid
                            @enderror"
                                id="refleksi" name="refleksi" value="">
                            @error('refleksi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Pertanyaan</label>
                            <input type="text"
                                class="form-control @error('pertanyaan')
                                is-invalid
                            @enderror"
                                id="pertanyaan" name="pertanyaan" value="">
                            @error('pertanyaan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Penerapan 1</label>
                            <input type="text"
                                class="form-control @error('penerapan1')
                                is-invalid
                            @enderror"
                                id="penerapan1" name="penerapan1" value="">
                            @error('penerapan1')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Penerapan 2</label>
                            <input type="text"
                                class="form-control @error('penerapan2')
                                is-invalid
                            @enderror"
                                id="penerapan2" name="penerapan2" value="">
                            @error('penerapan2')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Penerapan 3</label>
                            <input type="text"
                                class="form-control @error('penerapan3')
                                is-invalid
                            @enderror"
                                id="penerapan3" name="penerapan3" value="">
                            @error('penerapan3')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Prinsip</label>
                            <input type="text"
                                class="form-control @error('prinsip')
                                is-invalid
                            @enderror"
                                id="prinsip" name="prinsip" value="">
                            @error('prinsip')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Doa</label>
                            <input type="text"
                                class="form-control @error('doa')
                                is-invalid
                            @enderror"
                                id="doa" name="doa" value="">
                            @error('doa')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
@endsection
