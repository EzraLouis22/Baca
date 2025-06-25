@extends('layoutuser.app')

@section('title', 'Profile')

@section('header_title', 'Profile')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-white via-[#5c6e95] to-[#443c4a] px-6 py-4 text-[#3f3653]">
    <h1 class="text-3xl font-bold mb-4">Profil</h1>

    <div class="bg-gradient-to-b from-[#5c6e95] to-[#443c4a] rounded-2xl p-6 text-center">
        <div class="flex flex-col items-center">
            <div class="w-24 h-24 rounded-full bg-white border-4 border-gray-300 flex items-center justify-center overflow-hidden">
                @if($user->image)
                    <img src="{{ asset('storage/' . $user->image) }}" alt="Profile Image" class="w-full h-full object-cover">
                @else
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zM4 20v-1c0-2.21 3.58-4 8-4s8 1.79 8 4v1H4z" />
                    </svg>
                @endif
            </div>

            <div class="text-white mt-2 text-lg font-semibold flex items-center">
                {{ $user->name }}
                <svg class="w-4 h-4 ml-2 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536M9 11l6-6m2 2L11 13l-4 1 1-4 6-6z" />
                </svg>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4 mt-6">
            @for ($i = 0; $i < 6; $i++)
                <div class="bg-gray-100 rounded-lg p-4 shadow-md relative">
                    <div class="absolute -top-3 left-1/2 transform -translate-x-1/2 flex gap-1">
                        <span class="w-3 h-3 bg-purple-200 rounded-full"></span>
                        <span class="w-4 h-4 bg-[#3f3653] rounded-full"></span>
                        <span class="w-3 h-3 bg-purple-200 rounded-full"></span>
                    </div>
                </div>
            @endfor
        </div>

        <div class="mt-6 flex flex-col items-start">
            <div class="flex items-center mb-2">
                <svg class="w-5 h-5 text-white mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M12 5l7 7-7 7" />
                </svg>
                <span class="text-white font-medium">Preview Catatanku</span>
            </div>

            <div class="w-full bg-[#3f3653] text-white px-4 py-3 rounded-xl">
                dosa hari ini
            </div>
        </div>

        <div class="mt-6 text-right">
            <a href="{{ route('logout') }}" class="text-white font-semibold flex items-center justify-end gap-1">
                Log Out
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a1 1 0 01-1 1H5a2 2 0 01-2-2V7a2 2 0 012-2h7a1 1 0 011 1v1" />
                </svg>
            </a>
        </div>
    </div>

    <div class="fixed bottom-0 left-0 w-full bg-[#6d6167] text-white flex justify-around items-center py-2 rounded-t-2xl">
        <a href="#" class="flex flex-col items-center">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/></svg>
            <span class="text-sm">Beranda</span>
        </a>
        <a href="#" class="flex flex-col items-center">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M3 7h18M3 12h18M3 17h18"/></svg>
            <span class="text-sm">Catatanku</span>
        </a>
        <a href="#" class="flex flex-col items-center">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M20 21V7a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v14"/></svg>
            <span class="text-sm">Seri Lain</span>
        </a>
        <a href="#" class="flex flex-col items-center text-[#bcb0c0]">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M5.121 17.804A13.937 13.937 0 0 1 12 15c2.5 0 4.847.676 6.879 1.804M15 11a3 3 0 1 0-6 0 3 3 0 0 0 6 0z"/></svg>
            <span class="text-sm">Profil</span>
        </a>
    </div>
</div>

@endsection