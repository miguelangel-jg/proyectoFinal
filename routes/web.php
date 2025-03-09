<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CamisetasController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');  // Página principal

// Ruta para ver los detalles de una camiseta
Route::get('/camisetas/{id}', [HomeController::class, 'show'])->name('camisetas.show');

// Rutas para CRUD de camisetas
Route::get('/camisetas/{id}/edit', [CamisetasController::class, 'edit'])->name('camisetas.edit');
// Ruta para actualizar los datos completos de la camiseta
Route::put('/camisetas/{id}', [CamisetasController::class, 'update'])->name('camisetas.update');

// Ruta para actualizar solo el stock de la camiseta
Route::put('/camisetas/{id}/actualizar-stock', [CamisetasController::class, 'actualizarStock'])->name('camisetas.actualizarStock');

Route::delete('/camisetas/{id}', [CamisetasController::class, 'destroy'])->name('camisetas.destroy');

// Ruta para mostrar el formulario de creación de una nueva camiseta
Route::get('/create', [CamisetasController::class, 'create'])->name('camisetas.create');

// Ruta para almacenar la nueva camiseta
Route::post('/camisetas', [CamisetasController::class, 'store'])->name('camisetas.store');
