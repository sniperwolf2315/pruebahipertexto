<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotaController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\EstudianteController;

Route::resource('notas', NotaController::class);
Route::resource('cursos', CursoController::class);
Route::resource('materias', MateriaController::class);
Route::resource('estudiantes', EstudianteController::class);

Route::get('/', function () {
    return view('welcome');
});
 