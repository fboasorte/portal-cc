<?php

namespace App\Http\Controllers;

use App\Models\AreaProfessor;
use App\Models\CurriculoProfessor;
use App\Models\Professor;
use App\Models\Servidor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfessorController extends Controller
{
    public function index(Request $request)
    {
        $buscar = $request->buscar;

        if ($buscar) {
            $servidores = Servidor::where('nome', 'like', '%' . $buscar . '%')
                ->join('professor', 'professor.servidor_id', '=', 'servidor.id')
                ->select('servidor.*', 'professor.id as professor_id', 'professor.titulacao', 'professor.foto')
                ->get();
        } else {
            $servidores = Servidor::join('professor', 'professor.servidor_id', '=', 'servidor.id')
                ->select('servidor.*', 'professor.id as professor_id', 'professor.titulacao', 'professor.foto')
                ->get();
        }

        return view('professor.index', ['servidores' => $servidores, 'buscar' => $buscar]);
    }

    public function create()
    {
        return view('professor.create');
    }

    public function show($servidor_id)
    {
        $servidor = Servidor::where('id', $servidor_id)->first();
        $professor = Professor::where('servidor_id', $servidor_id)->first();
        $areas = AreaProfessor::where('professor_id', $professor->id)->get();
        $curriculos = CurriculoProfessor::where('professor_id', $professor->id)->get();

        return view(
            'professor.view',
            [
                'professor' => $professor,
                'servidor' => $servidor,
                'areas' => $areas,
                'curriculos' => $curriculos
            ]
        );
    }

    public function store(Request $request)
    {
        $usuarioExists = User::where('email', $request->email)->exists();
        $servidorExists = Servidor::where('email', $request->email)->exists();

        if ($usuarioExists || $servidorExists) {
            // Usuário ou servidor com login ou e-mail já existente
            if ($request->contexto == 'modal') {
                $professores = Professor::all();
                return response()->json(['error' => 'Professor já cadastrado', 'professores' => $professores]);
            } else {
                return redirect('/professor/create');
            }
        }

        $user = User::create([
            'password' => Hash::make($request->email),
            'name' => $request->nome,
            'email' => strtolower($request->email),
        ]);

        $servidor = Servidor::create([
            'nome' => $request->nome,
            'email' => strtolower($request->email),
            'user_id' => $user->id,
        ]);

        Professor::create([
            'servidor_id' => $servidor->id,
        ]);

        $user->assignRole('professor');

        // Enviar email com credencias de Login
        $email = new CredentialMail($request);

        if ($request->contexto == 'modal') {
            $professores = Servidor::join('professor', 'professor.servidor_id', '=', 'servidor.id')->get();
            return response()->json(['professores' => $professores]);
        }

        try {
            $email->sendMail();
        } catch (\Exception $error) {
            return back()->with('error', "Ocorreu um erro inesperado! {$error->getMessage()}");
        }

        return redirect('/professor')->with('success', "Usuário cadastrado com sucesso!");
    }

    public function edit($servidor_id)
    {
        $servidor = Servidor::where('id', $servidor_id)->first();
        $usuario = User::where('id', $servidor->user_id)->first();
        return view('professor.edit', ['usuario' => $usuario, 'servidor' => $servidor]);
    }

    public function update(Request $request, $servidor_id)
    {

        // Falta validação se o nome e email que vou alterar já existe em outo usuario;

        $servidor = Servidor::where('id', $servidor_id)->first();
        $usuario = User::where('id', $servidor->user_id)->first();

        $usuarioExists = User::where('email', $request->email)
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
            'name' => $request->nome,
            'email' => $request->email
        ]);

        $servidor->update([
            'nome' => $request->nome,
            'email' => strtolower($request->email),
        ]);

        return redirect('/professor')->with('success', "Usuário atualizado com sucesso!");
    }

    public function destroy($servidor_id)
    {
        $servidor = Servidor::where('id', $servidor_id)->first();
        $professor = Professor::where('servidor_id', $servidor_id)->first();
        Professor::destroy($professor->id);
        Servidor::destroy($servidor->id);
        User::destroy($servidor->user_id);

        return redirect('/professor')->with('success', "Usuário removido com sucesso!");
    }

    public function view($servidor_id)
    {
        $servidor = Servidor::where('id', $servidor_id)->first();
        $professor = Professor::where('servidor_id', $servidor_id)->first();
        $user = User::where('id', $servidor->user_id)->first();
        $curriculos = CurriculoProfessor::where('professor_id', $professor->id)->get();

        return view(
            'professor.view',
            ['professor' => $professor, 'servidor' => $servidor, 'user' => $user, 'curriculos' => $curriculos]
        );
    }

    public function display()
    {
        $servidores = Servidor::join('professor', 'professor.servidor_id', '=', 'servidor.id')
            ->select('servidor.*', 'professor.id as professor_id', 'professor.titulacao', 'professor.foto')
            ->get();

        return view('professor.display', ['servidores' => $servidores]);
    }
}
