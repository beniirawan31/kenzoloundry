@extends('layout.pelanggan.nav')

@section('content')
    <section class="content-header">
        <div class="container-fluid mb-3">
            <h1 class="fw-bold">Proses Pembayaran</h1>
        </div>
    </section>
    <div class="container mt-4">
        @include('komponen.notif')

        @foreach ($orders as $order)
            <div class="card mb-4 shadow-sm border-0">
                <div class="card-body">
                    <h5 class="card-title">{{ $order->layanan->nama }}</h5><br>
                    <p><strong>Berat:</strong> {{ $order->jumlah_item ?? '-' }} kg</p>
                    <p><strong>Total Harga:</strong>
                        <span class="text-primary">Rp {{ number_format($order->total_harga, 0, ',', '.') }}</span>
                    </p>
                    <p><strong>Tanggal Order:</strong>
                        {{ \Carbon\Carbon::parse($order->tanggal_order)->translatedFormat('d F Y') }}</p>
                    <p><strong>Tanggal Selesai:</strong>
                        {{ \Carbon\Carbon::parse($order->tanggal_selesai)->translatedFormat('d F Y') }}</p>
                    @if (!$order->bukti_pembayaran)
                        <div class="alert alert-warning py-2">
                            Belum ada bukti pembayaran.
                        </div>
                        <form action="{{ route('pelanggan.uploadBukti', $order->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Upload Bukti Pembayaran</label>
                                <input type="file" name="bukti_pembayaran" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-success"><i class="fas fa-upload"></i> Kirim
                                Pembayaran</button>
                        </form>
                    @elseif($order->status_pembayaran == 'Menunggu Konfirmasi')
                        <div class="alert alert-info py-2">
                            <i class="fas fa-clock"></i> Status: Menunggu konfirmasi admin
                        </div>
                        <img src="{{ asset('storage/' . $order->bukti_pembayaran) }}" class="img-thumbnail mb-2"
                            width="200">
                    @elseif($order->status_pembayaran == 'Lunas')
                        <div class="alert alert-success py-2">
                            <i class="fas fa-check-circle"></i> Status: Lunas
                        </div>
                        <img src="{{ asset('storage/' . $order->bukti_pembayaran) }}" class="img-thumbnail mb-2"
                            width="200">
                    @endif
                </div>
            </div>
        @endforeach
    </div>
@endsection
