@extends('layout.admin.nav')

@section('content')
    @include('komponen.notif')

    <section class="content-header">
        <div class="container-fluid">
            <h1>Data User & Pelanggan</h1>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            {{-- Tabel User --}}
            <div class="card mb-4">
                <div class="card-header" style="background-color: #320A6B; color: white;">
                    <strong>Daftar User</strong>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover text-center">
                        <thead style="background-color: #065084; color: white;">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>No HP</th>
                                <th>Role</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($users as $i => $user)
                                <tr>
                                    <td>{{ $i + 1 }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->no_hp ?? '-' }}</td>
                                    <td>
                                        <span
                                            class="badge bg-{{ $user->role === 'admin' ? 'primary' : ($user->role === 'kurir' ? 'warning' : 'success') }}">
                                            {{ ucfirst($user->role) }}
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">Belum ada user terdaftar.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Tabel Pelanggan --}}
            <div class="card">
                <div class="card-header" style="background-color: #320A6B; color: white;">
                    <strong>Daftar Pelanggan</strong>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover text-center">
                        <thead style="background-color: #065084; color: white;">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>No HP</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($pelanggans as $i => $pelanggan)
                                <tr>
                                    <td>{{ $i + 1 }}</td>
                                    <td>{{ $pelanggan->nama }}</td>
                                    <td>{{ $pelanggan->email }}</td>
                                    <td>{{ $pelanggan->no_hp ?? '-' }}</td>
                                    
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">Belum ada pelanggan terdaftar.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </section>
@endsection
