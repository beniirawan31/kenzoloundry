@extends('layout.admin.nav')

@section('content')
    @include('komponen.notif')

    <div class="card mb-4">

        {{-- Notifikasi error validasi --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Terjadi kesalahan!</strong>
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Notifikasi sukses --}}
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- Notifikasi error dari session --}}
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <div class="card-header" style="background-color: #065084; color: white;">
            Tambah Order
        </div>
        <div class="card-body">
            <form action="{{ route('order.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label>Pelanggan</label>
                        <select name="pelanggan_id" class="form-control" required>
                            <option value="">-- Pilih Pelanggan --</option>
                            @foreach ($pelanggans as $pelanggan)
                                <option value="{{ $pelanggan->id }}">{{ $pelanggan->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>Nama Layanan</label>
                        <select name="layanan_id" class="form-control" id="layananSelect" required>
                            <option value="">-- Pilih Layanan --</option>
                            @foreach ($layanans as $layanan)
                                <option value="{{ $layanan->id }}" data-harga="{{ $layanan->harga }}">
                                    {{ $layanan->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>Harga</label>
                        <input type="text" name="harga" id="harga" class="form-control" readonly>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label>Jumlah</label>
                        <input type="number" name="jumlah_item" id="jumlahItem" class="form-control" min="1"
                            value="1" required>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label>Total Harga</label>
                        <input type="text" id="totalHarga" class="form-control" readonly>
                    </div>
                </div>

                <div class="mb-3">
                    <label>Pesan</label>
                    <textarea name="pesan" class="form-control"></textarea>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label>Tanggal Order</label>
                        <input type="date" name="tanggal_order" class="form-control" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>Tanggal Selesai</label>
                        <input type="date" name="tanggal_selesai" class="form-control">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>Metode Pembayaran</label>
                        <select name="metode_pembayaran" class="form-control" required>
                            <option value="">-- Pilih Metode --</option>
                            <option value="Cash">Cash</option>
                            <option value="Transfer">Transfer</option>
                            <option value="E-Wallet">E-Wallet</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label>Bukti Pembayaran</label>
                    <input type="file" name="bukti_pembayaran" class="form-control" accept="image/*">
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>

        </div>
    </div>

    <script>
        const layananSelect = document.getElementById('layananSelect');
        const hargaInput = document.getElementById('harga');
        const jumlahItem = document.getElementById('jumlahItem');
        const totalHarga = document.getElementById('totalHarga');

        function updateHargaDanTotal() {
            const harga = layananSelect.options[layananSelect.selectedIndex]?.dataset.harga || 0;
            hargaInput.value = new Intl.NumberFormat('id-ID').format(harga);
            totalHarga.value = new Intl.NumberFormat('id-ID').format(harga * jumlahItem.value);
        }

        layananSelect.addEventListener('change', updateHargaDanTotal);
        jumlahItem.addEventListener('input', updateHargaDanTotal);
    </script>
@endsection
