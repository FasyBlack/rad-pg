<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\OpdController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\RencanaAksiController;
use App\Http\Controllers\StrategiController;
use App\Models\Opd;

Route::get('/', [ClientController::class, 'index'])->name('dashboard');


Route::get('/strategi', [StrategiController::class, 'index'])->name('strategi');
Route::post('/strategi-store', [StrategiController::class, 'store'])->name('strategi.store');
Route::put('/strategi-update/{id}', [StrategiController::class, 'update'])->name('strategi.update');
Route::delete('/strategi-destroy/{id}', [StrategiController::class, 'destroy'])->name('strategi.destroy');


Route::get('/rencana-aksi', [RencanaAksiController::class, 'index'])->name('rencanaAksi');
Route::get('/rencana-aksi-create', [RencanaAksiController::class, 'create'])->name('rencana_aksi.create');
Route::post('/rencana-aksi-store', [RencanaAksiController::class, 'store'])->name('rencana_aksi.store');
Route::put('/rencana-aksi-update/{id}', [RencanaAksiController::class, 'update'])->name('rencana_aksi.update');
Route::delete('/rencana-aksi-store/{id}', [RencanaAksiController::class, 'destroy'])->name('rencana_aksi.destroy');

Route::get('/rencana-kerja', [ClientController::class, 'rencanakerja'])->name('rencanakerja');
Route::get('/monev', [ClientController::class, 'monev'])->name('monev');
Route::get('/progres', [ClientController::class, 'progres'])->name('progres');
Route::get('/profile', [ClientController::class, 'profile'])->name('profile');
Route::get('/pengguna', [PenggunaController::class, 'profile'])->name('pengguna');


Route::get('/opd', [OpdController::class, 'index'])->name('opd');
Route::post('/opd-create', [OpdController::class, 'store'])->name('opd.store');
Route::put('/opd-update/{id}', [OpdController::class, 'update'])->name('opd.update');
Route::delete('/opd-delete{id}', [OpdController::class, 'destroy'])->name('opd.destroy');

