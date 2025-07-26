@extends('layout.admin.nav')

@section('content')
    @include('komponen.notif')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Order</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card" style="border-radius: 0.5rem; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);">
                        <div class="card-header d-flex justify-content-end align-items-center"
                            style="background-color: #320A6B; color: white;">
                        </div>

                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover text-center">
                                <thead style="background-color: #065084; color: white;">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pelanggan</th>
                                        <th>Layanan</th>
                                        <th>Harga</th>
                                        <th>Total Harga</th>
                                        <th>Pesan</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $index => $order)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $order->nama }}</td>
                                            <td>{{ $order->layanan }}</td>
                                            <td>{{ $order->harga }}</td>
                                            <td>Rp {{ number_format($order->total_harga, 0, ',', '.') }}</td>
                                            <td class="text-start">{{ $order->pesan }}</td>
                                            <td>
                                                @php
                                                    $color = match ($order->status) {
                                                        'Selesai' => 'success',
                                                        'Diproses' => 'warning',
                                                        'Menunggu' => 'secondary',
                                                        'Dalam Pengiriman' => 'info',
                                                        'Dibatalkan' => 'danger',
                                                        default => 'dark',
                                                    };
                                                @endphp
                                                <span class="badge bg-{{ $color }}">{{ $order->status }}</span>
                                            </td>
                                            <td>

                                                <button class="btn btn-sm btn-success btn-status"
                                                    data-id="{{ $order->id }}" data-nama="{{ $order->nama }}"
                                                    data-status="{{ $order->status }}">
                                                    <i class="fas fa-sync-alt"></i>
                                                </button>


                                                <button class="btn btn-sm btn-danger btn-hapus"
                                                    data-id="{{ $order->id }}" data-nama="{{ $order->nama }}">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        // SweetAlert - Hapus
        document.querySelectorAll('.btn-hapus').forEach(btn => {
            btn.addEventListener('click', function() {
                const id = this.dataset.id;
                const nama = this.dataset.nama;

                Swal.fire({
                    title: 'Hapus Order?',
                    text: `Yakin ingin menghapus order atas nama ${nama}?`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Ganti dengan URL Laravel kamu
                        window.location.href = `/order/delete/${id}`;
                    }
                });
            });
        });

        // SweetAlert - Ubah Status
        document.querySelectorAll('.btn-status').forEach(btn => {
            btn.addEventListener('click', function() {
                const id = this.dataset.id;
                const nama = this.dataset.nama;
                const currentStatus = this.dataset.status;

                Swal.fire({
                    title: 'Ubah Status Order',
                    text: `Ubah status order atas nama "${nama}"`,
                    input: 'select',
                    inputOptions: {
                        'Menunggu': 'Menunggu',
                        'Diproses': 'Diproses',
                        'Selesai': 'Selesai',
                        'Dibatalkan': 'Dibatalkan',
                        'Dalam Pengiriman': 'Dalam Pengiriman',
                    },
                    inputValue: currentStatus,
                    showCancelButton: true,
                    confirmButtonText: 'Ubah',
                    cancelButtonText: 'Batal',
                    inputValidator: (value) => {
                        if (!value) {
                            return 'Silakan pilih status baru';
                        }
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        fetch(`/order/status/${id}`, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({
                                status: result.value
                            })
                        }).then(response => {
                            if (response.ok) {
                                Swal.fire('Berhasil!', 'Status berhasil diperbarui.',
                                        'success')
                                    .then(() => location.reload());
                            } else {
                                Swal.fire('Gagal!',
                                    'Terjadi kesalahan saat mengubah status.', 'error');
                            }
                        });
                    }
                });
            });
        });
    </script>
@endsection
