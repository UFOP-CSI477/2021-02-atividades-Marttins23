<?php

namespace App\Http\Controllers;

use App\Models\Registro;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class RelatorioController
{
    public function index()
    {
        $usuarios = User::query()->orderBy('name')->get();
        $registros = DB::table('registros')
            ->join('users', 'users.id', '=', 'registros.users_id')
            ->join('equipamentos', 'equipamentos.id', '=', 'registros.equipamentos_id')
            ->select('registros.*', 'users.name', 'equipamentos.nome')
            ->orderBy('registros.datalimite')
            ->get()
            ->groupBy('equipamentos_id');

        return view('relatorios')->with('registros', $registros)->with('usuarios', $usuarios);
    }
}
