<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Coordenador;
use App\Models\Professor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


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

    public function create()
    {
        return view('curso.create');
    }

    public function store(Request $request)
    {

        $nomeCalendario = $request->calendario;
        if ($request->hasFile("calendario")) {
            $calendario = $request->file("calendario");
            $nomeCalendario = $calendario->store('ArquivoCalendario');
        }

        $nomeHorario = $request->horario;
        if ($request->hasFile("horario")) {
            $horario = $request->file("horario");
            $nomeHorario = $horario->store('ArquivoHorario');
        }

        $curso = new Curso([
            'nome' => $request->nome,
            'turno' => $request->turno,
            'carga_horaria' => $request->carga_horaria,
            'sigla' => $request->sigla,
            'analytics' => $request->analytics,
            'calendario' => $nomeCalendario,
            'horario' => $nomeHorario,
        ]);

        $curso->save();

        return redirect('curso')->with('success', 'Curso adicionado com sucesso');
    }

    public function edit($curso_id)
    {
        $curso = Curso::where('id', $curso_id)->first();
        return view('curso.edit', ['curso' => $curso]);
    }

    public function destroy(string $id)
    {
        $curso =  Curso::findOrFail($id);
        $curso->delete();
        return back()->with('success', 'Curso excluído com sucesso');
    }

    public function deleteCalendario($id)
{
    $curso = Curso::findOrFail($id);

    if (File::exists(public_path("storage/" . $curso->calendario))) {
        File::delete(public_path("storage/" . $curso->calendario));
        $curso->calendario = null;
        $curso->save();
    }

    return redirect()->back();
}

    public function deleteHorario($id)
    {
        $curso = Curso::findOrFail($id);

        if (File::exists(public_path("storage/" . $curso->horario))) {
            File::delete(public_path("storage/" . $curso->horario));
            $curso->horario = null;
            $curso->save();
        }

        return redirect()->back();
    }

    public function downloadCalendario($id)
    {
        $curso =  Curso::findOrFail($id);
        $file = public_path() . '/storage/' . $curso->calendario;

        $headers = array(
            'Content-Type: application/pdf',
        );

        return Response::download($file, 'filename.pdf', $headers);
    }

    public function downloadHorario($id)
    {
        $curso = Curso::findOrFail($id);
        $file = public_path() . '/storage/' . $curso->horario;

        $headers = array(
            'Content-Type: application/pdf',
        );

        return Response::download($file, 'filename.pdf', $headers);
    }


    public function update(Request $request, $id)
    {
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

        $nomeCalendario = $curso->calendario;
        if ($request->hasFile("calendario")) {
            $calendario = $request->file("calendario");
            $nomeCalendario = $calendario->store('ArquivoCalendario');
        }

        $nomeHorario = $curso->horario;
        if ($request->hasFile("horario")) {
            $horario = $request->file("horario");
            $nomeHorario = $horario->store('ArquivoHorario');
        }

        $curso->nome = $request->nome;
        $curso->turno = $request->turno;
        $curso->carga_horaria = $request->carga_horaria;
        $curso->sigla = $request->sigla;
        $curso->analytics = $request->analytics;
        $curso->calendario = $nomeCalendario;
        $curso->horario = $nomeHorario;
        $curso->save();

        return redirect('curso')->with('success', 'Curso atualizado com sucesso');
    }

    public function coordenador($id)
    {
        $coordenador = Coordenador::where('curso_id', '=', $id)->first();

        return view('curso.coordenador', compact('coordenador', 'id'));
    }

    public function coordenadorStore(Request $request, $id)
    {
        $coordenador = Coordenador::where('curso_id', '=', $id)->first();

        if ($coordenador) {
            if ($request->professor_id != $coordenador->professor_id) {
                $professor = Professor::find($request->professor_id);

                $coordenador->professor->servidor->user->removeRole('coordenador');

                $professor->servidor->user->syncRoles(['coordenador', 'professor']);
            }

            $coordenador->update([
                'email_contato' => $request->email_contato,
                'horario_atendimento' => $request->horario_atendimento,
                'sala_atendimento' => $request->sala_atendimento,
                'professor_id' => $request->professor_id,
            ]);


        } else {
            $coordenador = Coordenador::create([
                'email_contato' => $request->email_contato,
                'horario_atendimento' => $request->horario_atendimento,
                'sala_atendimento' => $request->sala_atendimento,
                'professor_id' => $request->professor_id,
                'curso_id' => $id,
            ]);

            $coordenador->professor->servidor->user->assignRole('coordenador');
        }

        return redirect()->back();
    }

    /**
     * Show the application dataAjax.
     *
     * @return \Illuminate\Http\Response
     */
    public function buscaProfessor(Request $request)
    {
        $data = [];

        if ($request->has('q')) {
            $search = $request->q;
            $data = DB::table("professor")
                ->select("professor.id", "servidor.nome")
                ->join('servidor', 'professor.servidor_id', '=', 'servidor.id')
                ->where('nome', 'LIKE', "%$search%")
                ->get();
        }

        return response()->json($data);
    }
}
