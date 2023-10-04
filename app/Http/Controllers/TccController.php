<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\ArquivoTcc;
use App\Models\Banca;
use App\Models\Professor;
use App\Models\ProfessorExterno;
use App\Models\Servidor;
use App\Models\Tcc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TccController extends Controller
{
    public function index(Request $request){

        $tccs = Tcc::all();
        $professores = Servidor::join('professor', 'professor.servidor_id', '=', 'servidor.id')->get();

        // return dd($tccs[0]->aluno);

        return view('tcc.index', ['tccs' => $tccs, 'professores' =>$professores]);
    }

    public function create() {

        $anoAtual = date("Y");

        $professores = Servidor::join('professor', 'professor.servidor_id', '=', 'servidor.id')->get();
        $professoresExternos = ProfessorExterno::all();
        $bancas = Banca::all();
        $alunos = Aluno::pluck('nome', 'id');
        $id = 1;
        return view('tcc.create', ['anoAtual' => $anoAtual, 'alunos' => $alunos, 'bancas' => $bancas, 'professores' => $professores, 'professores_externos' => $professoresExternos, 'id' => $id]);
    }

    public function store(Request $request) {
        $orientador = Professor::find($request->professor_id);

        $tcc = new Tcc([
            'titulo' => $request->titulo,
            'resumo' => $request->resumo,
            'ano' => $request->ano,
            'aluno_id' => $request->aluno_id,
            'banca_id' => $request->banca_id,
            'status' => $request->status
        ]);

        if($request->hasFile("arquivo")) {
            $pdf = new ArquivoTcc();
            $pdf->nome = $request->arquivo->getClientOriginalName();
            $pdf->path =$request->arquivo->store('ArquivoTcc/' .$tcc->id);
            $pdf->save();
            $tcc->arquivo_id = $pdf->id;
        }
        $orientador->tccs()->save($tcc);


        if($request->convite) {
            //Criar uma postagem com os dados deste TCC
        }

        return redirect('tcc')->with('success', 'TCC cadastrado com sucesso');
    }

    public function edit($id) {

        $professores = Professor::join('servidor', 'professor.servidor_id', '=', 'servidor.id')->get();
        $professoresExternos = ProfessorExterno::all();
        $tcc = Tcc::find($id);
        $alunos = Aluno::pluck('nome', 'id');
        $alunoId = $tcc->aluno_id;

        $bancas = Banca::all();
        return view('tcc.edit', ['anoTcc' => $tcc->ano, 'tcc' => $tcc, 'alunos' => $alunos, 'bancas' => $bancas, 'professores' => $professores, 'professores_externos' => $professoresExternos, 'id' => $alunoId]);
    }

    public function update(Request $request, $id) {
        $tcc = Tcc::find($request->id);

        if ($request->contexto === 'concluirTcc') {
            // Salve o arquivo do TCC (se necessário)
            if ($request->hasFile('arquivo')) {
                $arquivo = $request->file('arquivo');
                $nomeArquivo = time() . '_' . $arquivo->getClientOriginalName();
                $arquivo->storeAs('tcc', $nomeArquivo); // Armazene o arquivo na pasta 'tcc', por exemplo
                $tcc->arquivo = $nomeArquivo;
            }

            // Atualize outros campos do TCC, se necessário
            // $tcc->campo = $request->campo;

            // Salve as alterações no TCC
            $tcc->save();

            // Retorne uma resposta de sucesso, se necessário
            return response()->json(['message' => 'TCC concluído com sucesso']);
        }

        $tcc->update([
            'titulo' => $request->titulo,
            'resumo' => $request->resumo,
            'link' => $request->link,
            'ano' => $request->ano,
            'aluno_id' => $request->aluno_id,
            'status' => $request->status
        ]);
        $professor = Professor::findOrFail($request->professor_id);

        if($request->hasFile("arquivo")) {
            if ($tcc->arquivo) {
                $caminhoArquivo = $tcc->arquivo->path;

                $tcc->arquivo_id = null;
                $tcc->save();

                Storage::delete($caminhoArquivo);
                $tcc->arquivo->delete();
            }

            $pdf = new ArquivoTcc();
            $pdf->nome = $request->arquivo->getClientOriginalName();
            $pdf->path = $request->arquivo->store('ArquivoTcc/' . $tcc->id);
            $pdf->save();
            $tcc->arquivo_id = $pdf->id;
            $tcc->save();
        }

        $tcc->professor_id = $professor->id;
        $tcc->save();


        return redirect('tcc')->with('success', 'TCC atualizado com sucesso');
    }

    public function destroy($id) {
        $tcc = Tcc::findOrFail($id);

        $tcc->delete();

        return back()->with('success', 'TCC excluido com sucesso');
    }

    public function search(Request $request) {
        $tituloBusca = $request->tituloBusca;

        if(!$tituloBusca) {
            return redirect('/tcc');
        }

        $tccs = Aluno::join('tcc', 'aluno.id', '=', 'tcc.aluno_id')
        ->where('tcc.titulo', 'like', '%'.$tituloBusca.'%')
        ->get();

        return view('tcc.index', ['tccs' => $tccs]);
    }
}
