<?php

use App\Http\Controllers\Obat;
use App\Http\Controllers\Pasien;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::get('/pasien', [Pasien::class, 'index'])->name('pasien.index');
Route::post('/pasien', [Pasien::class, 'store'])->name('pasien.store');
Route::delete('/pasien/{id}', [Pasien::class, 'destroy'])->name('pasien.destroy');
Route::put('/pasien/{id}', [Pasien::class, 'update'])->name('pasien.update');
Route::get('/pasien/export/pdf/{id}', [Pasien::class, 'exportPdfPerData'])->name('pasien.exportPdfPerData');

Route::get('/obat', [Obat::class, 'index'])->name('obat.index');
Route::post('/obat', [Obat::class, 'store'])->name('obat.store');
Route::delete('/obat/{id}', [Obat::class, 'destroy'])->name('obat.destroy');
Route::put('/obat/{id}', [Obat::class, 'update'])->name('obat.update');
Route::get('/obat/export/pdf/{id}', [Obat::class, 'exportPdfPerData'])->name('obat.exportPdfPerData');