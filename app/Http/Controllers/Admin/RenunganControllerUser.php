<?php

namespace App\Http\Controllers\Admin;

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
        $renungan = Renungan::orderBy('id', 'desc')->get();
        return view('user.home.renungan', compact('renungan'));
    }

}