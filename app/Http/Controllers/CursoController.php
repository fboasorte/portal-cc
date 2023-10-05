<?php

namespace App\Http\Controllers;
use App\Models\Curso;
use App\Models\ArquivoCalendario;
use App\Models\ArquivoHorario;
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

        //dd($request->calendario);
        $curso = new Curso([
            'nome' => $request->nome,
            'turno' => $request->turno,
            'carga_horaria' => $request->carga_horaria,
            'sigla' => $request->sigla,
            'analytics' => $request->analytics,
            'calendario'=> $request->calendario,
            'horario'=> $request->horario,
        ]);

        $curso->save();

        if ($request->hasFile("calendario")) {
            $calendario = $request->file("calendario");

                $arquivoCalendario = new ArquivoCalendario();
                $arquivoCalendario->curso_id = $curso->id;
                $arquivoCalendario->calendario = $calendario->store('ArquivoCalendario/' . $curso->id);
                $arquivoCalendario->save();
                unset($arquivoCalendario);
            }

            if ($request->hasFile("horario")) {
                $horario = $request->file("horario");

                    $arquivoHorario = new ArquivoHorario();
                    $arquivoHorario->curso_id = $curso->id;
                    $arquivoHorario->horario = $horario->store('ArquivoHorario/' . $curso->id);
                    $arquivoHorario->save();
                    unset($arquivoHorario);
                }



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

    public function deleteCalendario($id)
    {
        $calendario = ArquivoCalendario::findOrFail($id);

        if (File::exists("storage/"  . $calendario->path)) {
            File::delete("storage/"  . $calendario->path);
        }
        $calendario->delete();
        return back();
    }

    public function deleteHorario($id)
    {
        $horario = ArquivoHorario::findOrFail($id);

        if (File::exists("storage/"  . $horario->path)) {
            File::delete("storage/"  . $horario->path);
        }
        $horario->delete();
        return back();
    }

    public function downloadCalendario($id)
{
    $arquivoCalendario = ArquivoCalendario::findOrFail($id);

    return response()->download(storage_path("app/{$arquivoCalendario->calendario}"));
}

public function downloadHorario($id)
{
    $arquivoHorario = ArquivoHorario::findOrFail($id);

    return response()->download(storage_path("app/{$arquivoHorario->horario}"));
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

        if ($request->hasFile("calendario")) {
            $calendario = $request->file("calendario");

                $arquivoCalendario = new ArquivoCalendario();
                $arquivoCalendario->curso_id = $curso->id;
                $arquivoCalendario->calendario = $calendario->store('ArquivoCalendario/' . $curso->id);
                $arquivoCalendario->save();
                unset($arquivoCalendario);
            }

            if ($request->hasFile("horario")) {
                $horario = $request->file("horario");

                    $arquivoHorario = new ArquivoHorario();
                    $arquivoHorario->curso_id = $curso->id;
                    $arquivoHorario->horario = $horario->store('ArquivoHorario/' . $curso->id);
                    $arquivoHorario->save();
                    unset($arquivoHorario);
                }

        return redirect('curso')->with('success', 'Curso atualizado com sucesso');
    }


}
