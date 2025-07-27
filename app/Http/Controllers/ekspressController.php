<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Order;
use Illuminate\Http\Request;

class ekspressController extends Controller
{
    public function index(){
        return view('layout.user.about');
    }

    public function create()
    {
        $layanans = Layanan::all(); // Ambil semua layanan
        return view('ekspres.create', compact('layanans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'layanan' => 'required',
            'harga' => 'required|numeric',
            'total_harga' => 'required|numeric',
            'pesan' => 'nullable|string',
            'status' => 'required|string'
        ]);

        Order::create($request->all());

        return redirect()->back()->with('success', 'Pesanan berhasil dibuat!');
    }
}
