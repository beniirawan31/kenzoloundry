@extends('layout.admin.nav')

@section('content')
    @include('komponen.notif')

    <!-- Content Header -->
    <section class="content-header">
        <div class="container-fluid">
            <h1>Edit Layanan</h1>
        </div>
    </section>

    <!-- Main Content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card" style="border-radius: 0.5rem; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);">
                        <div class="card-header" style="background-color: #320A6B; color: white;">
                            <strong>Form Edit Layanan</strong>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('layanan.update', $layanan->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="nama">Nama Layanan</label>
                                    <input type="text" name="nama" class="form-control"
                                        value="{{ old('nama', $layanan->nama) }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="harga">Harga</label>
                                    <input type="number" name="harga" class="form-control"
                                        value="{{ old('harga', $layanan->harga) }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="satuan">Satuan</label>
                                    <input type="text" name="satuan" class="form-control"
                                        value="{{ old('satuan', $layanan->satuan) }}" placeholder="Contoh: kg / pcs">
                                </div>

                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <textarea name="keterangan" class="form-control" rows="4">{{ old('keterangan', $layanan->keterangan) }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="foto_layanan">Foto Layanan</label>
                                    <input type="file" name="foto_layanan" class="form-control">

                                    @if ($layanan->foto_layanan)
                                        <div class="mt-2">
                                            <p>Foto saat ini:</p>
                                            <img src="{{ asset('storage/' . $layanan->foto_layanan) }}" alt="Foto Layanan"
                                                width="120" height="120"
                                                style="object-fit: cover; border-radius: 8px;">
                                        </div>
                                    @endif
                                </div>

                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <button type="submit" class="btn text-white" style="background-color: #78B9B5;">
                                        <i class="fas fa-save"></i> Simpan
                                    </button>

                                    <a href="{{ route('layanan') }}" class="btn btn-secondary">
                                        <i class="fas fa-arrow-left"></i> Kembali
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
