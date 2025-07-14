<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingpageController;
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



Route::get('/order', [DashboardController::class, 'order'])->name('order');
Route::get('/laporan', [DashboardController::class, 'laporan'])->name('laporan');
Route::get('/pembayaran', [DashboardController::class, 'pembayaran'])->name('pembayaran');
Route::get('/kurir', [DashboardController::class, 'kurir'])->name('kurir');
// pelanggan
Route::get('/pelanggang', [DashboardController::class, 'pelanggan'])->name('pelanggan');
Route::delete('/pelanggang/{id}', [DashboardController::class, 'hapusPelanggan'])->name('pelanggan.destroy');





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
