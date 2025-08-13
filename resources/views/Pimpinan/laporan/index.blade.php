@extends('layout.pimpinan.nav')

@section('content')
    @include('komponen.notif')

    <!-- Bootstrap & SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <section class="content-header">
        <div class="container-fluid mb-3">
            <h1 class="fw-bold">Halaman Laporan</h1>
        </div>
    </section>

    <div class="card-body p-3">
        <div class="table-responsive">
            <table id="example2" class="table table-bordered table-hover text-center align-middle shadow-sm"
                style="border-radius: 0.5rem; overflow: hidden; table-layout: fixed; width: 100%;">
                <thead style="background-color: #065084; color: white;">
                    <tr>
                        <th style="width: 40px;">No</th>
                        <th style="width: 100px;">Tgl Order</th>
                        <th style="width: 130px;">Nama Pelanggan</th>
                        <th style="width: 130px;">Layanan</th>
                        <th style="width: 90px;">Berat/Panjang</th>
                        <th style="width: 110px;">Harga awal</th>
                        <th style="width: 110px;">Status Order</th>
                        <th style="width: 120px;">Status Pembayaran</th>
                        <th style="width: 100px;">Tgl Selesai</th>
                        <th style="width: 110px;">Total Bayar</th>
                        <th style="width: 80px;">Bukti</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($laporan as $index => $order)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ \Carbon\Carbon::parse($order->tanggal_order)->format('d/m/Y') }}</td>
                            <td>{{ $order->pelanggan->nama ?? '-' }}</td>
                            <td>{{ $order->layanan->nama ?? '-' }}</td>
                            <td>{{ $order->jumlah_item }}</td>
                            <td>Rp {{ number_format($order->layanan->harga ?? 0, 0, ',', '.') }}</td>
                            <td>
                                <span
                                    class="badge 
                                    @if ($order->status_order == 'Selesai') bg-success
                                    @elseif($order->status_order == 'Dalam proses') bg-warning text-dark
                                    @else bg-secondary @endif">
                                    {{ $order->status_order }}
                                </span>
                            </td>
                            <td>
                                <span
                                    class="badge 
                                    @if ($order->status_pembayaran == 'Lunas') bg-success
                                    @elseif($order->status_pembayaran == 'Belum Lunas') bg-danger
                                    @else bg-secondary @endif">
                                    {{ $order->status_pembayaran }}
                                </span>
                            </td>
                            <td>
                                {{ $order->tanggal_selesai ? \Carbon\Carbon::parse($order->tanggal_selesai)->format('d/m/Y') : '-' }}
                            </td>
                            <td>Rp {{ number_format($order->total_harga ?? 0, 0, ',', '.') }}</td>
                            <td>
                                @if ($order->bukti_pembayaran)
                                    <img src="{{ asset('storage/' . $order->bukti_pembayaran) }}" alt="Bukti"
                                        style="max-width: 40px; cursor: pointer; border-radius: 5px;" data-bs-toggle="modal"
                                        data-bs-target="#buktiModal{{ $index }}">

                                    <!-- Modal -->
                                    <div class="modal fade" id="buktiModal{{ $index }}" tabindex="-1"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Bukti Pembayaran</h5>
                                                    <button type="button" class="btn-close"
                                                        data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body text-center">
                                                    <img src="{{ asset('storage/' . $order->bukti_pembayaran) }}"
                                                        alt="Bukti Pembayaran" class="img-fluid rounded">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    -
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="11" class="text-center">Tidak ada data laporan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-left mt-3">
            <a href="{{ route('pimpinan.laporan.word') }}" class="btn btn-primary me-2">
                <i class="fas fa-file-word"></i> Download Word
            </a>
            <a href="{{ route('pimpinan.laporan.pdf') }}" class="btn btn-success">
                <i class="fas fa-file-pdf"></i> Download pdf
            </a>
        </div>
    </div>
@endsection
