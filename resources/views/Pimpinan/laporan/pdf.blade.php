<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Transaksi</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #000; padding: 5px; text-align: center; }
        th { background-color: #ddd; }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Laporan Transaksi</h2>
    <p>Tanggal Cetak: {{ date('d/m/Y H:i') }}</p>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Tgl Order</th>
                <th>Nama Pelanggan</th>
                <th>Layanan</th>
                <th>Berat/Panjang</th>
                <th>Harga Awal</th>
                <th>Status Order</th>
                <th>Status Pembayaran</th>
                <th>Tgl Selesai</th>
                <th>Total Bayar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($laporan as $index => $order)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ \Carbon\Carbon::parse($order->tanggal_order)->format('d/m/Y') }}</td>
                    <td>{{ $order->pelanggan->nama ?? '-' }}</td>
                    <td>{{ $order->layanan->nama ?? '-' }}</td>
                    <td>{{ $order->jumlah_item }}</td>
                    <td>Rp {{ number_format($order->layanan->harga ?? 0, 0, ',', '.') }}</td>
                    <td>{{ $order->status_order }}</td>
                    <td>{{ $order->status_pembayaran }}</td>
                    <td>{{ $order->tanggal_selesai ? \Carbon\Carbon::parse($order->tanggal_selesai)->format('d/m/Y') : '-' }}</td>
                    <td>Rp {{ number_format($order->total_harga ?? 0, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
