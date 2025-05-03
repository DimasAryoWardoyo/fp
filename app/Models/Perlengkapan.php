<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perlengkapan extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_barang',
        'jumlah_barang',
        'keterangan',
        'foto_barang',
    ];
}
