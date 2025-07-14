@extends('layout.admin.nav')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <h1>Data Kurir</h1>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">

            <div class="card">
                <div class="card-header" style="background-color: #320A6B; color: white;">
                    <strong>Daftar Kurir</strong>
                    <a href="#" class="btn btn-sm float-right" style="background-color: #78B9B5; color: white;">
                        <i class="fas fa-plus"></i> Tambah Kurir
                    </a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover text-center">
                        <thead style="background-color: #065084; color: white;">
                            <tr>
                                <th>No</th>
                                <th>Nama Kurir</th>
                                <th>No HP</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $kurir = [
                                    'nama' => 'Budi Santoso',
                                    'hp' => '08123456789',
                                    'status' => 'Aktif',
                                ];
                                $badge = $kurir['status'] === 'Aktif' ? 'success' : 'secondary';
                            @endphp

                            <tr>
                                <td>1</td>
                                <td>{{ $kurir['nama'] }}</td>
                                <td>{{ $kurir['hp'] }}</td>
                                <td><span class="badge bg-{{ $badge }}">{{ $kurir['status'] }}</span></td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                                    <a href="#" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                    <a href="#" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </section>
@endsection
