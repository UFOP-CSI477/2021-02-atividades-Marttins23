<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::resources([
   'tarefas' => \App\Http\Controllers\TarefaController::class
]);

Route::middleware(\App\Http\Middleware\Autenticador::class)->group(function() {
    Route::get('/perfil', [\App\Http\Controllers\UserController::class, 'show'])->name('users.show');
    Route::get('/add-pontos', [\App\Http\Controllers\UserController::class, 'addPontuacao'])->name('users.addPontuacao');
    Route::get('/retira-pontos', [\App\Http\Controllers\UserController::class, 'retiraPontuacao'])->name('users.retiraPontuacao');
    Route::get('/', [\App\Http\Controllers\TarefaController::class, 'index'])->name('tela-inicial');
    Route::post('/tarefas/{id}/concluir',  [\App\Http\Controllers\TarefaController::class, 'concluir'])->name('tarefas.concluir');
});

Route::get('/login', [\App\Http\Controllers\LoginController::class, 'index'])->name('login');
Route::post('/login', [\App\Http\Controllers\LoginController::class, 'store'])->name('signin');
Route::get('/logout', [\App\Http\Controllers\LoginController::class, 'destroy'])->name('logout');
Route::get('/ranking', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');
Route::get('/registrar', [\App\Http\Controllers\UserController::class, 'create'])->name('users.create');
Route::post('/registrar', [\App\Http\Controllers\UserController::class, 'store'])->name('users.store');
