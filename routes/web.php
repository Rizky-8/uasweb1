<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\SukuCadangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PemasokController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OperatorController;

// Rute untuk menampilkan form login
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');

// Rute untuk memproses login
Route::post('login', [LoginController::class, 'login']);

// Rute untuk logout
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Rute untuk halaman home
Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');

// Rute untuk Admin
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/suku-cadang', [AdminController::class, 'indexSukuCadang'])->name('suku_cadang.index');
    Route::get('/admin/kategori', [AdminController::class, 'indexKategori'])->name('kategori.index');
    Route::get('/admin/pemasok', [AdminController::class, 'indexPemasok'])->name('pemasok.index');
    
    // Rute resource untuk admin
    Route::resource('suku_cadang', SukuCadangController::class);
    Route::resource('kategori', KategoriController::class);
    Route::resource('pemasok', PemasokController::class);
});

// Rute untuk Operator
Route::middleware(['auth', 'operator'])->group(function () {
    Route::get('/operator/transaksi', [OperatorController::class, 'indexTransaksi'])->name('transaksi.index');
    
    // Rute resource untuk operator
    Route::resource('transaksi', TransaksiController::class);
});

// Rute untuk autentikasi (register, password reset, dll)
Auth::routes();