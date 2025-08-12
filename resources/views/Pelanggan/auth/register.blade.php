@extends('layouts.app')

@section('content')
    <div class="min-vh-100 d-flex align-items-center justify-content-center"
        style="background: linear-gradient(to right bottom, #8e2de2, #ca6f81);">
        <div class="card shadow-lg p-4" style="width: 100%; max-width: 500px; border-radius: 1.5rem;">
            <h2 class="text-center mb-4 fw-bold" style="color: #640D5F;">Kenzo Laundry</h2>

            {{-- SweetAlert Notif --}}
            @include('komponen.notif')

            <form method="POST" action="{{ route('pelanggan.register.proses') }}">
                @csrf

                <div class="mb-3">
                    <label for="nama" class="form-label fw-semibold">Nama Lengkap</label>
                    <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama') }}"
                        required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label fw-semibold">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}"
                        required>
                </div>

                <div class="mb-3">
                    <label for="no_hp" class="form-label fw-semibold">Nomor HP</label>
                    <input type="text" name="no_hp" id="no_hp" class="form-control" value="{{ old('no_hp') }}"
                        required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label fw-semibold">Password</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label fw-semibold">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control"
                        required>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary" style="background-color: #640D5F; border: none;">
                        Daftar
                    </button>
                </div>
            </form>

            <p class="text-center mt-4 small text-muted">
                Sudah punya akun?
                <a href="{{ route('pelanggan.login') }}" class="text-decoration-none text-danger fw-semibold">
                    Login di sini
                </a>
            </p>
        </div>
    </div>
@endsection
