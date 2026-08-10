
<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Importa o Controller da alunos
use App\Http\Controllers\AlunosController;
 
// Rota GET - usada para buscar/listar alunos
// Quando acessada, chama a função index() do Controller
Route::get('/alunos', [AlunosController::class, 'index']);
 
// Rota POST - usada para cadastrar uma alunos
// Quando acessada, chama a função store() do Controller
Route::post('/alunos', [AlunosController::class, 'store']);
 
// Rota DELETE - usada para excluir uma alunos
// Envia o ID para a função destroy() do Controller
Route::delete('/alunos/{id}', [AlunosController::class, 'destroy']);
