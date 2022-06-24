<?php

namespace App\Http\Controllers;

use App\Models\Equipamento;
use App\Models\Registro;
use App\Http\Requests\StoreRegistroRequest;
use App\Http\Requests\UpdateRegistroRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegistroController extends Controller
{
    public function index()
    {
        $registros = DB::table('registros')
            ->join('users', 'users.id', '=', 'registros.users_id')
            ->join('equipamentos', 'equipamentos.id', '=', 'registros.equipamentos_id')
            ->select('registros.*', 'users.name', 'equipamentos.nome')
            ->orderBy('registros.id')
            ->get();

        return view('registros.index')->with('registros', $registros);
    }

    public function create()
    {
        $users = User::query()->orderBy('id')->get();
        $equipamentos = Equipamento::query()->orderBy('id')->get();
        return view('registros.create')->with('users', $users)->with('equipamentos', $equipamentos);
    }

    public function store(Request $request)
    {
        $request->validate([
            'equipamentos_id' => ['required'],
            'users_id' => ['required'],
            'tipo' => ['required'],
            'datalimite' => ['required'],
            'descricao' => ['required', 'min:3'],
        ]);

        Registro::create($request->except('_token'));

        return to_route('registros.index')->with('mensagem', "Manutenção registrada com sucesso!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Registro  $registro
     * @return \Illuminate\Http\Response
     */
    public function show(Registro $registro)
    {
        //
    }


    public function edit($id)
    {
        $users = User::query()->orderBy('id')->get();
        $equipamentos = Equipamento::query()->orderBy('id')->get();
        $registro = Registro::find($id);

        return view('registros.edit')
            ->with('registro', $registro)->with('users', $users)->with('equipamentos', $equipamentos);
    }


    public function update(Request $request, Registro $registro)
    {
        $registro->fill($request->all());
        $registro->save();

        return to_route('registros.index')
            ->with('mensagem', "Registro ' $request->descricao ' editado com sucesso!");
    }


    public function destroy(Registro $registro)
    {
        $registro->delete();

        return to_route('registros.index')->with('mensagem', "Registro excluído com sucesso!");
    }
}
