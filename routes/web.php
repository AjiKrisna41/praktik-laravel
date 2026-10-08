<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuratMasukController;

Route::get('/', function () {
    return view('index');
});

// Route::get('/surat-masuk', function () {
//     return 'Halaman Surat Masuk';
// });

// Route::get('/surat-masuk/{id}', function ($id) {
//     return 'Detail Surat Masuk dengan ID: ' . $id;
// });

// Route::get('/surat-masuk', function () {
//     return 'Halaman Surat Masuk';
// })->name('surat-masuk.index');

// Route::get('/surat-masuk/{id}', function ($id) {
//     return 'Detail Surat Masuk dengan ID: ' . $id;
// })->name('surat-masuk.show');

Route::get('/surat-masuk', [SuratMasukController::class, 'index'])->name('surat-masuk.index');
Route::get('/surat-masuk/{id}', [SuratMasukController::class, 'show'])->name('surat-masuk.show');
