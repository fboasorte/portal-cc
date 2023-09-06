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
        Aluno::create([
            'nome' => $request->nome
        ]);

        return 'Novo aluno cadastrado com sucesso';
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

        return 'Aluno atualizado com sucesso.';
    }
}
