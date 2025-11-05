<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\MonevController;
use App\Http\Controllers\OpdController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\RencanaAksiController;
use App\Http\Controllers\RencanaKerjaController;
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
Route::get('/rencana-aksi-edit/{id}', [RencanaAksiController::class, 'edit'])->name('rencana_aksi.edit');
Route::put('/rencana-aksi-update/{id}', [RencanaAksiController::class, 'update'])->name('rencana_aksi.update');
Route::delete('/rencana-aksi-store/{id}', [RencanaAksiController::class, 'destroy'])->name('rencana_aksi.destroy');

Route::get('/rencana-kerja', [RencanaKerjaController::class, 'index'])->name('rencanakerja');
Route::get('/rencana-kerja-create', [RencanaKerjaController::class, 'create'])->name('rencana_kerja.create');
Route::post('/rencana-kerja-store', [RencanaKerjaController::class, 'store'])->name('rencana_kerja.store');
Route::get('/rencana-kerja-edit/{id}', [RencanaKerjaController::class, 'edit'])->name('rencana_kerja.edit');
Route::put('/rencana-kerja-update/{id}', [RencanaKerjaController::class, 'update'])->name('rencana_kerja.update');
Route::delete('/rencana-kerja-delete/{id}', [RencanaKerjaController::class, 'destroy'])->name('rencana_kerja.destroy');


Route::get('/monev', [MonevController::class, 'index'])->name('monev');
Route::get('/monev-create', [MonevController::class, 'create'])->name('monev.create');
Route::post('/monev-store', [MonevController::class, 'store'])->name('monev.store');
Route::get('/monev-edit/{id}', [MonevController::class, 'edit'])->name('monev.edit');
Route::put('/monev-update/{id}', [MonevController::class, 'update'])->name('monev.update');
Route::delete('/monev-delete/{id}', [MonevController::class, 'destroy'])->name('monev.destroy');



Route::get('/progres', [ClientController::class, 'progres'])->name('progres');
Route::get('/profile', [ClientController::class, 'profile'])->name('profile');
Route::get('/pengguna', [PenggunaController::class, 'profile'])->name('pengguna');


Route::get('/opd', [OpdController::class, 'index'])->name('opd');
Route::post('/opd-create', [OpdController::class, 'store'])->name('opd.store');
Route::put('/opd-update/{id}', [OpdController::class, 'update'])->name('opd.update');
Route::delete('/opd-delete{id}', [OpdController::class, 'destroy'])->name('opd.destroy');

