<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Autenticador;
use App\Models\Tarefa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TarefaController extends Controller
{
    public function __construct()
    {
        $this->middleware(Autenticador::class);
    }

    public function index()
    {
        $tarefas_nao_concluidas = Tarefa::query()->where('users_id', Auth::id())->where('concluida', false)->orderBy('descricao')->get();
        $tarefas_concluidas = Tarefa::query()->where('users_id', Auth::id())->where('concluida', true)->orderBy('descricao')->get();
        return view('tarefas.index')->with(['tarefas_nao_concluidas' => $tarefas_nao_concluidas, 'tarefas_concluidas' => $tarefas_concluidas]);
    }

    public function create()
    {
        return view('tarefas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'descricao' => ['required', 'min:3']
        ]);

        $request->request->add(['users_id' => Auth::id()]);
        Tarefa::create($request->only('descricao', 'users_id'));

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

        if(Auth::id() != $tarefa->users_id) {
            return redirect()->back()->with('mensagem', 'Ação negada!');
        }

        return view('tarefas.edit')->with('tarefa', $tarefa);
    }

    public function update(Request $request, Tarefa $tarefa)
    {
        $request->validate([
           'descricao' => ['required', 'min:3']
        ]);


        $desmarcouTarefaConcluida = ($request->concluida != $tarefa->concluida) && (isset($request->concluida));
        $tarefa->fill($request->all());
        $tarefa->save();

        if($desmarcouTarefaConcluida) {
            return to_route('users.retiraPontuacao')
                ->with('mensagem', "Tarefa ' $tarefa->descricao ' editada com sucesso!");
        }
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

        return to_route('users.addPontuacao')
            ->with('mensagem', "Tarefa ' $tarefa->descricao ' concluída concluída com sucesso!");
    }

}
