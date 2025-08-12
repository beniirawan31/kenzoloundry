<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'status_pembayaran', // contoh: 'Belum Bayar', 'Sudah Bayar', 'Pending'
        'metode_pembayaran', // contoh: 'Transfer Bank', 'Tunai'
        'tanggal_bayar',
        'jumlah_bayar',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
