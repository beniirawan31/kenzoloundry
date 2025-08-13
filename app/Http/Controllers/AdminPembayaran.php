<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Order;
use App\Models\Pelanggan;
use App\Models\Pembayaran;
use Illuminate\Http\Request;

class AdminPembayaran extends Controller
{
    public function index()
    {
        // Get all orders with their relationships (including payment if exists)
        $orders = Order::with(['pelanggan', 'layanan', 'pembayaran'])
            ->latest()
            ->paginate(10); // pagination 6

        // These might be needed for forms/select options
        $pelanggans = Pelanggan::select('id', 'nama')->get();
        $layanans = Layanan::select('id', 'nama', 'harga')->get();

        return view('admin.pembayaran.index', compact('orders', 'pelanggans', 'layanans'));
    }

    public function konfirmasi($id)
    {
        $order = Order::findOrFail($id);

        // Sesuai enum, gunakan 'Lunas' untuk pembayaran selesai
        $order->status_pembayaran = 'Lunas';
        $order->status_order = 'Selesai';
        $order->save();

        return redirect()->back()->with('success', 'Pembayaran berhasil dikonfirmasi.');
    }

    public function tolak($id)
    {
        $order = Order::findOrFail($id);

        // Bisa pilih 'Belum Bayar' atau 'Menunggu Konfirmasi'
        $order->status_pembayaran = 'Belum Bayar';
        $order->status_order = 'Gagal';
        $order->save();

        return redirect()->back()->with('error', 'Pembayaran ditolak.');
    }
}
