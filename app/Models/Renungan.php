<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Renungan extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'renungans';

    protected $fillable = [
        'judul',
        'date_renungan',
        'bacaan',
        'ayat_bacaan',
        'ayat_kunci',
        'isi_renungan',
        'refleksi',
        'pertanyaan',
        'penerapan1',
        'penerapan2',
        'penerapan3',
        'prinsip',
        'doa'
    ];
}
