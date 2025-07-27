@extends('layout.user.apps')

@section('content')
<div class="container">
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <h3>Tambah Pesanan</h3>

    <form action="{{ route('pesanan.store') }}" method="POST">
        @csrf

        <div class="form-group mt-3">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>

        <div class="form-group mt-3">
            <label for="layanan">Layanan</label>
            <select class="form-control" id="layanan" name="layanan" required>
                <option value="">-- Pilih Layanan --</option>
                @foreach ($layanans as $layanan)
                    <option value="{{ $layanan->id }}"
                        data-harga="{{ $layanan->harga }}"
                        data-satuan="{{ $layanan->satuan }}">
                        {{ $layanan->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group mt-3">
            <label for="satuan">Berat atau panjang barang</label>
            <input type="number" class="form-control" id="satuan" name="satuan" required>
        </div>

        <div class="form-group mt-3">
            <label for="harga">Harga per Satuan</label>
            <input type="number" class="form-control" id="harga" name="harga" readonly required>
        </div>

        <div class="form-group mt-3">
            <label for="total_harga">Total Harga</label>
            <input type="number" class="form-control" id="total_harga" name="total_harga" readonly required>
        </div>

        <div class="form-group mt-3">
            <label for="pesan">Pesan</label>
            <textarea class="form-control" id="pesan" name="pesan" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-primary mt-4">Simpan Pesanan</button>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const layananSelect = document.getElementById('layanan');
        const hargaInput = document.getElementById('harga');
        const satuanInput = document.getElementById('satuan');
        const totalHargaInput = document.getElementById('total_harga');

        layananSelect.addEventListener('change', function () {
            const selectedOption = layananSelect.options[layananSelect.selectedIndex];
            const harga = selectedOption.getAttribute('data-harga') || 0;
            hargaInput.value = harga;
            calculateTotal();
        });

        satuanInput.addEventListener('input', function () {
            calculateTotal();
        });

        function calculateTotal() {
            const harga = parseFloat(hargaInput.value) || 0;
            const satuan = parseFloat(satuanInput.value) || 0;
            totalHargaInput.value = harga * satuan;
        }
    });
</script>
@endsection
