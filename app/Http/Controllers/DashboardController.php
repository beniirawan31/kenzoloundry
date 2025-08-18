<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Order;
use App\Models\Pelanggan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{

    // ini untuk dashboard admin

    public function index()
    {
        // Total layanan
        $totalLayanan = Layanan::count();

        // Total order
        $totalOrder = Order::count();

        // Menunggu pembayaran (status_pembayaran = 'Menunggu')
        $menungguOrder = Order::where('status_order', 'Menunggu')->count();

        // Order selesai (status_order = 'Selesai' atau pembayaran = 'Lunas')
        $orderSelesai = Order::where('status_pembayaran', 'Lunas')->count();

        // Ambil semua layanan untuk card daftar layanan
        $layanans = Layanan::all();

        return view('Admin.Admin.index', compact(
            'totalLayanan',
            'totalOrder',
            'menungguOrder',
            'orderSelesai',
            'layanans'
        ));
    }

    public function layanan()
    {
        $layanans = Layanan::latest()->get();
        return view('Admin.Admin.layanan', compact('layanans'));
    }

    public function layananCreate()
    {
        return view('Admin.Admin.layanan_create');
    }

    public function layananStore(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'harga' => 'required',
            'satuan' => 'nullable|string|max:100',
            'keterangan' => 'nullable|string',
            'foto_layanan' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $fotoPath = null;
        if ($request->hasFile('foto_layanan')) {
            $fotoPath = $request->file('foto_layanan')->store('foto_layanan', 'public');
        }

        Layanan::create([
            'nama' => $request->nama,
            'harga' => $request->harga,
            'satuan' => $request->satuan,
            'keterangan' => $request->keterangan,
            'foto_layanan' => $fotoPath,
        ]);

        return redirect()->route('layanan')->with('success', 'Layanan berhasil ditambahkan');
    }

    public function layananEdit($id)
    {
        $layanan = Layanan::findOrFail($id);
        return view('Admin.Admin.layanan_edit', compact('layanan'));
    }

    public function layananUpdate(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'harga' => 'required|integer',
            'satuan' => 'nullable|string|max:100',
            'keterangan' => 'nullable|string',
            'foto_layanan' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $layanan = Layanan::findOrFail($id);

        if ($request->hasFile('foto_layanan')) {
            // hapus foto lama
            if ($layanan->foto_layanan && Storage::exists('public/' . $layanan->foto_layanan)) {
                Storage::delete('public/' . $layanan->foto_layanan);
            }

            $fotoPath = $request->file('foto_layanan')->store('foto_layanan', 'public');
            $layanan->foto_layanan = $fotoPath;
        }

        $layanan->nama = $request->nama;
        $layanan->harga = $request->harga;
        $layanan->satuan = $request->satuan;
        $layanan->keterangan = $request->keterangan;
        $layanan->save();

        return redirect()->route('layanan')->with('success', 'Layanan berhasil diperbarui');
    }

    public function destroy($id)
    {
        $layanan = Layanan::findOrFail($id);

        if ($layanan->foto_layanan && Storage::exists('public/' . $layanan->foto_layanan)) {
            Storage::delete('public/' . $layanan->foto_layanan);
        }

        $layanan->delete();

        return redirect()->route('layanan')->with('success', 'Layanan berhasil dihapus.');
    }



    public function laporan()
    {
        return view('Admin.Admin.laporan');
    }

    public function pembayaran()
    {
        return view('Admin.Admin.pembayaran');
    }


    // Tampilkan daftar user & pelanggan
    public function pelanggan()
    {
        $users = User::latest()->get();          // Semua user terbaru
        $pelanggans = Pelanggan::latest()->get(); // Semua pelanggan terbaru

        return view('Admin.Admin.pelanggan', compact('users', 'pelanggans'));
    }

    // Hapus user (non-admin)
    public function hapusUser($id)
    {
        $user = User::findOrFail($id);

        if ($user->role === 'admin') {
            return back()->with('error', 'User dengan role admin tidak dapat dihapus.');
        }

        $user->delete();

        return back()->with('success', 'User berhasil dihapus.');
    }

    // Hapus pelanggan
    public function hapusPelanggan($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->delete();

        return back()->with('success', 'Pelanggan berhasil dihapus.');
    }






    // kurir
    public function kurir()
    {
        return view('Admin.Admin.kurir');
    }
}
