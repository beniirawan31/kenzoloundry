<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ekspressController;
use App\Http\Controllers\LandingpageController;
use App\Http\Controllers\orderController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\AdminPembayaran;
use App\Http\Controllers\PimpinanController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Response;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/')
        ->with('success', 'Anda berhasil logout!');
})->name('logout');


Route::get('/adminlogin', [AdminController::class, 'login'])->name('login');
Route::post('/adminlogin', [AdminController::class, 'proses'])->name('login.proses');
Route::get('/adminregister', [AdminController::class, 'register'])->name('register');
Route::post('/adminregister', [AdminController::class, 'store'])->name('register.store');

//dashboard admin
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
// Layanan
Route::get('/layanan', [DashboardController::class, 'layanan'])->name('layanan');
Route::get('/layanan/create', [DashboardController::class, 'layananCreate'])->name('layanan.create');
Route::post('/layanan/store', [DashboardController::class, 'layananStore'])->name('layanan.store');
Route::get('/layanan/edit/{id}', [DashboardController::class, 'layananEdit'])->name('layanan.edit');
Route::put('/layanan/update/{id}', [DashboardController::class, 'layananUpdate'])->name('layanan.update');
Route::delete('/layanan/{id}', [DashboardController::class, 'destroy'])->name('layanan.destroy');




Route::get('/laporan', [DashboardController::class, 'laporan'])->name('laporan');
Route::get('/pembayaran', [DashboardController::class, 'pembayaran'])->name('pembayaran');
Route::get('/kurir', [DashboardController::class, 'kurir'])->name('kurir');
// pelanggan
// Tampilkan daftar pelanggan & user
Route::get('/pelanggan', [DashboardController::class, 'pelanggan'])->name('pelanggan');

// Hapus user & pelanggan
Route::delete('/admin/user/{id}', [DashboardController::class, 'hapusUser'])->name('user.destroy');
Route::delete('/admin/pelanggan/{id}', [DashboardController::class, 'hapusPelanggan'])->name('pelanggan.destroy');


//order
Route::prefix('order')->group(function () {
    Route::get('/', [OrderController::class, 'index'])->name('order');
    Route::post('/status/{id}', [OrderController::class, 'updateStatus']);
    Route::delete('/{id}', [OrderController::class, 'destroy'])->name('order.destroy');
    Route::get('/create', [OrderController::class, 'create'])->name('order.create');
    Route::post('/store', [OrderController::class, 'store'])->name('order.store');
});


//ekspres
Route::get('/ekspres', [ekspressController::class, 'index'])->name('ekspres');
Route::get('/pesanan/create', [ekspressController::class, 'create'])->name('pesanan.create');
Route::post('/pesanan/store', [ekspressController::class, 'store'])->name('pesanan.store');





//laporan
Route::get('/laporan/export/pdf-all', function () {
    $file = public_path('dummy/sample.pdf');
    return Response::download($file, 'laporan.pdf');
})->name('laporan.export.pdf.all');

Route::get('/laporan/export/word-all', function () {
    $file = public_path('dummy/sample.docx');
    return Response::download($file, 'laporan.docx');
})->name('laporan.export.word.all');


//landingpage
Route::get('/', [LandingpageController::class, 'index']);



//pelamggan
Route::get('/pelanggan/login', [PelangganController::class, 'login'])->name('pelanggan.login');
Route::post('/pelanggan/login', [PelangganController::class, 'loginProses'])->name('pelanggan.login.proses');
Route::get('/pelanggan/register', [PelangganController::class, 'register'])->name('pelanggan.register');
Route::post('/pelanggan/register', [PelangganController::class, 'registerProses'])->name('pelanggan.register.proses');
Route::get('/pelanggan/pembayaran', [PelangganController::class, 'pembayaranorder'])->name('pelanggan.pembayaran');
Route::post('/pelanggan/pembayaran/{id}', [PelangganController::class, 'uploadBuktiPembayaran'])->name('pelanggan.uploadBukti');



// Dashboard Pelanggan
Route::get('/pelanggan/dashboard', [PelangganController::class, 'dashboard'])
    ->name('pelanggan.dashboard')
    ->middleware('auth:pelanggan');

// pelangan order
Route::get('/pelanggan/order', [PelangganController::class, 'pelangganOrder'])->name('pelanggan.order.index');
Route::get('/pelanggan/create', [PelangganController::class, 'pelanggancreate'])->name('pelanggan.order.create');
Route::post('/pelanggan/order', [PelangganController::class, 'pelangganstore'])->name('pelanggan.order.store');

// Logout Pelanggan
Route::post('/pelanggan/logout', [PelangganController::class, 'logout'])->name('pelanggan.logout');


//BayarAdmin
Route::get('/pembayaran', [AdminPembayaran::class, 'index'])->name('pembayaran.index');
Route::post('/konfirmasi/{id}', [AdminPembayaran::class, 'konfirmasi'])->name('admin.konfirmasi');
Route::post('/tolak/{id}', [AdminPembayaran::class, 'tolak'])->name('admin.tolak');



// Login & Logout Pimpinan
Route::get('/pimpinanlogin', [PimpinanController::class, 'login'])->name('pimpinan.login');
Route::post('/pimpinan/login', [PimpinanController::class, 'proses'])->name('pimpinan.proses');
Route::post('/pimpinan/logout', [PimpinanController::class, 'logout'])->name('pimpinan.logout');
Route::get('/pimpinan/laporan/download/word', [PimpinanController::class, 'downloadWord'])->name('pimpinan.laporan.word');
Route::get('/pimpinan/laporan/download/pdf', [PimpinanController::class, 'downloadPdf'])->name('pimpinan.laporan.pdf');



// Halaman Pimpinan (hanya bisa diakses jika sudah login)
Route::middleware(['auth'])->group(function () {
    Route::get('/pimpinan', [PimpinanController::class, 'index'])->name('pimpinan.index');
    Route::get('/pimpinan/laporan', [PimpinanController::class, 'laporanPimpinan'])->name('pimpinan.laporan');
});