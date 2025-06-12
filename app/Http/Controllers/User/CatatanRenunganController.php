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
    public function create(Request $request)
    {
        $renungan = Renungan::find($request->renungan_id);
        if (!$renungan) {
            return redirect()->back()->withErrors(['Renungan tidak ditemukan']);
        }

        $validatedData = $request->validate([
            'prinsip' => 'required|string',
            'penerapan1' => 'required|string',
            'penerapan2' => 'nullable|string',
            'penerapan3' => 'nullable|string',
            'label' => 'required|string',
        ]);

        $catatanRenungan = new CatatanRenungan();
        $catatanRenungan->renungan_id = $renungan->id;
        $catatanRenungan->prinsip = $validatedData['prinsip'];
        $catatanRenungan->penerapan = $validatedData['penerapan'];
        $catatanRenungan->label = $validatedData['label'];

        try {
            $catatanRenungan->save();
            return redirect()->route('user.catatan.index')->with('success', 'Catatan Renungan berhasil dibuat');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['Gagal menyimpan data: ' . $e->getMessage()]);
        }
    }

}
