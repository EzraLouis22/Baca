<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Renungan;
use Tymon\JWTAuth\Facades\JWTAuth;

class RenunganController extends Controller
{
    public function __construct()
    {
        // Middleware JWT untuk semua method
        $this->middleware('jwt.verify');
    }

    public function index()
    {
        $renungans = Renungan::all();
        return response()->json($renungans);
    }

    public function show($id)
    {
        // Coba debugging untuk melihat apa yang terjadi
        $renungan = Renungan::where('id', $id)->first();

        if (!$renungan) {
            return response()->json(['message' => 'Renungan not found'], 404);
        }

        return response()->json($renungan);
    }


}
