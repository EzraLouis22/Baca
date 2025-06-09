<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CatatanRenungan;
use App\Models\Renungan;

class CatatanRenunganController extends Controller
{
    public function index()
    {
        $catatanRenungan = CatatanRenungan::all();
        return view('user.catatan.index', compact('catatanRenungan'));
    }
    public function store(Request $request)
    {
        $renungan = Renungan::find($request->renungan_id);
        $catatanRenungan = new CatatanRenungan();
        $catatanRenungan->prinsip = $renungan->prinsip;
        $catatanRenungan->penerapan = implode(', ', [$renungan->penerapan1, $renungan->penerapan2, $renungan->penerapan3]);
        $catatanRenungan->label = $renungan->judul;
        $catatanRenungan->renungan_id = $renungan->id;
        $catatanRenungan->save();
        return response()->json(['message' => 'Data berhasil disimpan']);
    }

}
