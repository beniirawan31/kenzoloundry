<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;
    protected $table = 'pelanggans';
    protected $fillable = [
        'nama',
        'email',
        'no_hp',
        'password',
        'alamat'
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
