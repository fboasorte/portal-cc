<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    public function index(Request $request) {

        $buscar = $request->buscar;

        if ($buscar) {
            $alunos = Aluno::where('nome', 'like', '%' . $buscar . '%')->get();
        } else {
            $alunos = Aluno::all();
        }

        return view('aluno.index', ['alunos' => $alunos, 'buscar' => $buscar]);
    }

    public function create() {
        return view('aluno.create');
    }

    public function store(Request $request) {

        $aluno = new Aluno;

        $aluno->nome = $request->nome;
        $aluno->save();

        return redirect('/aluno')->with('success', 'Aluno cadastrado com sucesso');
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

        return redirect('/aluno')->with('success', 'Aluno alterado com sucesso');
    }

    public function destroy($id) {
        $aluno = Aluno::findOrFail($id);
        $aluno->delete();

        return back()->with('success', 'Aluno excluido com sucesso');
    }

    public function deleteAluno(Request $request, $id) {

        $aluno = Aluno::findOrFail($id);

        if($request->input('submit') == 1) {
            $aluno->delete();
        }
        return redirect('/aluno');
    }
}

