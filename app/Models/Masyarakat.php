<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Masyarakat extends Model
{
    use HasFactory;
    protected $table = 'masyarakats';
    protected $fillable = [
        'nama',
        'username',
        'telp'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
