<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard User</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>Selamat datang, {{ Auth::user()->name }}!</p>

                    <a href="{{ route('user.renungan.index') }}" class="btn btn-primary">Lihat Renungan</a>
                </div>
            </div>
        </div>
    </div>
</div>