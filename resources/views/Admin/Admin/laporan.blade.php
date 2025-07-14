@extends('layout.admin.nav')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <h1>Laporan Order</h1>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header" style="background-color: #320A6B; color: white;">
                    <strong>Laporan Data Order</strong>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover text-center">
                        <thead style="background-color: #065084; color: white;">
                            <tr>
                                <th>No</th>
                                <th>Nama Pelanggan</th>
                                <th>Layanan</th>
                                <th>Total Harga</th>
                                <th>Pesan</th>
                                <th>Status</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $orders = [
                                    ['nama' => 'Ahmad Rizki', 'layanan' => 'Cuci + Setrika', 'harga' => 'Rp 25.000', 'pesan' => 'Tolong jangan gunakan pewangi karena alergi.', 'status' => 'Selesai', 'tanggal' => '14-07-2025'],
                                    ['nama' => 'Siti Nurhaliza', 'layanan' => 'Dry Cleaning', 'harga' => 'Rp 20.000', 'pesan' => 'Ambil jam 5 sore, jangan terlambat ya!', 'status' => 'Diproses', 'tanggal' => '13-07-2025'],
                                    ['nama' => 'Bayu Saputra', 'layanan' => 'Cuci', 'harga' => 'Rp 10.000', 'pesan' => 'Pisahkan pakaian warna gelap dan terang.', 'status' => 'Menunggu', 'tanggal' => '12-07-2025'],
                                    ['nama' => 'Dewi Lestari', 'layanan' => 'Setrika', 'harga' => 'Rp 8.000', 'pesan' => 'Baju sekolah harus rapi ya, terima kasih.', 'status' => 'Selesai', 'tanggal' => '11-07-2025'],
                                    ['nama' => 'Rama Dwi', 'layanan' => 'Paket Premium', 'harga' => 'Rp 30.000', 'pesan' => 'Gunakan hanger untuk jas dan kemeja.', 'status' => 'Dalam Pengiriman', 'tanggal' => '10-07-2025'],
                                ];
                            @endphp

                            @foreach($orders as $index => $order)
                                @php
                                    $color = match($order['status']) {
                                        'Selesai' => 'success',
                                        'Diproses' => 'warning',
                                        'Menunggu' => 'secondary',
                                        'Dalam Pengiriman' => 'info',
                                        'Dibatalkan' => 'danger',
                                        default => 'dark'
                                    };
                                @endphp
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $order['nama'] }}</td>
                                    <td>{{ $order['layanan'] }}</td>
                                    <td>{{ $order['harga'] }}</td>
                                    <td class="text-start">{{ $order['pesan'] }}</td>
                                    <td><span class="badge bg-{{ $color }}">{{ $order['status'] }}</span></td>
                                    <td>{{ $order['tanggal'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Tombol Aksi di Bawah -->
                    <div class="mt-4 text-end">
                        <a href="{{ route('laporan.export.pdf.all') }}" class="btn btn-danger me-2">
                            <i class="fas fa-file-pdf"></i> Download PDF
                        </a>
                        <a href="{{ route('laporan.export.word.all') }}" class="btn btn-primary me-2">
                            <i class="fas fa-file-word"></i> Download Word
                        </a>
                        <a href="#" class="btn btn-secondary"
                           onclick="return confirm('Yakin ingin menghapus semua data laporan ini?')">
                            <i class="fas fa-trash-alt"></i> Hapus Semua
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
