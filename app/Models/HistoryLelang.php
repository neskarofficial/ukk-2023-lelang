<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryLelang extends Model
{
    use HasFactory;
    protected $table = 'history_lelangs';
    protected $fillable = [
        'lelang_id',
        'masyarakat_id',
        'petugas_id',
        'harga',
        'tanggal',
        'status'
    ];
}
