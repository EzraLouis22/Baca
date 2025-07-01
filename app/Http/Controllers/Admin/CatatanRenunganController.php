<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CatatanRenungan;
use App\Models\Renungan;
use App\Http\Requests\StoreRenunganRequestUser;
use App\Http\Requests\UpdateCatatanRequestUser;
use RealRashid\SweetAlert\Facades\Alert;

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
        // Your code here to store the catatanRenungan
        $request->validate([
            'judul' => 'required|string|max:255',
            'date_renungan' => 'required|date',
            'renungan_id' => 'required',
            'prinsip' => 'required|string|max:255',
            'penerapan' => 'required|string|max:255',
        ]);

        CatatanRenungan::create([
            'judul' => $request->input('judul'),
            'date_renungan' => $request->input('date_renungan'),
            'prinsip' => $request->input('prinsip'),
            'renungan_id' => $request->input('renungan_id'),
            'penerapan' => substr($request->input('penerapan'), 0, 255),
        ]);
        return redirect()->route('user.catatan.index');
    }

    public function edit(CatatanRenungan $catatanRenungan)
    {
        // Your code here
        $renungan = Renungan::find($catatanRenungan->renungan_id);
        return view('user.catatan.edit', compact('catatanRenungan'));
    }

    public function update(UpdateCatatanRequestUser $request, CatatanRenungan $catatanRenungan)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'date_renungan' => 'required|date',
            'renungan_id' => 'required',
            'prinsip' => 'required|string|max:255',
            'penerapan' => 'required|string|max:255',
        ]);

        $catatanRenungan->update([
            'judul' => $request->input('judul'),
            'date_renungan' => $request->input('date_renungan'),
            'renungan_id' => $request->input('renungan_id'),
            'prinsip' => $request->input('prinsip'),
            'penerapan' => substr($request->input('penerapan'), 0, 255),
        ]);
        Alert::success('Berhasil', 'Catatan Renungan berhasil diubah');
        return redirect()->route('user.catatan.index');
    }

    public function destroy(CatatanRenungan $catatanRenungan)
    {
        // Your code here to delete the catatanRenungan
        $catatanRenungan->delete();
        return redirect()->route('user.catatan.index')->with('success', 'Catatan Renungan berhasil dihapus');
    }

}
