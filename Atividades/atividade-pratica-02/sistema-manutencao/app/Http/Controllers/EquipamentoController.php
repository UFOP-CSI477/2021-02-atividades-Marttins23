<?php

namespace App\Http\Controllers;

use App\Models\Equipamento;
use App\Http\Requests\StoreEquipamentoRequest;
use App\Http\Requests\UpdateEquipamentoRequest;
use Illuminate\Http\Request;

class EquipamentoController extends Controller
{

    public function index()
    {
        $equipamentos = Equipamento::query()->orderBy('nome')->get();
        return view('equipamentos.index')->with('equipamentos', $equipamentos);
    }

    public function create()
    {
        return view('equipamentos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => ['required', 'min:3']
        ]);

        Equipamento::create($request->only('nome'));

        return to_route('equipamentos.index')
            ->with('mensagem', "Equipamento ' $request->nome ' cadastrado com sucesso!");
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Equipamento  $equipamento
     * @return \Illuminate\Http\Response
     */
    public function show(Equipamento $equipamento)
    {
        //
    }

    public function edit($id)
    {
        $equipamento = Equipamento::find($id);

        return view('equipamentos.edit')->with('equipamento', $equipamento);
    }

    public function update(Request $request, Equipamento $equipamento)
    {
        $request->validate([
           'nome' => ['required', 'min:3']
        ]);

        $equipamento->fill($request->all());
        $equipamento->save();

        return to_route('equipamentos.index')
            ->with('mensagem', "Equipamento ' $request->nome ' editado com sucesso!");
    }

    public function destroy(Equipamento $equipamento)
    {
        $equipamento->delete();

        return to_route('equipamentos.index')
            ->with('mensagem', "Equipamento ' $equipamento->nome ' excluído com sucesso!");
    }
}
