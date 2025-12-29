<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $fillable = [
        'tgl_terima',
        'tgl_ambil',
        'kode',
        'pelanggan',
        'status',
        'total'
    ];

public function items()
{
    return $this->hasMany(TransaksiItem::class);
}


}
