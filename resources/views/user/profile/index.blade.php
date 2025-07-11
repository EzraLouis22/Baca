@extends('layoutuser.app')

@section('title', 'Profile')

@section('header_title', 'Profile')

@section('content')
<style>
    body {
        height: 100vh;
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
    }

    @media only screen and (max-width: 768px) {
        /* Gaya untuk layar handphone */
        .profil-container {
            width: 300px;
            margin: 40px auto;
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .profil-header {
            text-align: center;
            margin-bottom: 20px;
            background-color: #333;
            color: #fff;
            padding: 10px;
            border-radius: 10px 10px 0 0;
        }

        .foto-profil {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            margin: 0 auto;
            border: 3px solid #333;
        }

        .profil-info {
            margin-top: 20px;
        }

        .profil-info h2 {
            font-weight: bold;
            margin-bottom: 5px;
            color: #333;
        }

        .profil-info p {
            margin-bottom: 10px;
            color: #666;
        }

        .logout-button {
            background-color: #dc3545;
            color: #ffffff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .logout-button:hover {
            background-color: #c82333;
        }
    }

    @media only screen and (min-width: 769px) {
        /* Gaya untuk layar laptop */
        .profil-container {
            width: 500px; /* Lebar container yang lebih besar */
            margin: 60px auto; /* Margin yang lebih besar untuk memberikan ruang yang lebih luas */
            background-color: #fff;
            padding: 30px; /* Padding yang lebih besar untuk memberikan ruang yang lebih luas */
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .profil-header {
            text-align: center;
            margin-bottom: 30px; /* Margin yang lebih besar untuk memberikan ruang yang lebih luas */
            background-color: #333;
            color: #fff;
            padding: 15px; /* Padding yang lebih besar untuk memberikan ruang yang lebih luas */
            border-radius: 10px 10px 0 0;
        }

        .foto-profil {
            width: 180px; /* Lebar foto profil yang lebih besar */
            height: 180px; /* Tinggi foto profil yang lebih besar */
            border-radius: 50%;
            margin: 0 auto;
            border: 3px solid #333;
        }

        .profil-info {
            margin-top: 30px; /* Margin yang lebih besar untuk memberikan ruang yang lebih luas */
        }

        .profil-info h2 {
            font-weight: bold;
            margin-bottom: 10px; /* Margin yang lebih besar untuk memberikan ruang yang lebih luas */
            color: #333;
        }

        .profil-info p {
            margin-bottom: 15px; /* Margin yang lebih besar untuk memberikan ruang yang lebih luas */
            color: #666;
        }

        .logout-button {
            background-color: #dc3545;
            color: #ffffff;
            padding: 15px 30px; /* Padding yang lebih besar untuk memberikan ruang yang lebih luas */
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .logout-button:hover {
            background-color: #c82333;
        }
    }
</style>
<div class="min-h-screen flex flex-col items-center justify-center">
    <div class="profil-container">
        <div class="profil-header">
            <h2>Profil Saya</h2>
        </div>
        <div class="profil-info">
            <img src="{{ asset(''. Auth::user()->image) }}" class="foto-profil" alt="foto-profil">
            <h2>Nama</h2>
            <p>{{ Auth::user()->name }}</p>
            <h2>Email</h2>
            <p>{{ Auth::user()->email }}</p>
            <h2>Role</h2>
            <p>{{ Auth::user()->role }}</p>
            <br>
            <a href="{{ route('user.logout') }}" onclick="return confirmLogout()" class="logout-button btn btn-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
        </div>
    </div>
</div>
<script>
async function confirmLogout() {
    const result = await Swal.fire({
        title: 'Konfirmasi',
        text: 'Apakah Anda yakin ingin logout?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Logout',
        cancelButtonText: 'Batal'
    });

    if (result.isConfirmed) {
        // Tampilkan popup success setelah popup konfirmasi tertutup
        await Swal.fire({
            title: 'Berhasil!',
            text: 'Anda berhasil logout.',
            icon: 'success',
            timer: 5000,
            showConfirmButton: false
        });

        // Redirect setelah popup sukses selesai
        window.location.href = "{{ route('user.logout') }}";
    }

    return false; // Mencegah link berjalan langsung
}
</script>
@endsection