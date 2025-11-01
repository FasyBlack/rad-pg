<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;


Route::get('/', [ClientController::class, 'index'])->name('dashboard');


Route::get('/rencana-aksi', [ClientController::class, 'rencanaaksi'])->name('rencanaksi');
Route::get('/rencana-kerja', [ClientController::class, 'rencanakerja'])->name('rencanakerja');
Route::get('/monev', [ClientController::class, 'monev'])->name('monev');
Route::get('/progres', [ClientController::class, 'progres'])->name('progres');
Route::get('/profile', [ClientController::class, 'profile'])->name('profile');

