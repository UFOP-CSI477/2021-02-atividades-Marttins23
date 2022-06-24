<?php

namespace App\Http\Controllers;

use App\Models\Coleta;
use App\Models\Entidade;
use App\Models\Item;
use Illuminate\Http\Request;

class ColetaController extends Controller
{
    public function index()
    {
        $coletas = Coleta::query()->get();
        return view('coletas.index')->with('coletas', $coletas);
    }

    public function create()
    {
        $items = Item::query()->orderBy('id')->get();
        $entidades = Entidade::query()->orderBy('id')->get();
        return view('coletas.create')->with('items', $items)->with('entidades', $entidades);
    }

    public function store(Request $request)
    {
        $request->validate([
            'quantidade' => ['required', 'gt:0']
        ]);

        Coleta::create($request->except('_token'));

        return to_route('coletas.index')->with('mensagem', "A coleta foi criada com sucesso!");
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {

    }

    public function update(Request $request, Coleta $coleta)
    {

    }

    public function destroy(Coleta $coleta)
    {
        $coleta->delete();

        return to_route('coletas.index')->with('mensagem', "A coleta foi excluída com sucesso!");
    }
}
