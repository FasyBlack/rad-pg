<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;


Route::get('/', [ClientController::class, 'index'])->name('dashboard');


Route::get('/rencana-aksi', [ClientController::class, 'rencanaaksi'])->name('rencanaksi');

