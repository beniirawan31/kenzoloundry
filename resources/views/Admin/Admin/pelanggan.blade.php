@extends('layout.admin.nav')

@section('content')
    @include('komponen.notif')

    <section class="content-header">
        <div class="container-fluid">
            <h1>Data User</h1>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
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
                                <th>Aksi</th>
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
                                    <td>
                                        @if ($user->role !== 'admin')
                                            <form action="{{ route('pelanggan.destroy', $user->id) }}" method="POST"
                                                style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Yakin ingin menghapus user ini?')">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        @else
                                            <span class="text-muted">Tidak bisa dihapus</span>
                                        @endif
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
        </div>
    </section>
@endsection
