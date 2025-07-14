<?php

namespace App\Http\Controllers;

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
        return view('Admin.Admin.layanan');
    }

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

    public function kurir()
    {
        return view('Admin.Admin.kurir');
    }
}
