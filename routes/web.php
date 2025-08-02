<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\PenjualanController;

Auth::routes();

Route::get('/', function() {
    return redirect('/dashboard');
});

Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Master Data
    Route::resource('kategori', KategoriController::class)->except(['show']);
    Route::resource('obat', ObatController::class)->except(['show']);
    Route::resource('supplier', SupplierController::class)->except(['show']);

    // Obat Expired
    Route::get('/obat-expired', [ObatController::class, 'expired'])->name('obat-expired');
    Route::post('/obat-expired/{id}', [ObatController::class, 'hapus_expired'])->name('obat-expired.hapus');

    // Transaksi
    Route::resource('pembelian', PembelianController::class)->only(['create', 'store']);
    Route::resource('penjualan', PenjualanController::class)->only(['create', 'store']);

    // Only Admin can access this route
    Route::middleware('Admin')->group(function () {
        // Pengguna
        Route::resource('pengguna', UserController::class);

        // Laporan
        Route::controller(LaporanController::class)->group(function () {
            Route::get('/laporan/pembelian', 'pembelian')->name('laporan.pembelian');
            Route::get('/laporan/pembelian/show/{pembelian:id}', 'detail_pembelian')->name('laporan.pembelian.show');
            Route::get('/laporan/penjualan', 'penjualan')->name('laporan.penjualan');
            Route::get('/laporan/penjualan/show/{penjualan:id}', 'detail_penjualan')->name('laporan.penjualan.show');
            Route::get('/laporan/stok-obat', 'stok_obat')->name('laporan.stok-obat');
            Route::get('/laporan/laba', 'laba')->name('laporan.laba');
        });
    });
});
