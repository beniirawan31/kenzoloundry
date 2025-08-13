<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Order;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with(['pelanggan', 'layanan'])->orderBy('id', 'desc') // dari yang terbaru ke yang paling lama
            ->get();

        $pelanggans = Pelanggan::all();
        $layanans = Layanan::all();
        return view('admin.order.index', compact('orders', 'pelanggans', 'layanans'));
    }


    public function create()
    {
        $pelanggans = Pelanggan::select('id', 'nama')->get();
        $layanans = Layanan::select('id', 'nama', 'harga')->get();

        return view('admin.order.create', compact('pelanggans', 'layanans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'               => 'required|string|max:100',
            'alamat'             => 'required|string|max:255',
            'nomor_hp'           => 'required|string|max:15',
            // 'pelanggan_id'       => 'required|exists:pelanggans,id',
            'layanan_id'         => 'required|exists:layanans,id',
            'jumlah_item'        => 'required|integer|min:1',
            'pesan'              => 'nullable|string|max:255',
            'metode_pembayaran'  => 'required|in:Cash,Transfer,E-Wallet',
            'tanggal_order'      => 'required|date',
            'tanggal_selesai'    => 'required|date|after_or_equal:tanggal_order',
            'bukti_pembayaran'   => 'nullable|image|mimes:jpg,jpeg,png',
        ], [
            'metode_pembayaran.in' => 'Metode pembayaran tidak valid. Pilih Cash, Transfer, atau E-Wallet.',
            'tanggal_selesai.after_or_equal' => 'Tanggal selesai harus sama atau setelah tanggal order.',
        ]);

        $layanan = Layanan::findOrFail($request->layanan_id);
        $total_harga = $layanan->harga * $request->jumlah_item;

        // Proses upload bukti pembayaran (jika ada)
        $buktiPath = null;
        if ($request->hasFile('bukti_pembayaran')) {
            $buktiPath = $request->file('bukti_pembayaran')->store('bukti_pembayaran', 'public');
        }

        Order::create([
            'nama'               => $request->nama,
            'alamat'             => $request->alamat,
            'nomor_hp'           => $request->nomor_hp,
            // 'pelanggan_id'       => $request->pelanggan_id,
            'layanan_id'         => $request->layanan_id,
            'jumlah_item'        => $request->jumlah_item,
            'total_harga'        => $total_harga,
            'pesan'              => $request->pesan,
            'status_order'       => 'Menunggu',
            'tanggal_order'      => $request->tanggal_order,
            'tanggal_selesai'    => $request->tanggal_selesai,
            'metode_pembayaran'  => $request->metode_pembayaran,
            'status_pembayaran'  => 'Belum Bayar',
            'bukti_pembayaran'   => $buktiPath,
            'admin_input'        => auth()->id()
        ]);

        return redirect()->route('order')->with('success', 'Order berhasil ditambahkan.');
    }


    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        return redirect()->back()->with('success', 'Order berhasil dihapus.');
    }

    public function updateStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->status_order = $request->status_order; // disesuaikan dengan field migrasi
        $order->save();

        return response()->json(['message' => 'Status berhasil diperbarui.']);
    }

    public function getOrder($id)
    {
        $order = Order::with(['pelanggan', 'layanan'])->findOrFail($id);
        return response()->json($order);
    }
}
