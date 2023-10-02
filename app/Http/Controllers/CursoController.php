<?php

namespace App\Http\Controllers;
use App\Models\Curso;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;


class CursoController extends Controller
{

    public function index(Request $request)
    {
        $buscar = $request->buscar;
        if ($buscar) {
            $cursos = Curso::where('nome', 'like', '%' . $buscar . '%')->get();
        } else {
            $cursos = Curso::all();
        }

        return view('curso.index', ['cursos' => $cursos, 'buscar' => $buscar]);
    }

    public function create(){
        return view('curso.create');
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'nome' => [
                'required',
                Rule::unique('curso', 'nome')->ignore($request->id),
            ],
            'sigla' => [
                'required',
                Rule::unique('curso', 'sigla')->ignore($request->id),
            ],
        ], [
            'nome.required' => 'O campo Nome é obrigatório.',
            'sigla.required' => 'O campo Sigla é obrigatório.',
            'nome.unique' => 'Este nome de curso já está em uso. Escolha outro nome.',
            'sigla.unique' => 'Esta sigla de curso já está em uso. Escolha outra sigla.',
        ]);
    
        if ($validator->fails()) {
            return redirect('/curso/create')
                ->withErrors($validator)
                ->withInput();
        }
    
        $curso = new Curso([
            'nome' => $request->nome,
            'turno' => $request->turno,
            'carga_horaria' => $request->carga_horaria,
            'sigla' => $request->sigla,
            'analytics' => $request->analytics,
        ]);
    
        $curso->save();
    
        return redirect('curso')->with('success', 'Curso adicionado com sucesso');
    }

    public function edit($curso_id){
        $curso = Curso::where('id', $curso_id)->first();
        return view('curso.edit',['curso' => $curso]);
    }

    public function destroy(string $id)
    {
        $curso =  Curso::findOrFail($id);
        $curso->delete();
        return back()->with('success', 'Curso excluído com sucesso');
    }

    public function update(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'nome' => [
                'required',
                Rule::unique('curso', 'nome')->ignore($id),
            ],
            'sigla' => [
                'required',
                Rule::unique('curso', 'sigla')->ignore($id),
            ],
        ], [
            'nome.required' => 'O campo Nome é obrigatório.',
            'sigla.required' => 'O campo Sigla é obrigatório.',
            'nome.unique' => 'Este nome de curso já está em uso. Escolha outro nome.',
            'sigla.unique' => 'Esta sigla de curso já está em uso. Escolha outra sigla.',
        ]);
    
        if ($validator->fails()) {
            return redirect()->route('curso.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }
    
        $curso = Curso::find($id);
    
        if (!$curso) {
            return redirect('curso')->with('error', 'Curso não encontrado');
        }
    
        $curso->nome = $request->nome;
        $curso->turno = $request->turno;
        $curso->carga_horaria = $request->carga_horaria;
        $curso->sigla = $request->sigla;
        $curso->analytics = $request->analytics;
        $curso->save();
    
        return redirect('curso')->with('success', 'Curso atualizado com sucesso');
    }
    
    
}
