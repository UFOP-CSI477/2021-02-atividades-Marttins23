<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController
{
    public function index()
    {
        $usuarios = User::query()->orderBy('pontuacao', 'desc')->get();
        return view('users.index')->with('usuarios', $usuarios);
    }

    public function show()
    {
        $usuario = User::find(Auth::id());
        return view('users.show')->with('usuario', $usuario);
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'min:3'],
            'password' => ['required', 'min:5']
        ]);

        $dados = $request->except(['_token']);
        $dados['password'] = Hash::make($dados['password']);
        $usuario = User::create($dados);
        Auth::login($usuario);
        return to_route('tarefas.index')->with('mensagem', 'Usuário criado com sucesso!');
    }

    public function addPontuacao()
    {
        $usuario = User::find(Auth::id());
        $usuario->pontuacao += 5;
        $usuario->save();

        return to_route('tarefas.index')->with('mensagem', session('mensagem'));
    }

    public function retiraPontuacao()
    {
        $usuario = User::find(Auth::id());
        $usuario->pontuacao -= 5;
        $usuario->save();

        return to_route('tarefas.index')->with('mensagem', session('mensagem'));
    }

}
