<?php

namespace App\Http\Controllers;

use App\Models\Banca;
use App\Models\ProfessorExterno;
use Illuminate\Http\Request;

class BancaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $buscar = $request->buscar;

        if($buscar) {
            $bancas = Banca::where('data', '=', date('Y-n-d', strtotime($buscar)));
        } else {
            $bancas = Banca::all();
        }

        return view('banca.index', ['buscar' => $buscar, 'bancas' => $bancas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $professores_externos = ProfessorExterno::all();
        return view('banca.create', ['professores_externos' => $professores_externos]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $banca = Banca::create([
            'data' => $request->data,
            'local' => $request->local
        ]);

        foreach($request->professores_externos as $professor_externo_id) {
            $professor_externo = ProfessorExterno::findOrFail($professor_externo_id);

            $banca->professoresExternos()->attach($professor_externo);
        }



        return redirect('banca')->with('success', 'Banca criada com sucesso');
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
        $banca = Banca::findOrFail($id);
        return view('banca.edit', ['banca' => $banca]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $banca = Banca::findOrFail($id);
        $banca->update([
            'data' => $request->data,
            'local' => $request->local
        ]);

        return redirect('banca')->with('success', 'Banca alterada com Sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $banca = Banca::findOrFail($id);
        $banca->delete();

        return back()->with('success', 'Banca excluída com sucesso!');
    }
}
