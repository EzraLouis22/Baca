<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;

class CatatanRenungan extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'catatan_renungan';

    protected $fillable = [
        'judul',
        'date_renungan',
        'prinsip',
        'penerapan',
        'renungan_id',
    ];

    public function renungan()
    {
        return $this->belongsTo(Renungan::class, 'renungan_id');
    }
}
