<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $fillable = [
        'pelanggan_id',
        'layanan_id',
        'jumlah_item',
        'total_harga',
        'pesan',
        'status_order',
        'tanggal_order',
        'tanggal_selesai',
        'metode_pembayaran',
        'status_pembayaran',
        'bukti_pembayaran',
        'admin_input',
    ];

    // Relasi: Order milik satu pelanggan
    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class);
    }

    // Relasi: Order milik satu layanan
    public function layanan()
    {
        return $this->belongsTo(Layanan::class);
    }

    // Relasi: Admin yang input order (opsional)
    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_input');
    }
}
