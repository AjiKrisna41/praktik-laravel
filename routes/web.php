<?php

use App\Http\Controllers\SuratKeluarController;
use App\Http\Controllers\SuratMasukController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

// Surat Masuk (CRUD lengkap, 7 route)
Route::resource('surat-masuk', SuratMasukController::class)
    ->parameters(['surat-masuk' => 'id']);

// Surat Keluar (tetap seperti P3 dulu; jadikan resource saat mengerjakan latihan mandiri)
Route::resource('surat-keluar', SuratKeluarController::class)
    ->parameters(['surat-keluar' => 'id']);