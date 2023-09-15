<?php

namespace App\Http\Controllers;

use App\Models\ProfessorExterno;
use Illuminate\Http\Request;

class professorExternoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $buscar = $request->buscar;

        if($buscar) {
            $professores_externos = ProfessorExterno::where('nome', 'like', '%'.$buscar.'%')->get();
        } else {
            $professores_externos = ProfessorExterno::all();
        }

        return view('professor-externo.index', ['professores_externos' => $professores_externos, 'buscar' => $buscar]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('professor-externo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        ProfessorExterno::create([
            'nome' => $request->nome,
            'filiacao' => $request->filiacao
        ]);

        return redirect('professor-externo')->with('success', 'Professor externo ' .$request->nome. ' Criado com Sucesso');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $professor_externo = ProfessorExterno::findOrFail($id);
        return view('professor-externo.edit', ['professor_externo' => $professor_externo]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $professor_externo = ProfessorExterno::findOrFail($id);

        $professor_externo->update([
            'nome' => $request->nome,
            'filiacao' => $request->filiacao
        ]);

        return redirect('professor-externo')->with('success', 'Professor Externo ' .$request->nome. ' Alterado com Sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $professor_externo = ProfessorExterno::findOrFail($id);

        $professor_externo->delete();

        return back()->with('success', 'Professor Externo '.$professor_externo->nome. ' excluido com sucesso');
    }
}
