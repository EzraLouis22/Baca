<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CatatanRenungan;
use App\Models\Renungan;

class CatatanRenunganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $renungan = Renungan::factory()->create();
        $catatanRenungan = CatatanRenungan::create([
            'prinsip' => 'Prinsip',
            'penerapan' => 'Penerapan',
            'label' => $renungan->judul,
            'renungan_id' => $renungan->id
        ]);
    }
}
