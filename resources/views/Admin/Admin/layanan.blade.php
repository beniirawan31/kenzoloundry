@extends('layout.admin.nav')

@section('content')
    @include('komponen.notif')

    <!-- Content Header -->
    <section class="content-header">
        <div class="container-fluid">
            <h1>Layanan</h1>
        </div>
    </section>

    <!-- Main Content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card"
                        style="border-radius: 0.5rem; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); overflow: hidden;">
                        <div class="card-header d-flex justify-content-end align-items-center"
                            style="background-color: #320A6B; color: white; padding: 1rem 1.5rem;">
                            <a href="{{ route('layanan.create') }}" class="btn"
                                style="background-color: #78B9B5; color: white; border: none;">
                                <i class="fas fa-plus"></i> Tambah Layanan
                            </a>
                        </div>

                        <!-- Tabel -->
                        <div class="card-body">
                            <table class="table table-bordered table-hover text-center">
                                <thead style="background-color: #065084; color: white;">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Layanan</th>
                                        <th>Harga</th>
                                        <th>Satuan</th>
                                        <th class="text-start">Keterangan</th>
                                        <th>Foto</th> <!-- dipindah ke belakang -->
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($layanans as $index => $layanan)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $layanan->nama }}</td>
                                            <td>Rp {{ number_format($layanan->harga, 0, ',', '.') }}</td>
                                            <td>{{ $layanan->satuan ?? '-' }}</td>
                                            <td class="text-left">{{ $layanan->keterangan }}</td>
                                            <td>
                                                @if ($layanan->foto_layanan)
                                                    <img src="{{ asset('storage/' . $layanan->foto_layanan) }}"
                                                        alt="Foto Layanan" width="70" height="70"
                                                        style="object-fit: cover; border-radius: 8px;">
                                                @else
                                                    <span class="text-muted">-</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('layanan.edit', $layanan->id) }}"
                                                    class="btn btn-sm btn-warning">
                                                    <i class="fas fa-edit"></i>
                                                </a>

                                                <form action="{{ route('layanan.destroy', $layanan->id) }}" method="POST"
                                                    class="d-inline delete-form">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-sm btn-danger btn-delete">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7">Belum ada layanan tersedia.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteForms = document.querySelectorAll('.delete-form');

            deleteForms.forEach(form => {
                form.querySelector('.btn-delete').addEventListener('click', function(e) {
                    e.preventDefault();

                    Swal.fire({
                        title: 'Yakin ingin menghapus?',
                        text: "Data layanan ini tidak bisa dikembalikan!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#6c757d',
                        confirmButtonText: 'Ya, hapus!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>
@endsection
