<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Banca;
use App\Models\Tcc;
use Illuminate\Http\Request;

class TccController extends Controller
{
    public function index(Request $request){

        $tccs = Aluno::join('tcc', 'aluno.id', '=', 'tcc.aluno_id')->get();

        return view('tcc.index', ['tccs' => $tccs]);
    }

    public function create() {

        $bancas = Banca::all();
        $alunos = Aluno::pluck('nome', 'id');
        $id = 1;
        return view('tcc.create', ['alunos' => $alunos, 'bancas' => $bancas, 'id' => $id]);
    }

    public function store(Request $request) {


        $tcc = Tcc::create([
            'titulo' => $request->titulo,
            'resumo' => $request->resumo,
            'link' => $request->link,
            'ano' => $request->data,
            'aluno_id' => $request->aluno_id,
            'banca_id' => $request->banca_id
        ]);

        $banca = Banca::findOrFail($request->banca_id);
        $tcc->banca = $banca;

        if($request->convite) {
            //Criar uma postagem com os dados deste TCC
        }

        return redirect('tcc')->with('success', 'TCC cadastrado com sucesso');
    }

    public function edit($id) {

        $tcc = Tcc::find($id);
        $alunos = Aluno::pluck('nome', 'id');
        $alunoId = $tcc->aluno_id;

        // edit postagem

        $bancas = Banca::all();
        return view('tcc.edit', ['tcc' => $tcc, 'alunos' => $alunos, 'bancas' => $bancas, 'id' => $alunoId]);
    }

    public function update(Request $request, $id) {
        $tcc = Tcc::find($request->id);

        $tcc->update([
            'titulo' => $request->titulo,
            'resumo' => $request->resumo,
            'link' => $request->link,
            'ano' => $request->data,
            'aluno_id' => $request->aluno_id
        ]);

        return redirect('tcc')->with('success', 'TCC atualizado com sucesso');
    }

    public function destroy($id) {
        $tcc = Tcc::findOrFail($id);

        $tcc->delete();

        return back()->with('success', 'TCC excluido com sucesso');
    }

    public function search(Request $request) {
        $tituloBusca = $request->tituloBusca;

        if(!$tituloBusca) {
            return redirect('/tcc');
        }

        $tccs = Aluno::join('tcc', 'aluno.id', '=', 'tcc.aluno_id')
        ->where('tcc.titulo', 'like', '%'.$tituloBusca.'%')
        ->get();

        return view('tcc.index', ['tccs' => $tccs]);
    }
}
