<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\ArquivoPortaria;
use App\Models\Colegiado;
use App\Models\Professor;
use App\Models\Servidor;
use Illuminate\Http\Request;

class ColegiadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $colegiados = Colegiado::all();
        $colegiado_atual = Colegiado::where('fim', '>', now())->first();
        $totalMembros = 0;
        if($colegiado_atual) {
            $totalMembros++;
            $totalMembros += $colegiado_atual->professores()->count();
            $totalMembros += $colegiado_atual->alunos()->count();
            $totalMembros += $colegiado_atual->tecnicosAdm()->count();
        }

        return view('colegiado.index', ['colegiados' => $colegiados, 'colegiado_atual' => $colegiado_atual, 'totalMembros' => $totalMembros]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $alunos = Aluno::all();
        $professores = Professor::all();
        $servidores = Servidor::whereNotIn('id', function ($query) {
            $query->select('servidor_id')->from('professor');
        })->get();

        $hoje = date('d-m-Y');

        return view('colegiado.create', ['alunos' => $alunos, 'professores' => $professores, 'servidores' => $servidores, 'hoje' => $hoje]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $coordenador = Professor::find(20);
        $colegiado = new Colegiado([
            'numero_portaria' => $request->numero_portaria,
            'inicio' => $request->vigencia_inicio,
            'fim' => $request->vigencia_fim,
            'coordenador_id' => $coordenador->id
        ]);

        $arquivo = $request->file('arquivo');
        $pdf = new ArquivoPortaria();
        $pdf->nome = $arquivo->getClientOriginalName();
        $pdf->path = $arquivo->store('ArquivoPortaria/' .$colegiado->id);
        $pdf->save();

        $colegiado->arquivo_portaria_id = $pdf->id;
        $colegiado->save();

        foreach($request->professores as $professor) {
            $colegiado->professores()->attach($professor);
        }
        foreach($request->alunos as $aluno) {
            $colegiado->alunos()->attach($aluno);
        }
        foreach($request->servidores as $tecnico_adm) {
            $colegiado->tecnicosAdm()->attach($tecnico_adm);
        }

        return redirect('colegiado')->with('success', 'Colegiado cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $alunos = Aluno::all();
        $professores = Professor::all();
        $servidores = Servidor::whereNotIn('id', function ($query) {
            $query->select('servidor_id')->from('professor');
        })->get();
        $colegiado = Colegiado::findOrFail($id);

        $hoje = date('d-m-Y');

        return view('colegiado.edit', ['colegiado' => $colegiado, 'alunos' => $alunos, 'professores' => $professores, 'servidores' => $servidores, 'hoje' => $hoje]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // return $request;
        $colegiado = Colegiado::findOrFail($id);
        $coordenador = Professor::findOrFail(20);

        $colegiado->update([
            'numero_portaria' => $request->numero_portaria,
            'inicio' => $request->vigencia_inicio,
            'fim' => $request->vigencia_fim,
            'coordenador_id' => $coordenador->id
        ]);

        if($request->hasFile("arquivo")) {
            $arquivo = $request->file('arquivo');
            $pdf = new ArquivoPortaria();
            $pdf->nome = $arquivo->getClientOriginalName();
            $pdf->path = $arquivo->store('ArquivoPortaria/' .$colegiado->id);
            $pdf->save();
        }

        $colegiado->professores()->sync($request->professores);
        $colegiado->tecnicosAdm()->sync($request->servidores);
        $colegiado->alunos()->sync($request->alunos);

        return redirect('colegiado')->with('success', 'Colegiado alterado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $colegiado = Colegiado::findOrFail($id);
        $colegiado->delete();
        return back()->with('success', 'Colegiado excluído com sucesso');
    }
}
