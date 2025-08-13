@extends('layout.admin.nav')

@section('content')
    @include('komponen.notif')
    <section class="content-header">
        <div class="container-fluid">
            <h1>Konfirmasi Pembayaran</h1>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header" style="background-color: #320A6B; color: white;">
                    <strong>Daftar Pembayaran</strong>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover text-center">
                        <thead style="background-color: #065084; color: white;">
                            <tr>
                                <th>No</th>
                                <th>Pelanggan</th>
                                <th>Layanan</th>
                                <th>Tanggal Order</th>
                                <th>Total Harga</th>
                                <th>Status Order</th>
                                <th>Status Pembayaran</th>
                                <th>Metode Pembayaran</th>
                                <th>Jumlah Bayar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $orders->firstItem() + $loop->index }}</td> <!-- Nomor urut -->
                                    <td>{{ $order->pelanggan->nama ?? 'N/A' }}</td>
                                    <td>{{ $order->layanan->nama ?? 'N/A' }}</td>
                                    <td>{{ $order->tanggal_order }}</td>
                                    <td>Rp {{ number_format($order->total_harga, 0, ',', '.') }}</td>
                                    <td>
                                        @if ($order->status_order === 'Selesai')
                                            <span class="badge badge-success">{{ $order->status_order }}</span>
                                        @elseif ($order->status_order === 'Menunggu')
                                            <span class="badge badge-warning">{{ $order->status_order }}</span>
                                        @else
                                            <span class="badge badge-secondary">{{ $order->status_order }}</span>
                                        @endif
                                    </td>

                                    <td>
                                        @if ($order->status_pembayaran === 'Lunas')
                                            <span class="badge badge-success">{{ $order->status_pembayaran }}</span>
                                        @elseif ($order->status_pembayaran === 'Belum Bayar')
                                            <span class="badge badge-danger">{{ $order->status_pembayaran }}</span>
                                        @else
                                            <span class="badge badge-warning">{{ $order->status_pembayaran }}</span>
                                        @endif
                                    </td>
                                    <td>{{ $order->metode_pembayaran ?? 'N/A' }}</td>
                                    <td>
                                        @if ($order)
                                            Rp {{ number_format($order->total_harga, 0, ',', '.') }}
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{ route('admin.konfirmasi', $order->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-success btn-konfirmasi">
                                                <i class="fas fa-check-circle"></i> Konfirmasi
                                            </button>
                                        </form>


                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-end mt-3">
                        {{ $orders->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // SweetAlert untuk konfirmasi pembayaran
        document.querySelectorAll('.btn-konfirmasi').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault(); // stop form submit
                let form = this.closest('form');
                Swal.fire({
                    title: 'Konfirmasi Pembayaran?',
                    text: "Status pembayaran akan diubah menjadi Lunas.",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#28a745',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Ya, Konfirmasi',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>
@endsection
