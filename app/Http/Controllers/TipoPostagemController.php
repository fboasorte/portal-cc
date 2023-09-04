<?php

namespace App\Http\Controllers;

use App\Models\TipoPostagem;
use Illuminate\Http\Request;

class TipoPostagemController extends Controller
{
    public function index()
    {
        $tipo_postagens = TipoPostagem::all();
        return view('tipo-postagem.index')->with('tipo_postagens', $tipo_postagens);
    }

    public function create()
    {
        return view('tipo-postagem.create');
    }

    public function store(Request $request)
    {
        TipoPostagem::create([
            'nome' => $request->nome
        ]);

        return "Tipo Postagem Criado com Sucesso";
    }

    public function edit($id)
    {
        $tipo_postagem =  TipoPostagem::findOrFail($id);
        return view('tipo-postagem.edit', ['tipo_postagem' => $tipo_postagem]);
    }

    public function update(Request $request, $id)
    {
        $tipo_postagem =  TipoPostagem::findOrFail($id);

        $tipo_postagem->update([
            'nome' => $request->nome
        ]);


        return "Tipo Postagem Atualizado com Sucesso";
    }
}
