<?php

use App\Http\Controllers\Api\AlunoController;
use App\Http\Controllers\Api\DisciplinaNotaController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\MatriculaController;
use App\Http\Controllers\Api\NotasController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;


Route::post('/login', [LoginController::class, 'login'])->name('login'); // GET http://localhost:8000/api/login

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::post('/logout', [LoginController::class, 'logout']); // GET http://localhost:8000/api/logout

    Route::get('/users', [UserController::class, 'index']); //GET http://localhost:8000/api/users?page=1
    Route::get('/users/{user}', [UserController::class, 'show']); // GET http://localhost:8000/api/users/1
    Route::post('/users', [UserController::class, 'store']); // POST http://localhost:8000/api/users
    Route::put('/users', [UserController::class, 'update']); // PUT http://localhost:8000/api/users
    Route::delete('/users', [UserController::class, 'destroy']); // DELETE http://localhost:8000/api/users

    Route::get('/aluno', [AlunoController::class, 'index']);  // GET http://localhost:8000/api/aluno
    Route::get('/aluno/matriculas', [MatriculaController::class, 'index']); // GET http://localhost:8000/api/aluno/matriculas

    Route::get('/disciplinas/{disciplina}/notas', [DisciplinaNotaController::class, 'notas']); // GET http://localhost:8000/api/disciplinas/1/notas
});
