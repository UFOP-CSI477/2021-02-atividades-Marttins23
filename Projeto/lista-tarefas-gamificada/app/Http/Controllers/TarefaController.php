<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use Illuminate\Http\Request;

class TarefaController extends Controller
{

    public function index()
    {
        $tarefas = Tarefa::query()->where('concluida', false)->orderBy('descricao')->get();
        return view('tarefas.index')->with('tarefas', $tarefas);
    }

    public function create()
    {
        return view('tarefas.create');
    }

    public function store(Request $request)
    {
        $request->request->add(['concluida' => false]);
        Tarefa::create($request->only('descricao', 'concluida'));

        return to_route('tarefas.index')
            ->with('mensagem', "Tarefa ' $request->descricao ' criada com sucesso!");
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $tarefa = Tarefa::find($id);

        return view('tarefas.edit')->with('tarefa', $tarefa);
    }

    public function update(Request $request, Tarefa $tarefa)
    {
        $tarefa->fill($request->all());
        $tarefa->save();

        return to_route('tarefas.index')
            ->with('mensagem', "Tarefa ' $tarefa->descricao ' editada com sucesso!");
    }

    public function destroy(Tarefa $tarefa)
    {
        $tarefa->delete();

        return to_route('tarefas.index')
            ->with('mensagem', "Tarefa ' $tarefa->descricao ' removida com sucesso!");
    }

    public function concluir($id)
    {
        $tarefa = Tarefa::find($id);
        $tarefa->concluida = true;
        $tarefa->save();

        return to_route('tarefas.index')
            ->with('mensagem', "Tarefa ' $tarefa->descricao ' concluída concluída com sucesso!");
    }

    public function mostrarConcluidas()
    {
        $tarefas = Tarefa::query()->where('concluida', true)->orderBy('descricao')->get();
        return view('tarefas.index')->with('tarefas', $tarefas);
    }

}
