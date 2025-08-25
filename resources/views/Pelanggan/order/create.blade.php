@extends('layout.pelanggan.nav')

@section('content')
    @include('komponen.notif')

    <div class="card mb-4">
        <div class="card-header" style="background-color: #065084; color: white;">
            Tambah Order
        </div>
        <div class="card-body">
            <form action="{{ route('pelanggan.order.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    {{-- Pilih Pelanggan --}}
                    <div class="col-md-4 mb-3">
                        <label>Nama Akun</label>
                        <select name="pelanggan_id" class="form-control" readonly>
                            <option value="{{ auth()->guard('pelanggan')->id() ?? auth()->id() }}">
                                {{ auth()->guard('pelanggan')->user()->nama ?? auth()->user()->name }}
                            </option>
                        </select>
                    </div>

                    {{-- Pilih Layanan --}}
                    <div class="col-md-4 mb-3">
                        <label>Nama Layanan</label>
                        <select name="layanan_id" class="form-control" id="layananSelect" required>
                            <option value="">-- Pilih Layanan --</option>
                            @foreach ($layanans as $layanan)
                                <option value="{{ $layanan->id }}" data-harga="{{ $layanan->harga }}"
                                    {{ old('layanan_id') == $layanan->id ? 'selected' : '' }}>
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
                        <label>Berat (kg)</label>
                        <input type="number" name="jumlah_item" id="jumlahItem" class="form-control" min="1"
                            value="{{ old('jumlah_item', 1) }}" required>
                    </div>

                    <div class="col-md-2 mb-3">
                        <label>Total Harga</label>
                        <input type="text" id="totalHarga" class="form-control" readonly>
                    </div>
                </div>

                <div class="mb-3">
                    <label>Pesan</label>
                    <textarea name="pesan" class="form-control">{{ old('pesan') }}</textarea>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label>Tanggal Order</label>
                        <input type="date" name="tanggal_order" class="form-control"
                            value="{{ old('tanggal_order', \Carbon\Carbon::now('Asia/Jakarta')->format('Y-m-d')) }}"
                            min="{{ \Carbon\Carbon::now('Asia/Jakarta')->format('Y-m-d') }}" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>Tanggal Selesai</label>
                        <input type="date" name="tanggal_selesai" class="form-control"
                            value="{{ old('tanggal_selesai') }}"
                            min="{{ \Carbon\Carbon::now('Asia/Jakarta')->format('Y-m-d') }}">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>Metode Pembayaran</label>
                        <select name="metode_pembayaran" class="form-control" required>
                            <option value="">-- Pilih Metode --</option>
                            <option value="Cash" {{ old('metode_pembayaran') == 'Cash' ? 'selected' : '' }}>Dana</option>
                            <option value="Transfer" {{ old('metode_pembayaran') == 'Transfer' ? 'selected' : '' }}>
                                BRI</option>
                            <option value="E-Wallet" {{ old('metode_pembayaran') == 'E-Wallet' ? 'selected' : '' }}>
                                Gopay</option>
                                <option value="E-Wallet" {{ old('metode_pembayaran') == 'E-Wallet' ? 'selected' : '' }}>
                                OVO</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-4 mb-3">
                    <label>Alamat</label>
                    <input type="text" name="alamat" class="form-control" placeholder="Masukkan alamat pelanggan"
                        value="{{ old('alamat') }}" required>
                </div>

                <div class="col-md-4 mb-3">
                    <label>Nomor HP</label>
                    <input type="text" name="nomor_hp" class="form-control" placeholder="Masukkan nomor HP pelanggan"
                        value="{{ old('nomor_hp', auth()->guard('pelanggan')->user()->no_hp ?? '') }}" required>
                </div>

                <div class="col-md-4 mb-3">
                    <label>Nama Pelanggan</label>
                    <input type="text" name="nama" class="form-control" placeholder="Masukkan nama pelanggan"
                        value="{{ old('nama', auth()->guard('pelanggan')->user()->nama ?? '') }}" required>
                </div>
                <div class="mb-3">
                    <label>Bukti Pembayaran</label>
                    <input type="file" name="bukti_pembayaran" class="form-control" accept="image/*">
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>

    {{-- SweetAlert Notifikasi --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: '{{ session('success') }}',
                confirmButtonColor: '#065084'
            })
        @endif

        @if (session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: '{{ session('error') }}',
                confirmButtonColor: '#d33'
            })
        @endif

        @if ($errors->any())
            Swal.fire({
                icon: 'error',
                title: 'Validasi Gagal',
                html: `{!! implode('<br>', $errors->all()) !!}`,
                confirmButtonColor: '#d33'
            })
        @endif
    </script>

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
