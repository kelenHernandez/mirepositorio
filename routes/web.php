<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\librosController;
use App\Http\Controllers\usuariosController;
use App\Http\Controllers\prestamosController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('PaginaP');
})->name('principal');

/*Libros */
Route::get('/indexLibro', [librosController::class, 'index'])->name('libro.index');
Route::get('/crearLibros', [librosController::class, 'create'])->name('libros.create');
Route::post('/indexLibro', [librosController::class, 'store'])->name('libros.store');
Route::get('/indexLibro/{libro}/edit', [librosController::class, 'edit'])->name('libros.edit');
Route::put('/indexLibro/{libro}', [librosController::class, 'update'])->name('libros.update');
Route::delete('/indexLibro/{libro}', [librosController::class, 'destroy'])->name('libros.destroy');
Route::get('/buscar', [librosController::class, 'buscar'])->name('libros.buscar');

/*Usuarios */
Route::get('/usuarioIndex', [usuariosController::class, 'index'])->name('usuario.index');
Route::get('/usuarioCrear', [usuariosController::class, 'create'])->name('usuario.create');
Route::post('/usuarioIndex', [usuariosController::class, 'store'])->name('usuario.store');
Route::get('/usuarioIndex/{usuario}/edit', [usuariosController::class, 'edit'])->name('usuario.edit');
Route::put('/usuarioIndex/{usuario}', [usuariosController::class, 'update'])->name('usuario.update');
Route::delete('/usuarioIndex/{usuario}', [usuariosController::class, 'destroy'])->name('usuario.destroy');
Route::get('/buscarUsuario', [usuariosController::class, 'buscar'])->name('usuarios.buscar');


/*Prestamos */
Route::get('/indexPrestamo', [prestamosController::class, 'index'])->name('prestamo.index');
Route::get('/crearPrestamo', [prestamosController::class, 'create'])->name('prestamo.create');
Route::post('/prestamos', [prestamosController::class, 'store'])->name('prestamos.store');
Route::get('/indexPrestamo/{prestamo}/edit', [prestamosController::class, 'edit'])->name('prestamo.edit');
Route::put('/indexPrestamo/{prestamo}', [prestamosController::class, 'update'])->name('prestamos.update');
Route::delete('/indexPrestamo/{prestamo}', [prestamosController::class, 'destroy'])->name('prestamo.destroy');
Route::get('/buscarPrestamo', [prestamosController::class, 'buscar'])->name('prestamo.buscar');


