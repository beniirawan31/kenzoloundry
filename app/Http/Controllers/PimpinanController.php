<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Barryvdh\DomPDF\Facade\Pdf;

class PimpinanController extends Controller
{
    // Login
    public function login()
    {
        return view('Pimpinan.sesi.Login');
    }

    public function proses(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->remember)) {
            $request->session()->regenerate();

            if (Auth::user()->role !== 'pimpinan') {
                Auth::logout();
                return back()->with('error', 'Akses hanya untuk pimpinan.');
            }

            return redirect()->route('pimpinan.index')->with('success', 'Login berhasil!');
        }

        return back()->with('error', 'Email atau password salah!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('pimpinan.login')->with('success', 'Anda telah logout.');
    }

    // Dashboard
    public function index()
    {
        $totalLayanan = Layanan::count();
        $totalOrder = Order::count();
        $menungguOrder = Order::where('status_order', 'Menunggu')->count();
        $orderSelesai = Order::where('status_pembayaran', 'Lunas')->count();
        $layanans = Layanan::all();

        return view('Pimpinan.pimpinan.index', compact(
            'totalLayanan',
            'totalOrder',
            'menungguOrder',
            'orderSelesai',
            'layanans'
        ));
    }

    // Laporan
    public function laporanPimpinan()
    {
        $laporan = Order::with('pelanggan', 'layanan', 'pembayaran')
            ->latest() // otomatis urut berdasarkan created_at desc
            ->get();

        return view('Pimpinan.laporan.index', compact('laporan'));

        return view('Pimpinan.laporan.index', compact('laporan'));
    }

    // Download Excel
    public function downloadExcel()
    {
        $laporan = Order::with('pelanggan', 'layanan')->orderBy('tanggal_order', 'desc')->get();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Header
        $headers = ['No', 'Tgl Order', 'Nama Pelanggan', 'Layanan', 'Berat/Panjang', 'Harga Awal', 'Status Order', 'Status Pembayaran', 'Tgl Selesai', 'Total Bayar'];
        $sheet->fromArray($headers, null, 'A1');

        // Isi data
        $row = 2;
        foreach ($laporan as $index => $order) {
            $sheet->fromArray([
                $index + 1,
                $order->tanggal_order ? $order->tanggal_order->format('d/m/Y') : '-',
                $order->pelanggan->nama ?? '-',
                $order->layanan->nama ?? '-',
                $order->jumlah_item,
                number_format($order->layanan->harga ?? 0, 0, ',', '.'),
                $order->status_order,
                $order->status_pembayaran,
                $order->tanggal_selesai ? $order->tanggal_selesai->format('d/m/Y') : '-',
                number_format($order->total_harga ?? 0, 0, ',', '.')
            ], null, 'A' . $row);
            $row++;
        }

        // Download
        $filename = 'laporan_' . date('Ymd_His') . '.xlsx';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment; filename=\"$filename\"");
        header('Cache-Control: max-age=0');

        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
        exit;
    }

    // Download Word
    public function downloadWord()
    {
        $laporan = Order::with('pelanggan', 'layanan')
            ->latest() // default urut by created_at desc
            ->get();

        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $section = $phpWord->addSection();

        // === KOP SURAT ===
        $section->addText(
            "KENZO LAUNDRY",
            ['bold' => true, 'size' => 16],
            ['align' => 'center']
        );
        $section->addText(
            "Alamat: Taluk, Kabupaten Tanah Datar, Sumatera Barat",
            ['size' => 11],
            ['align' => 'center']
        );
        $section->addTextBreak(1);
        $section->addLine(['weight' => 2, 'width' => 600, 'height' => 0, 'align' => 'center']); // garis bawah kop
        $section->addTextBreak(1);

        // === Judul Laporan ===
        $section->addText(
            "Laporan Transaksi",
            ['bold' => true, 'size' => 14],
            ['align' => 'center']
        );
        $section->addText(
            "Tanggal Cetak: " . Carbon::now('Asia/Jakarta')->format('d/m/Y H:i') . " WIB",
            ['size' => 10]
        );
        $section->addTextBreak(1);

        // === Tabel Data ===
        $table = $section->addTable();
        $headers = ['No', 'Tgl Order', 'Nama Pelanggan', 'Layanan', 'Berat/Panjang', 'Harga Awal', 'Status Order', 'Status Pembayaran', 'Tgl Selesai', 'Total Bayar'];
        $table->addRow();
        foreach ($headers as $header) {
            $table->addCell()->addText($header, ['bold' => true]);
        }

        foreach ($laporan as $index => $order) {
            $table->addRow();
            $table->addCell()->addText($index + 1);
            $table->addCell()->addText($order->tanggal_order ? \Carbon\Carbon::parse($order->tanggal_order)->format('d/m/Y') : '-');
            $table->addCell()->addText($order->pelanggan->nama ?? '-');
            $table->addCell()->addText($order->layanan->nama ?? '-');
            $table->addCell()->addText($order->jumlah_item);
            $table->addCell()->addText(number_format($order->layanan->harga ?? 0, 0, ',', '.'));
            $table->addCell()->addText($order->status_order);
            $table->addCell()->addText($order->status_pembayaran);
            $table->addCell()->addText($order->tanggal_selesai ? \Carbon\Carbon::parse($order->tanggal_selesai)->format('d/m/Y') : '-');
            $table->addCell()->addText(number_format($order->total_harga ?? 0, 0, ',', '.'));
        }

        // === Tanda Tangan ===
        $section->addTextBreak(3); // spasi kosong
        $section->addText(
            "Taluk, " . date('d-m-Y'),
            ['size' => 12],
            ['align' => 'right']
        );
        $section->addTextBreak(3); // jarak untuk tanda tangan
        $section->addText(
            "Nurhayati",
            ['underline' => 'single', 'bold' => true, 'size' => 12],
            ['align' => 'right']
        );

        // === Download Word ===
        $filename = 'laporan_' . date('Ymd_His') . '.docx';
        header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
        header("Content-Disposition: attachment; filename=\"$filename\"");
        header('Cache-Control: max-age=0');

        $writer = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $writer->save('php://output');
        exit;
    }




    public function downloadPdf()
    {
        $laporan = Order::with('pelanggan', 'layanan')
            ->latest() // otomatis urut berdasarkan created_at desc
            ->get();

        $pdf = PDF::loadView('Pimpinan.laporan.pdf', compact('laporan'))
            ->setPaper('a4', 'landscape'); // ukuran kertas & orientasi

        return $pdf->download('laporan_' . date('Ymd_His') . '.pdf');
    }
}
