@extends('layout.pelanggan.nav')

@section('content')
    @include('komponen.notif')

    <section class="content-header">
        <div class="container-fluid mb-3">
            <h1 class="fw-bold">Halaman Order</h1>
        </div>
    </section>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center"
            style="background: linear-gradient(90deg, #320A6B, #5D3BE8); color: white;">
            <a href="{{ route('pelanggan.order.create') }}" class="btn btn-light btn-sm">
                <i class="fas fa-plus"></i> Tambah Order
            </a>
        </div>

        <table class="table table-bordered table-striped">
            <thead>
                <tr class="text-center">
                    <th>No</th>
                    <th>Layanan</th>
                    <th>Jumlah Item</th>
                    <th>Total Harga</th>
                    <th>Status Order</th>
                    <th>Status Pembayaran</th>
                    <th>Tanggal Order</th>
                    <th>Tanggal Selesai</th>
                </tr>
            </thead>
            <tbody>
                @forelse($orders as $index => $order)
                    <tr class="text-center">
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $order->layanan->nama ?? '-' }}</td>
                        <td>{{ $order->jumlah_item }}</td>
                        <td>Rp {{ number_format($order->total_harga, 0, ',', '.') }}</td>

                        {{-- Status Order --}}
                        <td>
                            <span class="badge 
                                @if($order->status_order == 'Menunggu') bg-warning
                                @elseif($order->status_order == 'Proses') bg-info
                                @elseif($order->status_order == 'Selesai') bg-success
                                @elseif($order->status_order == 'Gagal') bg-danger
                                @else bg-secondary @endif">
                                {{ $order->status_order }}
                            </span>
                        </td>

                        {{-- Status Pembayaran --}}
                        <td>
                            @php
                                $statusPembayaran = $order->status_pembayaran;
                            @endphp
                            <span class="badge 
                                @if($statusPembayaran == 'Belum Bayar') bg-danger
                                @elseif($statusPembayaran == 'Selesai') bg-success
                                @elseif($statusPembayaran == 'Gagal') bg-dark
                                @else bg-secondary @endif">
                                {{ $statusPembayaran }}
                            </span>
                        </td>

                        <td>{{ $order->tanggal_order }}</td>
                        <td>{{ $order->tanggal_selesai ?? '-' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center">Tidak ada pesanan</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
