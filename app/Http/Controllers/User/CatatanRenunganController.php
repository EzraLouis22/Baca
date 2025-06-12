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

    public function create()
    {
        return view('user.catatan.create', compact('renungans'));
    }

    public function store(Request $request)
    {
        CatatanRenungan::create([
            'prinsip' => $request->input('prinsip'),
            'renungan_id' => $request->input('renungan_id'),
            'penerapan1' => $request->input('penerapan1'),
            'penerapan2' => $request->input('penerapan2'),
            'penerapan3' => $request->input('penerapan3'),
            'label' => $request->input('label'),
        ]);

        return redirect()->route('user.catatan.index')->with('success', 'Catatan Renungan baru berhasil dibuat');
    }

}
