<?php

namespace App\Http\Controllers;

use App\Models\ArquivoPostagem;
use App\Models\ImagemPostagem;
use App\Models\Postagem;
use App\Models\TipoPostagem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;

class PostagemController extends Controller
{
    public function index()
    {
        $postagens = Postagem::all();
        return view('postagem.index')->with('postagens', $postagens);
    }

    public function create()
    {
        $tipo_postagens = TipoPostagem::pluck('nome', 'id');

        $id = 1;

        return view('postagem.create', compact('tipo_postagens', 'id'));
    }

    public function store(Request $request)
    {
        $postagem = new Postagem([
            'titulo' => $request->titulo,
            'texto' => $request->texto,
            'tipo_postagem_id' => $request->tipo_postagem_id,
        ]);

        $postagem->save();

        if ($request->hasFile("imagens")) {
            $imagens = $request->file("imagens");

            foreach ($imagens as $imagem) {
                $imagemPostagem = new ImagemPostagem();
                $imagemPostagem->postagem_id = $postagem->id;
                $imagemPostagem->imagem = $imagem->store('ImagemPostagem/' . $postagem->id);
                $imagemPostagem->save();
                unset($imagemPostagem);
            }
        }

        if ($request->hasFile("arquivos")) {
            $arquivos = $request->file("arquivos");

            foreach ($arquivos as $arquivo) {
                $arquivoPostagem = new ArquivoPostagem();
                $arquivoPostagem->postagem_id = $postagem->id;
                $arquivoPostagem->nome = $arquivo->getClientOriginalName();
                $arquivoPostagem->path = $arquivo->store('ArquivoPostagem/' . $postagem->id);
                $arquivoPostagem->save();
                unset($arquivoPostagem);
            }
        }

        return redirect('postagem')->with('success', 'Postagem Criada com Sucesso');
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
        ]);

        if ($request->hasFile("imagens")) {
            $imagens = $request->file("imagens");

            foreach ($imagens as $imagem) {
                $imagemPostagem = new ImagemPostagem();
                $imagemPostagem->postagem_id = $postagem->id;
                $imagemPostagem->imagem = $imagem->store('ImagemPostagem/' . $postagem->id);
                $imagemPostagem->save();
                unset($imagemPostagem);
            }
        }

        if ($request->hasFile("arquivos")) {
            $arquivos = $request->file("arquivos");

            foreach ($arquivos as $arquivo) {
                $arquivoPostagem = new ArquivoPostagem();
                $arquivoPostagem->postagem_id = $postagem->id;
                $arquivoPostagem->nome = $arquivo->getClientOriginalName();
                $arquivoPostagem->path = $arquivo->store('ArquivoPostagem/' . $postagem->id);
                $arquivoPostagem->save();
                unset($arquivoPostagem);
            }
        }

        return redirect('postagem')->with('success', 'Postagem Alterada com Sucesso');
    }

    public function destroy($id)
    {
        $postagem =  Postagem::findOrFail($id);
        $postagem->delete();
        return back()->with('success', 'Postagem Excluída com Sucesso');
    }

    public function deleteImagem($id)
    {
        $imagem = ImagemPostagem::findOrFail($id);
        
        if (File::exists("storage/"  . $imagem->imagem)) {
            File::delete("storage/"  . $imagem->imagem);
        }
        $imagem->delete();
        return back();
    }

    public function deleteArquivo($id)
    {
        $arquivo = ArquivoPostagem::findOrFail($id);
        
        if (File::exists("storage/"  . $arquivo->path)) {
            File::delete("storage/"  . $arquivo->path);
        }
        $arquivo->delete();
        return back();
    }
}
