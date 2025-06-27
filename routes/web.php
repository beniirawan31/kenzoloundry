<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LandingpageController;
use Illuminate\Support\Facades\Route;

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


Route::get('/admin', [AdminController::class, 'index'])->name('admin');
Route::get('/adminlogin', [AdminController::class, 'login'])->name('login');
Route::post('/adminlogin', [AdminController::class, 'proses'])->name('login.proses');
Route::get('/adminregister', [AdminController::class, 'register'])->name('register');
Route::post('/adminregister', [AdminController::class, 'store'])->name('register.store');

//landingpage
Route::get('/', [LandingpageController::class, 'index']);
