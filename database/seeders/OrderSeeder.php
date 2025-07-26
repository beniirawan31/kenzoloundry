<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        $orders = [
            [
                'nama' => 'Ahmad Rizki',
                'layanan' => 'Cuci + Setrika',
                'harga' => 25000,
                'total_harga' => 25000,
                'pesan' => 'Tolong jangan gunakan pewangi karena alergi.',
                'status' => 'Selesai',
            ],
            [
                'nama' => 'Siti Nurhaliza',
                'layanan' => 'Dry Cleaning',
                'harga' => 20000,
                'total_harga' => 20000,
                'pesan' => 'Ambil jam 5 sore, jangan terlambat ya!',
                'status' => 'Diproses',
            ],
            [
                'nama' => 'Bayu Saputra',
                'layanan' => 'Cuci',
                'harga' => 10000,
                'total_harga' => 10000,
                'pesan' => 'Pisahkan pakaian warna gelap dan terang.',
                'status' => 'Menunggu',
            ],
            [
                'nama' => 'Dewi Lestari',
                'layanan' => 'Setrika',
                'harga' => 8000,
                'total_harga' => 8000,
                'pesan' => 'Baju sekolah harus rapi ya, terima kasih.',
                'status' => 'Selesai',
            ],
            [
                'nama' => 'Rama Dwi',
                'layanan' => 'Paket Premium',
                'harga' => 30000,
                'total_harga' => 30000,
                'pesan' => 'Gunakan hanger untuk jas dan kemeja.',
                'status' => 'Dalam Pengiriman',
            ],
        ];

        foreach ($orders as $order) {
            Order::create($order);
        }
    }
}
