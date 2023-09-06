<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    public function index() {

        $alunos = Aluno::all();
        return view('aluno.index', ['alunos' => $alunos]);
    }

    public function create()
    {
        return view('aluno.create');
    }

    public function store(Request $request) {

        $aluno = new Aluno;

        $aluno->nome = $request->nome;
        $aluno->save();

        return redirect('/aluno');
    }

    public function edit($id) {

        $aluno = Aluno::findOrFail($id);
        return view('aluno.edit', ['aluno' => $aluno]);
    }

    public function update(Request $request, $id) {

        $aluno = Aluno::findOrFail($id);

        $aluno->update([
            'nome' => $request->nome
        ]);

        return redirect('/aluno');
    }

    public function deleteConfirm($id) {
        $aluno = Aluno::findOrFail($id);

        return view('aluno.delete', ['aluno' => $aluno]);
    }

    public function deleteAluno(Request $request, $id) {

        $aluno = Aluno::findOrFail($id);

        if($request->input('submit') == 1) {
            $aluno->delete();
        }
        return redirect('/aluno');
    }
}

