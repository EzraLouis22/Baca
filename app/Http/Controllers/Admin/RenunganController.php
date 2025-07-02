<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Renungan;
use App\Http\Requests\StoreRenunganRequest;
use App\Http\Requests\UpdateRenunganRequest;

class RenunganController extends Controller
{
    public function index(Request $request)
    {
        $renungan = DB::table('renungans')
            ->when($request->input('judul'), function ($query, $judul) {
                return $query->where('judul', 'like', '%' . $judul . '%');
            })
            ->select('id', 'judul', 'date_renungan', 'bacaan', 'ayat_bacaan', 'ayat_kunci', 'isi_renungan', 'refleksi', 'pertanyaan', 'penerapan1', 'penerapan2', 'penerapan3', 'prinsip', 'doa')
            ->orderBy('id', 'asc')
            ->paginate(10);
        return view('admin.renungan.index', compact('renungan'));
    }

    public function create()
    {
        return view('admin.renungan.create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRenunganRequest $request)
    {
        Renungan::create([
            'judul' => $request['judul'],
            'date_renungan' => $request['date_renungan'],
            'bacaan' => $request['bacaan'],
            'ayat_bacaan' => $request['ayat_bacaan'],
            'ayat_kunci' => $request['ayat_kunci'],
            'isi_renungan' => $request['isi_renungan'],
            'refleksi' => $request['refleksi'],
            'pertanyaan' => $request['pertanyaan'],
            'penerapan1' => $request['penerapan1'],
            'penerapan2' => $request['penerapan2'],
            'penerapan3' => $request['penerapan3'],
            'prinsip' => $request['prinsip'],
            'doa' => $request['doa'],
        ]);

        // Redirect ke halaman index renungan dengan pesan sukses
        return redirect()->route('renungan.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function edit(Renungan $renungan)
    {
        //
        return view('admin.renungan.edit')->with('renungans', $renungan);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRenunganRequest $request, Renungan $renungan)
    {
        $validate = $request->validated();
        $renungan->update($validate);
        return redirect()->route('renungan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Renungan $renungan)
    {
        $renungan->delete();
        return redirect()->route('renungan.index');
    }
}
