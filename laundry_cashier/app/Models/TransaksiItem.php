<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiItem extends Model
{
    protected $fillable = [
        'transaksi_id',
        'nama_item',
        'harga',
        'qty',
        'subtotal'
    ];

public function transaksi()
{
    return $this->belongsTo(Transaksi::class);
}


}

