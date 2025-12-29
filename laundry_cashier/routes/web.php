<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\KasirDashboardController;
use App\Http\Controllers\TransaksiController; 
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\LaporanPenjualanController;


// ======================
// HALAMAN OPENING
// ======================
Route::get('/', function () {
    return view('laundry.login');
})->name('opening');

// ======================
// LOGIN KASIR
// ======================
Route::get('/login-kasir', [LoginController::class, 'showLoginKasir'])
    ->name('login.kasir');

Route::post('/login-kasir', [LoginController::class, 'loginKasir'])
    ->name('login.kasir.process');

// ======================
// ROUTE KASIR (AUTH)
// ======================
Route::middleware(['auth'])->group(function () {

    Route::get('/kasir/dashboard', [KasirDashboardController::class, 'index'])
        ->name('kasir.dashboard');

    Route::get('/kasir/transaksi-penjualan', [TransaksiController::class, 'index'])
        ->name('kasir.transaksi');

    Route::get('/kasir/transaksi-penjualan/create', [TransaksiController::class, 'create'])
        ->name('kasir.transaksi.create');

    Route::post('/kasir/transaksi', [TransaksiController::class, 'store'])
        ->name('kasir.transaksi.store');


    Route::get('/transaksi/{id}/edit', [TransaksiController::class, 'edit'])
        ->name('kasir.transaksi.edit');


    Route::put('/transaksi/{id}', [TransaksiController::class, 'update'])
        ->name('kasir.transaksi.update');

        
    Route::delete('/transaksi/{id}', [TransaksiController::class, 'destroy'])
        ->name('kasir.transaksi.destroy');

     Route::get('/laundry/pelanggan', [PelangganController::class, 'index'])
    ->name('pelanggan.index');

Route::get('/laundry/pelanggan/{id}/edit', [PelangganController::class, 'edit'])
    ->name('pelanggan.edit');

Route::put('/laundry/pelanggan/{id}', [PelangganController::class, 'update'])
    ->name('pelanggan.update');

Route::delete('/laundry/pelanggan/{id}', [PelangganController::class, 'destroy'])
    ->name('pelanggan.destroy');

Route::get('laundry/pelanggan/create', [PelangganController::class, 'create'])
    ->name('pelanggan.create');

Route::post('laundry/pelanggan', [PelangganController::class, 'store'])
    ->name('pelanggan.store');

    Route::get('/laporan-penjualan', [LaporanPenjualanController::class, 'index'])
    ->name('laporan.penjualan');


    Route::get('/logout', [LoginController::class, 'logout'])
        ->name('logout');

Route::get(
    '/laporan-penjualan/pdf',
    [LaporanPenjualanController::class, 'downloadPdf']
)->name('laporan.penjualan.pdf');

Route::get('/kasir/transaksi/{id}/pdf', 
    [TransaksiController::class, 'pdf']
)->name('kasir.transaksi.pdf');

});
