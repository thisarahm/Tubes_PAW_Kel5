<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $table = 'pelanggans';

    protected $fillable = [
        'kode',
        'nama',
        'no_telp',
        'email',
        'alamat',
    ];
}
