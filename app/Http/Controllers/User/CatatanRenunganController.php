<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CatatanRenungan;
use App\Models\Renungan;
use App\Http\Requests\StoreRenunganRequestUser;

class CatatanRenunganController extends Controller
{
    public function index()
    {
        $catatanRenungan = CatatanRenungan::all();
        return view('user.catatan.index', compact('catatanRenungan'));
    }

    public function create(Request $request)
    {
        $renungan_id = $request->input('renungan_id');
        $renungan = Renungan::find($renungan_id);
        return view('user.catatan.create', compact('renungan'));
    }

    public function store(StoreRenunganRequestUser $request)
    {
        $penerapan = $request->input('penerapan');
        $value = '';

        switch ($penerapan) {
            case 'penerapan1':
                $value = $request->input('penerapan1');
                break;
            case 'penerapan2':
                $value = $request->input('penerapan2');
                break;
            case 'penerapan3':
                $value = $request->input('penerapan3');
                break;
        }

        CatatanRenungan::create([
            'prinsip' => $request->input('prinsip'),
            'renungan_id' => $request->input('renungan_id'),
            'penerapan' => $value,
        ]);

        return redirect()->route('user.catatan.index')->with('success', 'Catatan Renungan baru berhasil dibuat');
    }



}
