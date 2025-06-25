<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CatatanRenungan;
use App\Models\Renungan;
use App\Http\Requests\StoreRenunganRequestUser;
use App\Http\Requests\UpdateCatatanRequestUser;

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

    // di CatatanRenunganController.php
    public function store(StoreRenunganRequestUser $request)
    {
        CatatanRenungan::create([
            'judul' => $request->input('judul'),
            'date_renungan' => $request->input('date_renungan'),
            'prinsip' => $request->input('prinsip'),
            'renungan_id' => $request->input('renungan_id'),
            'penerapan' => substr($request->input('penerapan'), 0, 255),
        ]);
    
        return redirect()->route('user.catatan.index')->with('success', 'Catatan Renungan baru berhasil dibuat');
    }

    public function edit(CatatanRenungan $catatanRenungan, Renungan $renungan)
    {
        return view('user.catatan.edit')->with('catatanRenungan', $catatanRenungan)->with('renungan', $renungan);
    }

    public function update(UpdateCatatanRequestUser $request, CatatanRenungan $catatanRenungan, Renungan $renungan)
    {
        $catatanRenungan->update([
            'judul' => $request->input('judul'),
            'date_renungan' => $request->input('date_renungan'),
            'prinsip' => $request->input('prinsip'),
            'renungan_id' => $request->input('renungan_id'),
            'penerapan' => substr($request->input('penerapan'), 0, 255),
        ]);
    
        return redirect()->route('user.catatan.index')->with('success', 'Catatan Renungan berhasil diperbarui');
    }

    public function destroy(CatatanRenungan $catatanRenungan)
    {
        $catatanRenungan->delete();
    
        return redirect()->route('user.catatan.index')->with('success', 'Catatan Renungan berhasil dihapus');
    }

}
