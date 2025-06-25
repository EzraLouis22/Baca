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
</style>
<div class="min-h-screen flex flex-col items-center justify-center">
    <div class="profil-container">
        <div class="profil-header">
            <h2>Profil Saya</h2>
        </div>
        <div class="profil-info">
            <img src="{{ asset('storage/pp/' . Auth::user()->image) }}" alt="Foto Profil" class="foto-profil">
            <h2>Nama</h2>
            <p>{{ Auth::user()->name }}</p>
            <h2>Email</h2>
            <p>{{ Auth::user()->email }}</p>
            <h2>Role</h2>
            <p>{{ Auth::user()->role }}</p>
        </div>
    </div>
</div>
@endsection