<?php

namespace App\Http\Controllers;

use App\Models\Equipamento;
use Illuminate\Support\Facades\DB;

class AreaGeralController
{
    public function index()
    {
        $registros = DB::table('registros')
            ->join('users', 'users.id', '=', 'registros.users_id')
            ->join('equipamentos', 'equipamentos.id', '=', 'registros.equipamentos_id')
            ->select('registros.datalimite', 'registros.tipo', 'registros.descricao', 'users.name', 'equipamentos.nome')
            ->orderBy('registros.datalimite')
            ->get();

        $equipamentos = Equipamento::query()->orderBy('nome')->get();

        return view('area-geral')->with('registros', $registros)->with('equipamentos', $equipamentos);
    }

}
