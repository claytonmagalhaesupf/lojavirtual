<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;

class TypesController extends Controller
{
    public function index()
    {
        return view('types.index', [
            'types' => Type::all()
        ]);
    }

    public function create()
    {
        return view('types.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2|max:50',

        ]);

        Type::create([
            'name' => $request->name,

        ]);
        return redirect('/types')->with('success', 'Tipo cadastrado com sucesso!');
    }

    public function edit($id)
    {
        $type = Type::find($id);
        return view('types.edit', ['type' => $type]);
    }


    public function update(Request $request)
    {
        $type = Type::find($request->id);
        $type->update([
            'name' => $request->name
        ]);
        //nome da variavel de sessao é 'success'
        return redirect('/types')->with('success', 'Tipo atualizado com sucesso!');
    }
}
