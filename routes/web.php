<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CamisetasController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/camisetas/{id}', [HomeController::class, 'show'])->name('camisetas.show');

Route::get('/camisetas/{id}/edit', [CamisetasController::class, 'edit'])->name('camisetas.edit');

Route::put('/camisetas/{id}', [CamisetasController::class, 'update'])->name('camisetas.update');

Route::put('/camisetas/{id}/actualizar-stock', [CamisetasController::class, 'actualizarStock'])->name('camisetas.actualizarStock');

Route::delete('/camisetas/{id}', [CamisetasController::class, 'destroy'])->name('camisetas.destroy');

Route::get('/create', [CamisetasController::class, 'create'])->name('camisetas.create');

Route::post('/camisetas', [CamisetasController::class, 'store'])->name('camisetas.store');
