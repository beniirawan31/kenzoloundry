<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Order;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PelangganController extends Controller
{
    public function login()
    {
        return view('Pelanggan.auth.login');
    }

    public function loginProses(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('pelanggan')->attempt($credentials, $request->remember)) {
            $request->session()->regenerate();

            return redirect()->route('pelanggan.dashboard')->with('success', 'Login berhasil!');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    public function register()
    {
        return view('Pelanggan.auth.register');
    }

    public function registerProses(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:pelanggans,email',
            'no_hp' => 'nullable|string|max:15',
            'password' => 'required|min:3|confirmed',
        ]);

        Pelanggan::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('pelanggan.login')->with('success', 'Pendaftaran berhasil, silakan login!');
    }

    public function dashboard()
    {
        return view('Pelanggan.dashboard.index');
    }

    public function logout()
    {
        Auth::guard('pelanggan')->logout();
        return redirect()->route('pelanggan.login')->with('success', 'Anda telah logout.');
    }





    public function pelangganOrder()
    {
        $pelangganId = auth()->guard('pelanggan')->id() ?? auth()->id();

        $orders = Order::with(['pelanggan', 'layanan'])
            ->where('pelanggan_id', $pelangganId)
            ->latest()
            ->get();

        return view('Pelanggan.order.index', compact('orders'));
    }

    public function pelanggancreate()
    {
        // Kirim $pelanggans supaya view yang butuh dropdown pelanggan tidak error.
        // Jika view pelanggan (front-end) tidak perlu daftar pelanggan, kamu bisa menghapus baris ini.
        $pelanggans = Pelanggan::select('id', 'nama')->get();

        $layanans = Layanan::select('id', 'nama', 'harga')->get();

        // Pastikan path view sesuai (besar/kecil huruf sensitif pada beberapa OS)
        return view('Pelanggan.order.create', compact('layanans', 'pelanggans'));
    }

    public function pelangganstore(Request $request)
    {
        $request->validate([
            'nama'               => 'required|string|max:100',
            'alamat'             => 'required|string|max:255',
            'nomor_hp'           => 'required|string|max:15',
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

        $buktiPath = null;
        if ($request->hasFile('bukti_pembayaran')) {
            $buktiPath = $request->file('bukti_pembayaran')->store('bukti_pembayaran', 'public');
        }

        Order::create([
            'nama'               => $request->nama,
            'alamat'             => $request->alamat,
            'nomor_hp'           => $request->nomor_hp,
            'pelanggan_id'       => auth()->guard('pelanggan')->id() ?? auth()->id(),
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
            'admin_input'        => null
        ]);

        return redirect()->route('pelanggan.order.index')->with('success', 'Order berhasil ditambahkan.');
    }

}
