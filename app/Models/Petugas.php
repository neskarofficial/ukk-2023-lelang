<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    use HasFactory;
    protected $table = 'petugas';
    protected $fillable = [
        'name',
        'username',
        'levels_id'
    ];

    protected $hidden = [
        'password',
        'remember_token'
    ];
}
