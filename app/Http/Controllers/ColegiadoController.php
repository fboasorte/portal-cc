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
        $colegiado_atual = Colegiado::where('vigencia', '>=', now());
        return view('colegiado.index', ['colegiados' => $colegiados, 'colegiado_atual' => $colegiado_atual]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $alunos = Aluno::all();
        $professores = Professor::all();
        $servidores = Servidor::all();
        $hoje = date('d-m-Y');

        return view('colegiado.create', ['alunos' => $alunos, 'professores' => $professores, 'servidores' => $servidores, 'hoje' => $hoje]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $request;
        $coordenador = Professor::find(1);
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
