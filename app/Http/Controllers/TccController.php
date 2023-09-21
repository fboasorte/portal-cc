<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Banca;
use App\Models\Professor;
use App\Models\ProfessorExterno;
use App\Models\Servidor;
use App\Models\Tcc;
use Illuminate\Http\Request;

class TccController extends Controller
{
    public function index(Request $request){

        $tccs = Aluno::join('tcc', 'aluno.id', '=', 'tcc.aluno_id')->get();
        $professores = Servidor::join('professor', 'professor.servidor_id', '=', 'servidor.id')->get();

        return view('tcc.index', ['tccs' => $tccs, 'professores' =>$professores]);
    }

    public function create() {

        $professores = Servidor::join('professor', 'professor.servidor_id', '=', 'servidor.id')->get();
        $professoresExternos = ProfessorExterno::all();
        $bancas = Banca::all();
        $alunos = Aluno::pluck('nome', 'id');
        $id = 1;
        return view('tcc.create', ['alunos' => $alunos, 'bancas' => $bancas, 'professores' => $professores, 'professores_externos' => $professoresExternos, 'id' => $id]);
    }

    public function store(Request $request) {

        $orientador = Professor::find($request->professor_id);

        $tcc = new Tcc([
            'titulo' => $request->titulo,
            'resumo' => $request->resumo,
            'link' => $request->link,
            'ano' => $request->data,
            'aluno_id' => $request->aluno_id,
            'banca_id' => $request->banca_id
        ]);

        $orientador->tccs()->save($tcc);

        if($request->convite) {
            //Criar uma postagem com os dados deste TCC
        }

        return redirect('tcc')->with('success', 'TCC cadastrado com sucesso');
    }

    public function edit($id) {

        $professores = Professor::join('servidor', 'professor.servidor_id', '=', 'servidor.id')->get();

        $tcc = Tcc::find($id);
        $alunos = Aluno::pluck('nome', 'id');
        $alunoId = $tcc->aluno_id;

        // edit postagem

        $bancas = Banca::all();
        return view('tcc.edit', ['tcc' => $tcc, 'alunos' => $alunos, 'bancas' => $bancas, 'professores' => $professores, 'id' => $alunoId]);
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
        $professor = Professor::findOrFail($request->professor_id);

        $tcc->professor_id = $professor->id;
        $tcc->save();

        if($request->convite) {
            // alterar dados no convite
        }

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
