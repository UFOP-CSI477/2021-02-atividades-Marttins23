<?php

use App\Http\Controllers\TarefaController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::controller(TarefaController::class)->group(function() {
    Route::post('/tarefas/{id}/concluir',  'concluir')->name('tarefas.concluir');
    Route::get('/tarefas/concluidas', 'mostrarConcluidas')->name('tarefas.concluidas');
});

Route::resources([
   'tarefas' => TarefaController::class
]);
