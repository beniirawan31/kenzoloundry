@extends('layouts.app')

@section('content')
    <div class="min-vh-100 d-flex align-items-center justify-content-center"
        style="background: linear-gradient(to right bottom, #8e2de2, #ca6f81);">
        <div class="card shadow-lg p-4" style="width: 100%; max-width: 400px; border-radius: 1.5rem;">
            <h2 class="text-center mb-4 fw-bold" style="color: #640D5F;">Kenzo Laundry</h2>
            <h4 class="text-center  fw-bold" style="color: #640D5F;">Pelanggan</h4>

            {{-- SweetAlert Notif --}}
            @include('komponen.notif')

            <form method="POST" action="{{ route('pelanggan.login.proses') }}">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label fw-semibold">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}"
                        required autofocus>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label fw-semibold">Password</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember">
                        <label class="form-check-label small" for="remember">Ingat saya</label>
                    </div>
                    <a href="#" class="small text-decoration-none text-danger">Lupa Password?</a>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary" style="background-color: #640D5F; border: none;">
                        Login
                    </button>
                </div>
            </form>

            <p class="text-center mt-4 small text-muted">
                Belum punya akun?
                <a href="{{ route('pelanggan.register') }}" class="text-decoration-none text-danger fw-semibold">
                    Daftar Sekarang
                </a>
            </p>
        </div>
    </div>
@endsection
