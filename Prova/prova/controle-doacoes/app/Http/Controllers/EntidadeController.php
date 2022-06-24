<?php

namespace App\Http\Controllers;

use App\Models\Entidade;
use Illuminate\Http\Request;

class EntidadeController extends Controller
{
    public function index()
    {
        $entidades = Entidade::query()->orderBy('nome')->get();
        return view('entidades.index')->with('entidades', $entidades);
    }

    public function create()
    {
        return view('entidades.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => ['required', 'min:3'],
            'bairro' => ['required', 'min:3'],
            'cidade' => ['required', 'min:3', 'alpha'],
            'estado' => ['required', 'min:2', 'max:2', 'alpha']
        ]);

        Entidade::create($request->except('_token'));

        return to_route('entidades.index')
            ->with('mensagem', "Entidade ' $request->nome ' criada com sucesso!" );

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {

    }

    public function update(Request $request, Entidade $entidade)
    {

    }

    public function destroy(Entidade $entidade)
    {
        $entidade->delete();

        return to_route('entidades.index')
            ->with('mensagem', "Entidade ' $entidade->nome' excluída com sucesso!");
    }
}
