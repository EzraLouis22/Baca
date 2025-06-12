<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Renungan;
use Illuminate\Http\Request;

class RenunganControllerUser extends Controller
{
    public function beranda()
    {
        $renungans = Renungan::orderBy('id', 'desc')->limit(1)->get();
        return view('user.home.beranda', compact('renungans'));
    }

    public function index()
    {
        $catatanRenungan = Renungan::orderBy('id', 'desc')->paginate(10);
        return view('user.catatan.index', compact('catatanRenungan'));
    }
}