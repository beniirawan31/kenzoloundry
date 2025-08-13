@extends('layout.admin.nav')

@section('content')
    @include('komponen.notif')

    <!-- Bootstrap & SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="fw-bold text-">Halaman Order</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card shadow-lg border-0" style="border-radius: 0.75rem; overflow: hidden;">
                        <div class="card-header d-flex justify-content-between align-items-center"
                            style="background: linear-gradient(90deg, #320A6B, #5D3BE8); color: white;">
                            <a href="{{ route('order.create') }}" class="btn btn-light btn-sm"
                                style="border-radius: 20px; font-weight: 500;">
                                <i class="fas fa-plus"></i> Tambah Order
                            </a>
                        </div>

                        <div class="card-body p-3">
                            <table id="example2"
                                class="table table-bordered table-hover text-center align-middle shadow-sm"
                                style="border-radius: 0.5rem; overflow: hidden;">
                                <thead style="background-color: #065084; color: white;">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pelanggan</th>
                                        <th>Alamat</th>
                                        <th>Nomor HP</th>
                                        <th>Nama Layanan</th>
                                        <th>Harga</th>
                                        <th>Jumlah</th>
                                        <th>Total Harga</th>
                                        <th>Tanggal Order</th>
                                        <th>Tanggal Selesai</th>
                                        <th>Bukti Pembayaran</th>
                                        <th>Pesan</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody style="background-color: #f9f9f9;">
                                    @foreach ($orders as $index => $order)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $order->nama ?? '-' }}</td>
                                            <td>{{ $order->alamat ?? '-' }}</td>
                                            <td>{{ $order->nomor_hp ?? '-' }}</td>
                                            <td>{{ $order->layanan->nama ?? '-' }}</td>
                                            <td>Rp {{ number_format($order->layanan->harga ?? 0, 0, ',', '.') }}</td>
                                            <td>{{ $order->jumlah_item }}</td>
                                            <td>Rp {{ number_format($order->total_harga, 0, ',', '.') }}</td>
                                            <td>{{ $order->tanggal_order ?? '-' }}</td>
                                            <td>{{ $order->tanggal_selesai ?? '-' }}</td>
                                            <td>
                                                @if ($order->bukti_pembayaran)
                                                    <img src="{{ asset('storage/' . $order->bukti_pembayaran) }}"
                                                        alt="Bukti Pembayaran"
                                                        style="max-width: 40px; max-height: 40px; object-fit: cover; cursor: pointer;"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#imageModal{{ $order->id }}" />
                                                    <div class="modal fade" id="imageModal{{ $order->id }}"
                                                        tabindex="-1">
                                                        <div class="modal-dialog modal-dialog-centered modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-body p-0 text-center">
                                                                    <img src="{{ asset('storage/' . $order->bukti_pembayaran) }}"
                                                                        style="width: 100%; height: auto;">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary btn-sm"
                                                                        data-bs-dismiss="modal">Tutup</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td>
                                                @php
                                                    $pesan = $order->pesan ?? '-';
                                                    $pesanPendek = Str::limit($pesan, 5, '...');
                                                @endphp
                                                <span class="text-primary pesan-pop" style="cursor: pointer;"
                                                    data-pesan="{{ $pesan }}">
                                                    {{ $pesanPendek }}
                                                </span>
                                            </td>
                                            <td>
                                                @php
                                                    $color = match ($order->status_order) {
                                                        'Selesai' => 'success',
                                                        'Proses' => 'warning',
                                                        'Menunggu' => 'secondary',
                                                        'Dalam Pengiriman' => 'info',
                                                        'Dibatalkan' => 'danger',
                                                        default => 'dark',
                                                    };
                                                @endphp
                                                <span class="badge bg-{{ $color }} px-3 py-2 rounded-pill">
                                                    {{ $order->status_order }}
                                                </span>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-success btn-status" title="Ubah Status"
                                                    data-id="{{ $order->id }}" data-nama="{{ $order->nama ?? '-' }}"
                                                    data-status="{{ $order->status_order }}">
                                                    <i class="fas fa-sync-alt"></i>
                                                </button>
                                                <button class="btn btn-sm btn-danger btn-hapus" title="Hapus"
                                                    data-id="{{ $order->id }}" data-nama="{{ $order->nama ?? '-' }}">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                                <form id="form-delete-{{ $order->id }}"
                                                    action="{{ route('order.destroy', $order->id) }}" method="POST"
                                                    style="display:none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <script>
        // Pop-up pesan
        document.querySelectorAll('.pesan-pop').forEach(el => {
            el.addEventListener('click', function() {
                Swal.fire({
                    title: 'Pesan Lengkap',
                    text: this.dataset.pesan,
                    icon: 'info',
                    confirmButtonText: 'Tutup'
                });
            });
        });

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
                        document.getElementById(`form-delete-${id}`).submit();
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
                        'Proses': 'Diproses',
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
                                status_order: result.value
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
