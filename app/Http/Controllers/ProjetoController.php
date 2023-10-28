<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjetoRequest;
use App\Models\ImagemProjeto;
use App\Models\Projeto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ProjetoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $buscar = $request->buscar;
        if ($buscar) {
            $projetos = Projeto::where('palavra_chave', 'like', '%' . $buscar . '%')->get();
        } else {
            $projetos = Projeto::all();
        }

        return view('projeto.index', ['projetos' => $projetos, 'buscar' => $buscar]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('projeto.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjetoRequest $request)
    {

        $projeto = new Projeto([
            'titulo' => $request->titulo,
            'descricao' => $request->descricao,
            'palavras_chave' => $request->palavras_chave,
            'data_inicio' => $request->data_inicio,
            'data_termino' => $request->data_termino,
            'resultados' => $request->resultados,
            'professor_id' => $request->professor_id,
            'fomento' => $request->fomento,
            'link' => $request->link
        ]);

        $projeto->save();

        if ($request->hasFile("imagens")) {
            $imagens = $request->file("imagens");

            foreach ($imagens as $imagem) {
                $imagemProjeto = new ImagemProjeto();
                $imagemProjeto->projeto_id = $projeto->id;
                $imagemProjeto->imagem = $imagem->store('ImagemProjeto/' . $projeto->id);
                $imagemProjeto->save();
                unset($imagemProjeto);
            }
        }

        $projeto->alunos()->sync($request->alunos);

        $projeto->professoresColaboradores()->sync($request->professores);

        $projeto->professoresExternos()->sync($request->professores_externos);

        return redirect('projeto')->with('success', 'Projeto Criado com Sucesso');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $projeto = Projeto::findOrFail($id);

        $alunos = $projeto->alunos()->get();

        $professoresColaboradores = $projeto->professoresColaboradores()->get();

        $professoresExternos = $projeto->professoresExternos()->get();

        return view('projeto.edit', compact('projeto', 'alunos', 'professoresColaboradores', 'professoresExternos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreProjetoRequest $request, string $id)
    {
        $projeto = Projeto::findOrFail($id);

        $projeto->update([
            'titulo' => $request->titulo,
            'descricao' => $request->descricao,
            'palavras_chave' => $request->palavras_chave,
            'data_inicio' => $request->data_inicio,
            'data_termino' => $request->data_termino,
            'resultados' => $request->resultados,
            'professor_id' => $request->professor_id,
            'fomento' => $request->fomento,
            'link' => $request->link
        ]);

        if ($request->hasFile("imagens")) {
            $imagens = $request->file("imagens");

            foreach ($imagens as $imagem) {
                $imagemProjeto = new ImagemProjeto();
                $imagemProjeto->projeto_id = $projeto->id;
                $imagemProjeto->imagem = $imagem->store('ImagemProjeto/' . $projeto->id);
                $imagemProjeto->save();
                unset($imagemProjeto);
            }
        }

        $projeto->alunos()->sync($request->alunos);

        $projeto->professoresColaboradores()->sync($request->professores);

        $projeto->professoresExternos()->sync($request->professores_externos);

        return redirect('projeto')->with('success', 'Projeto Alterado com Sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $projeto = Projeto::findOrFail($id);
        $projeto->delete();
        return back()->with('success', 'Projeto Excluído com Sucesso');
    }

    /**
     * Show the application dataAjax.
     *
     * @return \Illuminate\Http\Response
     */
    public function buscaProfessor(Request $request)
    {
        $data = [];

        if ($request->has('q')) {
            $search = $request->q;
            $data = DB::table("professor")
                ->select("professor.id", "servidor.nome")
                ->join('servidor', 'professor.servidor_id', '=', 'servidor.id')
                ->where('nome', 'LIKE', "%$search%")
                ->get();
        }

        return response()->json($data);
    }

    /**
     * Show the application dataAjax.
     *
     * @return \Illuminate\Http\Response
     */
    public function buscaAluno(Request $request)
    {
        $data = [];

        if ($request->has('q')) {
            $search = $request->q;
            $data = DB::table("aluno")
                ->select("id", "nome")
                ->where('nome', 'LIKE', "%$search%")
                ->get();
        }

        return response()->json($data);
    }


    /**
     * Show the application dataAjax.
     *
     * @return \Illuminate\Http\Response
     */
    public function buscaProfessorExterno(Request $request)
    {
        $data = [];

        if ($request->has('q')) {
            $search = $request->q;
            $data = DB::table("professor_externo")
                ->select("id", "nome")
                ->where('nome', 'LIKE', "%$search%")
                ->get();
        }

        return response()->json($data);
    }

    public function show()
    {
        $projetos = Projeto::join('professor', 'projeto.professor_id', '=', 'professor.id')
            ->join('servidor', 'professor.servidor_id', '=', 'servidor.id')
            ->select('projeto.*', 'servidor.nome as nome_professor')
            //->orderBy('data.ano', 'DESC')
            ->get();

        return view('projeto.show', ['projetos' => $projetos]);
    }

    public function view($id)
    {
        $projetos = Projeto::join('professor', 'projeto.professor_id', '=', 'professor.id')
            ->join('servidor', 'professor.servidor_id', '=', 'servidor.id')
            ->select('projeto.*', 'servidor.nome as nome_professor')
            ->findOrFail($id);

        if (!$projetos) {
            abort(404);
        }

        return view('projeto.view', ['projetos' => $projetos]);
    }

    public function deleteImagem($id)
    {
        $imagem = ImagemProjeto::findOrFail($id);

        if (File::exists("storage/"  . $imagem->imagem)) {
            File::delete("storage/"  . $imagem->imagem);
        }
        $imagem->delete();
        return back();
    }
}
