<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
        }

        .kop {
            text-align: center;
            margin-bottom: 20px;
        }

        .kop h2 {
            margin: 0;
            font-size: 18px;
            font-weight: bold;
        }

        .kop p {
            margin: 0;
            font-size: 12px;
        }

        hr {
            border: 1px solid black;
            margin: 10px 0 20px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table,
        th,
        td {
            border: 1px solid black;
            padding: 5px;
            text-align: left;
        }
    </style>
</head>

<body>

    <!-- KOP SURAT -->
    <div class="kop">
        <h2>KENZO LAUNDRY</h2>
        <p>Alamat: Taluk | Kecamatan Lintau Buo | Kabupaten Tanah Datar  |Sumatera Barat</p>
    </div>
    <hr>

    <h2 style="text-align: center;">Laporan Transaksi</h2>
    <p>Tanggal Cetak: {{ \Carbon\Carbon::now('Asia/Jakarta')->format('d/m/Y H:i') }} WIB</p>

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
            @foreach ($laporan as $index => $order)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $order->tanggal_order ? \Carbon\Carbon::parse($order->tanggal_order)->format('d/m/Y') : '-' }}</td>
                    <td>{{ $order->pelanggan->nama ?? '-' }}</td>
                    <td>{{ $order->layanan->nama ?? '-' }}</td>
                    <td>{{ $order->jumlah_item }}</td>
                    <td>{{ number_format($order->layanan->harga ?? 0, 0, ',', '.') }}</td>
                    <td>{{ $order->status_order }}</td>
                    <td>{{ $order->status_pembayaran }}</td>
                    <td>{{ $order->tanggal_selesai ? \Carbon\Carbon::parse($order->tanggal_selesai)->format('d/m/Y') : '-' }}</td>
                    <td>{{ number_format($order->total_harga ?? 0, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <br><br><br>
    <div style="text-align: right; margin-right: 50px;">
        Taluk, {{ date('d-m-Y') }} <br><br><br>
        <u><b>Nurhayati</b></u>
    </div>

</body>

</html>
