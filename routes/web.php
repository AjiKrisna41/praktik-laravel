<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\SuratKeluarController;
use App\Http\Controllers\SuratMasukController;
use Illuminate\Support\Facades\Route;

// ===== Hanya untuk tamu (belum login) =====
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
});

// ===== Wajib login =====
Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    // ----- Surat Masuk -----
    // Ubah data (petugas saja), didaftarkan lebih dulu agar /create tidak dianggap {id}
    Route::resource('surat-masuk', SuratMasukController::class)
        ->except(['index', 'show'])
        ->parameters(['surat-masuk' => 'id'])
        ->middleware('can:manage-letters');

    // Baca saja (semua pengguna yang login)
    Route::resource('surat-masuk', SuratMasukController::class)
        ->only(['index', 'show'])
        ->parameters(['surat-masuk' => 'id']);

    // ----- Surat Keluar (latihan mandiri P5) -----
    Route::resource('surat-keluar', SuratKeluarController::class)
        ->except(['index', 'show'])
        ->parameters(['surat-keluar' => 'id'])
        ->middleware('can:manage-letters');

    Route::resource('surat-keluar', SuratKeluarController::class)
        ->only(['index', 'show'])
        ->parameters(['surat-keluar' => 'id']);
});