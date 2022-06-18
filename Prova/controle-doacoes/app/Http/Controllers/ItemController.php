<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::query()->orderBy('descricao')->get();
        return view('items.index')->with('items', $items);
    }

    public function create()
    {
        return view('items.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'descricao' => ['required', 'min:3']
        ]);

        Item::create($request->only('descricao'));

        return to_route('items.index')
            ->with('mensagem', "Item ' $request->descricao ' criado com sucesso!");
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {

    }

    public function update(Request $request, Item $item)
    {

    }

    public function destroy(Item $item)
    {

    }
}
