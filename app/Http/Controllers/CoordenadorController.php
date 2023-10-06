<?php

namespace App\Http\Controllers;

use App\Models\Coordenador;
use App\Models\Servidor;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CoordenadorController extends Controller
{
    public function index()
    {
        $coordenador = Coordenador::first();
        return view('coordenador.index', compact('coordenador'));
    }

    public function create()
    {
        return view('coordenador.create');
    }

    public function store(Request $request)
    {
        $coordenador = Coordenador::create([
            'horario_atendimento' => $request->horario_atendimento,
            'email_contato' => $request->email_contato,
            'sala_atendimento' => $request->sala_atendimento,
            'professor_id' => $request->professor_id
        ]);

        $coordenador->professor->servidor->user->assignRole('coordenador');
        // $coordenador->professor->servidor->user->removeRole('coordenador');

        return redirect('/professor')->with('success', "Coordenador cadastrado com sucesso!");
    }

    public function edit($servidor_id)
    {
        $servidor = Servidor::where('id', $servidor_id)->first();
        $usuario = Usuario::where('id', $servidor->usuario_id)->first();
        return view('professor.edit', ['usuario' => $usuario, 'servidor' => $servidor]);
    }

    public function update(Request $request, $servidor_id)
    {
        $servidor = Servidor::where('id', $servidor_id)->first();
        $usuario = Usuario::where('id', $servidor->usuario_id)->first();

        $usuarioExists = Usuario::where('login', $request->login)
            ->where('id', '!=', $usuario->id) // Não deve ser o mesmo usuário
            ->exists();

        $servidorExists = Servidor::where('email', $request->email)
            ->where('id', '!=', $servidor->id) // Não deve ser o mesmo servidor
            ->exists();

        if ($usuarioExists || $servidorExists) {
            // Usuário ou servidor com login ou e-mail já existente (mas não o mesmo usuário/servidor)
            return back()->with('error', "Já existe um usário no sistema com esse email ou login!");
        }



        $usuario->update([
            'login' => $request->login,
            'senha' => md5($request->login)
        ]);

        $servidor->update([
            'nome' => $request->nome,
            'email' => strtolower($request->email),
        ]);

        return redirect('/professor')->with('success', "Usuário atualizado com sucesso!");
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
