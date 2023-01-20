<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lelang extends Model
{
    use HasFactory;
    protected $table = 'lelangs';
    protected $fillable = [
        'barang_id',
        'masyarakat_id',
        'petugas_id',
        'harga_akhir',
        'tanggal_lelang',
        'status'
    ];
}
