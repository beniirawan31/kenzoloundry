@extends('layout.admin.nav')

@section('content')
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
                                <th>Nama Pelanggan</th>
                                <th>Total Pembayaran</th>
                                <th>Bukti Pembayaran</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                    

                            @foreach($pembayaran as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item['nama'] }}</td>
                                    <td>{{ $item['total'] }}</td>
                                    <td>
                                        <a href="{{ asset('dummy/' . $item['bukti']) }}" target="_blank">Lihat Bukti</a>
                                    </td>
                                    <td>
                                        <span class="badge bg-warning">{{ $item['status'] }}</span>
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-success" onclick="return confirm('Konfirmasi pembayaran ini?')">
                                            <i class="fas fa-check-circle"></i> Konfirmasi
                                        </button>
                                        <button class="btn btn-sm btn-danger" onclick="return confirm('Tolak pembayaran ini?')">
                                            <i class="fas fa-times-circle"></i> Tolak
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
