<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Tcc;
use Illuminate\Http\Request;

class TccController extends Controller
{
    public function index(){
        // $tccs = Tcc::join('aluno','tcc.aluno_id', '=', 'aluno.id');
        // $tccs = Tcc::join('aluno', 'aluno.id', '=', 'tcc.aluno_id')->get();
        // $tccs = Aluno::join('tcc', 'tcc.aluno_id', '=', 'aluno.id');

        $tccs = Aluno::join('tcc', 'aluno.id', '=', 'tcc.aluno_id')->get();

        return view('tcc.index', ['tccs' => $tccs]);
    }

    public function create() {

        $alunos = Aluno::pluck('nome', 'id');
        $id = 1;
        return view('tcc.create', ['alunos' => $alunos, 'id' => $id]);
    }

    public function store(Request $request) {

        Tcc::create([
            'titulo' => $request->titulo,
            'resumo' => $request->resumo,
            'link' => $request->link,
            'ano' => $request->data,
            'aluno_id' => $request->aluno_id
        ]);

        return 'TCC cadastrado com sucesso';
    }

    public function edit($id) {
        $tcc = Tcc::find($id);
        $alunos = Aluno::pluck('nome', 'id');
        $alunoId = $tcc->aluno_id;

        return view('tcc.edit', ['tcc' => $tcc, 'alunos' => $alunos,'id' => $alunoId]);
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

        return 'TCC alterado com sucesso';
    }

    public function deleteView() {

    }

    public function deleteTcc() {

    }

    public function search() {

    }


}
