@extends('layouts.app')

@section('content')
    <div class="min-vh-100 d-flex align-items-center justify-content-center"
        style="background: linear-gradient(to right bottom, #8e2de2, #ca6f81);">
        <div class="card shadow-lg p-4" style="width: 100%; max-width: 500px; border-radius: 1.5rem;">
            <h2 class="text-center mb-4 fw-bold" style="color: #640D5F;">Kenzo loundry</h2>

            @include('komponen.notif')

            <form method="POST" action="{{ route('register.store') }}">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label fw-semibold">Nama Lengkap</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}"
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
                    <label for="role" class="form-label fw-semibold">Daftar Sebagai</label>
                    <select name="role" id="role" class="form-control" required>
                        <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
                        <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="pimpinan" {{ old('role') == 'pimpinan' ? 'selected' : '' }}>pimpinan</option>
                    </select>
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
                <a href="{{ route('login') }}" class="text-decoration-none text-danger fw-semibold">Login di sini</a>
            </p>
        </div>
    </div>
@endsection
