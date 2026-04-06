<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use app\App\Http\Controllers\PeminjamanController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

route::middleware('auth')->group(function () {
    Route::resource('buku',BukuController::class);
});

// Proses kembaliin buku
Route::post('/kembali/{id}', [App\Http\Controllers\PeminjamanController::class, 'kembali'])->name('kembali.buku');

// Halaman rekap buat Admin
Route::get('/admin/peminjaman', [App\Http\Controllers\PeminjamanController::class, 'index'])->name('admin.peminjaman');

Route::post('/pinjam/{id}', [App\Http\Controllers\PeminjamanController::class, 'pinjam'])->name('pinjam.buku');

Route::get('/siswa/katalog', [App\Http\Controllers\BukuController::class, 'halamanSiswa'])->name('siswa.katalog');
require __DIR__.'/auth.php';
// Halaman buat Siswa liat buku apa aja yang dia bawa
Route::get('/riwayat-pinjam', [\App\Http\Controllers\PeminjamanController::class, 'riwayat'])->name('riwayat.pinjam');
Route::post('/admin/setujui/{id}', [\App\Http\Controllers\PeminjamanController::class, 'setujui'])->name('admin.setujui');
Route::post('/admin/tolak/{id}', [\App\Http\Controllers\PeminjamanController::class, 'tolak'])->name('admin.tolak');