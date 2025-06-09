<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Renungan;

class RenunganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Renungan::insert([
            [
                'judul' => 'Ini adalah judul 1',
                'date_renungan' => '2024-10-03',
                'bacaan' => 'Ini adalah bacaan 1',
                'ayat_bacaan' => 'Ini adalah ayat bacaan 1',
                'ayat_kunci' => 'Keluaran 21:6',
                'isi_renungan' => 'Ini adalah isi renungan 1',
                'refleksi' => 'Ini adalah refleksi 1',
                'pertanyaan' => 'Ini adalah pertanyaan 1',
                'penerapan1' => 'Ini adalah penerapan 1',
                'penerapan2' => 'Ini adalah penerapan 2',
                'penerapan3' => 'Ini adalah penerapan 3',
                'prinsip' => 'Ini adalah prinsip 1',
                'doa' => 'Ini adalah doa 1',
            ],
            [
                'judul' => 'Ini adalah judul 2',
                'date_renungan' => '2024-10-04',
                'bacaan' => 'Ini adalah bacaan 2',
                'ayat_bacaan' => 'Ini adalah ayat bacaan 2',
                'ayat_kunci' => 'Keluaran 21:7',
                'isi_renungan' => 'Ini adalah isi renungan 2',
                'refleksi' => 'Ini adalah refleksi 2',
                'pertanyaan' => 'Ini adalah pertanyaan 2',
                'penerapan1' => 'Ini adalah penerapan 1',
                'penerapan2' => 'Ini adalah penerapan 2',
                'penerapan3' => 'Ini adalah penerapan 3',
                'prinsip' => 'Ini adalah prinsip 2',
                'doa' => 'Ini adalah doa 2',
            ],
            [
                'judul' => 'Ini adalah judul 3',
                'date_renungan' => '2024-10-05',
                'bacaan' => 'Ini adalah bacaan 3',
                'ayat_bacaan' => 'Ini adalah ayat bacaan 3',
                'ayat_kunci' => 'Keluaran 21:8',
                'isi_renungan' => 'Ini adalah isi renungan 3',
                'refleksi' => 'Ini adalah refleksi 3',
                'pertanyaan' => 'Ini adalah pertanyaan 3',
                'penerapan1' => 'Ini adalah penerapan 1',
                'penerapan2' => 'Ini adalah penerapan 2',
                'penerapan3' => 'Ini adalah penerapan 3',
                'prinsip' => 'Ini adalah prinsip 3',
                'doa' => 'Ini adalah doa 3',
            ]
        ]);
    }

}
