<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    // ini untuk dashboard admin

    public function index()
    {
        return view('Admin.Admin.index');
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
            'harga' => 'required|integer',
            'satuan' => 'nullable|string|max:100',
            'keterangan' => 'nullable|string',
        ]);

        Layanan::create($request->all());
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
        ]);

        $layanan = Layanan::findOrFail($id);
        $layanan->update($request->all());

        return redirect()->route('layanan')->with('success', 'Layanan berhasil diperbarui');
    }

    public function destroy($id)
    {
        $layanan = Layanan::findOrFail($id);
        $layanan->delete();

        return redirect()->route('layanan.index')->with('success', 'Layanan berhasil dihapus.');
    }


    //order



    public function order()
    {
        return view('Admin.Admin.order');
    }

    public function laporan()
    {
        return view('Admin.Admin.laporan');
    }

    public function pembayaran()
    {
        return view('Admin.Admin.pembayaran');
    }


// pelanggan
    public function pelanggan()
    {
        $users = User::latest()->get();
        return view('Admin.Admin.pelanggan', compact('users'));
    }

    public function hapusPelanggan($id)
    {
        $user = User::findOrFail($id);

        if ($user->role === 'admin') {
            return back()->with('error', 'User dengan role admin tidak dapat dihapus.');
        }

        $user->delete();

        return back()->with('success', 'User berhasil dihapus.');
    }


    

    // kurir
    public function kurir()
    {
        return view('Admin.Admin.kurir');
    }


    
}
