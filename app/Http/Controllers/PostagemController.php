<?php

namespace App\Http\Controllers;

use App\Models\Postagem;
use App\Models\TipoPostagem;
use Illuminate\Http\Request;

class PostagemController extends Controller
{
    public function index()
    {
        $postagens = Postagem::all();
        return view('postagem.index')->with('postagens', $postagens);
    }

    public function create()
    {
        $tipo_postagens = TipoPostagem::p('nome', 'id');

        $id = 1;

        return view('postagem.create', compact('tipo_postagens', 'id'));
    }

    public function store(Request $request)
    {
        Postagem::create([
            'titulo' => $request->titulo,
            'texto' => $request->texto,
            'tipo_postagem_id' => $request->tipo_postagem_id,
            'arquivo' => $request->arquivo,
            'imagem' => $request->imagem,
        ]);

        return "Postagem Criada com Sucesso";
    }

    public function edit($id)
    {
        $postagem =  Postagem::findOrFail($id);
        $tipo_postagens = TipoPostagem::pluck('nome', 'id');

        return view('postagem.edit', ['postagem' => $postagem, 'tipo_postagens' => $tipo_postagens]);
    }

    public function update(Request $request, $id)
    {
        $postagem =  Postagem::findOrFail($id);

        $postagem->update([
            'titulo' => $request->titulo,
            'texto' => $request->texto,
            'tipo_postagem_id' => $request->tipo_postagem_id,
            'arquivo' => $request->arquivo,
            'imagem' => $request->imagem,
        ]);


        return "Postagem Atualizada com Sucesso";
    }
}
