<?php

namespace App\Http\Controllers;

use App\Models\Projeto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    public function store(Request $request)
    {
        $projeto = new Projeto([
            'descricao' => $request->descricao,
            'palavras_chave' => $request->palavras_chave,
            'data_inicio' => $request->data_inicio,
            'data_termino' => $request->data_termino,
            'resultados' => $request->resultados,
            'professor_id' => $request->professor_id,
        ]);

        $projeto->save();

        $projeto->alunos()->sync($request->alunos);

        return redirect('projeto')->with('success', 'Projeto Criado com Sucesso');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $projeto = Projeto::findOrFail($id);

        $alunos = $projeto->alunos()->get();
        return view('projeto.edit', compact('projeto', 'alunos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $projeto = Projeto::findOrFail($id);

        $projeto->update([
            'descricao' => $request->descricao,
            'palavras_chave' => $request->palavras_chave,
            'data_inicio' => $request->data_inicio,
            'data_termino' => $request->data_termino,
            'resultados' => $request->resultados,
            'professor_id' => $request->professor_id,
        ]);

        $projeto->alunos()->sync($request->alunos);

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
}
