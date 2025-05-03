<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'kegiatan',
        'tanggal',
        'deskripsi',
        'jumlah',
        'bukti',
    ];
}
