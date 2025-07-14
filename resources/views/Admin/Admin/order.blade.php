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
                    <div class="card-header d-flex justify-content-end align-items-center" style="background-color: #320A6B; color: white;">
                        <a href="#" class="btn" style="background-color: #78B9B5; color: white;">
                            <i class="fas fa-plus"></i> Tambah Order
                        </a>
                    </div>

                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover text-center">
                            <thead style="background-color: #065084; color: white;">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Layanan</th>
                                    <th>Total Harga</th>
                                    <th>Pesan</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $orders = [
                                        ['id' => 1, 'nama' => 'Ahmad Rizki', 'layanan' => 'Cuci + Setrika', 'harga' => 'Rp 25.000', 'pesan' => 'Tolong jangan gunakan pewangi karena alergi.', 'status' => 'Selesai'],
                                        ['id' => 2, 'nama' => 'Siti Nurhaliza', 'layanan' => 'Dry Cleaning', 'harga' => 'Rp 20.000', 'pesan' => 'Ambil jam 5 sore, jangan terlambat ya!', 'status' => 'Diproses'],
                                        ['id' => 3, 'nama' => 'Bayu Saputra', 'layanan' => 'Cuci', 'harga' => 'Rp 10.000', 'pesan' => 'Pisahkan pakaian warna gelap dan terang.', 'status' => 'Menunggu'],
                                        ['id' => 4, 'nama' => 'Dewi Lestari', 'layanan' => 'Setrika', 'harga' => 'Rp 8.000', 'pesan' => 'Baju sekolah harus rapi ya, terima kasih.', 'status' => 'Selesai'],
                                        ['id' => 5, 'nama' => 'Rama Dwi', 'layanan' => 'Paket Premium', 'harga' => 'Rp 30.000', 'pesan' => 'Gunakan hanger untuk jas dan kemeja.', 'status' => 'Dalam Pengiriman'],
                                    ];
                                @endphp

                                @foreach ($orders as $index => $order)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $order['nama'] }}</td>
                                        <td>{{ $order['layanan'] }}</td>
                                        <td>{{ $order['harga'] }}</td>
                                        <td class="text-start">{{ $order['pesan'] }}</td>
                                        <td>
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
                                            <span class="badge bg-{{ $color }}">{{ $order['status'] }}</span>
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>

                                            <button class="btn btn-sm btn-success btn-status"
                                                    data-id="{{ $order['id'] }}"
                                                    data-nama="{{ $order['nama'] }}"
                                                    data-status="{{ $order['status'] }}">
                                                <i class="fas fa-sync-alt"></i>
                                            </button>

                                            <a href="#" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>

                                            <button class="btn btn-sm btn-danger btn-hapus" data-id="{{ $order['id'] }}" data-nama="{{ $order['nama'] }}">
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
        btn.addEventListener('click', function () {
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
        btn.addEventListener('click', function () {
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
                        body: JSON.stringify({ status: result.value })
                    }).then(response => {
                        if (response.ok) {
                            Swal.fire('Berhasil!', 'Status berhasil diperbarui.', 'success')
                                .then(() => location.reload());
                        } else {
                            Swal.fire('Gagal!', 'Terjadi kesalahan saat mengubah status.', 'error');
                        }
                    });
                }
            });
        });
    });
</script>
@endsection
