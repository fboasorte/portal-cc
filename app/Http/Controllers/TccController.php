<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Tcc;
use Illuminate\Http\Request;

class TccController extends Controller
{
    public function index(){
        $tccs = Tcc::join('aluno', 'aluno.id', '=', 'tcc.aluno_id')->get();

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
        $tcc = Tcc::join('aluno', 'aluno.id', '=', 'tcc.aluno_id')
        ->where('tcc.id', '=', $id)
        ->get();

        return view('tcc.edit', ['tcc' => $tcc]);
    }

    public function update() {

    }

    public function deleteView() {

    }

    public function deleteTcc() {

    }

    public function search() {

    }


}
