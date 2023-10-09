<?php

namespace App\Http\Controllers;

use App\Models\AreaProfessor;
use App\Models\CurriculoProfessor;
use App\Models\Professor;
use App\Models\Servidor;
use App\Models\User;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

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
        try {
            $servidor = Servidor::findOrFail($servidor_id);
            $professor = Professor::where('servidor_id', $servidor_id)->first();

            if (!$servidor || !$professor) {
                return back()->with('error', "Professor não encontrado. Por favor, verifique os dados e tente novamente.");
            }

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
        } catch (\Exception $error) {
            return back()->with('error', "Ocorreu um erro ao buscar informações do professor. Por favor, tente novamente.");
        }
    }


    public function store(Request $request)
    {
        /* VALIDAÇÂO ANTIGA */
        // $usuarioExists = User::where('login', $request->login)->exists();
        // $servidorExists = Servidor::where('email', $request->email)->exists();

        // if ($usuarioExists || $servidorExists) {
        //     // Usuário ou servidor com login ou e-mail já existente
        //     if ($request->contexto == 'modal') {
        //         $professores = Professor::all();
        //         return response()->json(['error' => 'Professor já cadastrado', 'professores' => $professores]);
        //     } else {
        //         return redirect('/professor/create');
        //     }
        // }

        $validator = Validator::make($request->all(), [
            'login' => [
                'required',
                Rule::unique('users', 'login'),
            ],
            'email' => [
                'required',
                Rule::unique('servidor', 'email'),
            ],
        ], [
            'login.required' => 'O campo Nome é obrigatório.',
            'email.required' => 'O campo Email é obrigatório.',
            'login.unique' => 'Este login já está em uso.',
            'email.unique' => 'Este email já está em uso',
        ]);

        if ($validator->fails()) {

            // Usuário ou servidor com login ou e-mail já existente
            if ($request->contexto == 'modal') {
                $professores = Professor::all();
                return response()->json(['error' => 'Professor já cadastrado', 'professores' => $professores]);
            } else {
                return redirect('/professor/create');
                // ->with('error', $validator->errors()->first());
            }

        }

        try {
            $user = User::create([
                'login' => $request->login,
                'password' => Hash::make($request->login),
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

        } catch (\Exception $error) {
            // Em caso de erro exclui o user e o servidor
        
            if (isset($user)) {
                $user->delete();
            }
        
            if (isset($servidor)) {
                $servidor->delete();
            }
        
            return redirect('/professor/create');
            // ->with('error', "Não foi possível cadastrar o professor! Por favor, tente novamente.");
        }

        // Enviar email com credencias de Login
        $email = new CredentialMail($request);

        if ($request->contexto == 'modal') {
            $professores = Servidor::join('professor', 'professor.servidor_id', '=', 'servidor.id')->get();
            return response()->json(['professores' => $professores]);
        }

        try {
            $email->sendMail();
        } catch (\Exception $error) {
            return redirect('/professor')->with('error', "Não foi possivel enviar o email automaticamente!Por favor, envie o e-mail manualmente para $servidor->email");
        }

        return redirect('/professor')->with('success', "Usuário cadastrado com sucesso!");
    }

    public function edit($servidor_id)
    {
        try {
            $servidor = Servidor::findOrFail($servidor_id);
            $usuario = User::findOrFail($servidor->user_id);
            
            return view('professor.edit', ['usuario' => $usuario, 'servidor' => $servidor]);
        } catch (\Exception $error) {
            return back()->with('error', "Ocorreu um erro ao buscar o professor. Por favor, tente novamente.");
        }
    }

    public function update(Request $request, $servidor_id)
    {
        /* VALIDAÇÂO ANTIGA */
        // $servidor = Servidor::where('id', $servidor_id)->first();
        // $usuario = User::where('id', $servidor->user_id)->first();

        // $usuarioExists = User::where('login', $request->login)
        //     ->where('id', '!=', $usuario->id) // Não deve ser o mesmo usuário
        //     ->exists();

        // $servidorExists = Servidor::where('email', $request->email)
        //     ->where('id', '!=', $servidor->id) // Não deve ser o mesmo servidor
        //     ->exists();

        // if ($usuarioExists || $servidorExists) {
        //     // Usuário ou servidor com login ou e-mail já existente (mas não o mesmo usuário/servidor)
        //     return back()->with('error', "Já existe um usário no sistema com esse email ou login!");
        // }

        try {
            $servidor = Servidor::findOrFail($servidor_id);
            $usuario = User::findOrFail($servidor->user_id);
    
            $validator = Validator::make($request->all(), [
                'login' => [
                    'required',
                    Rule::unique('users', 'login')->ignore($usuario->id),
                ],
                'email' => [
                    'required',
                    Rule::unique('servidor', 'email')->ignore($servidor->id),
                ],
            ], [
                'login.required' => 'O campo Nome é obrigatório.',
                'email.required' => 'O campo Email é obrigatório.',
                'login.unique' => 'Este login já está em uso.',
                'email.unique' => 'Este email já está em uso',
            ]);
    
            if ($validator->fails()) {
                return back()->with('error', $validator->errors()->first());
            }
    
            $usuario->update([
                'login' => $request->login,
                'senha' => Hash::make($request->login)
            ]);
    
            $servidor->update([
                'nome' => $request->nome,
                'email' => strtolower($request->email),
            ]);
    
            return redirect('/professor')->with('success', "Usuário atualizado com sucesso!");
        } catch (\Exception $error) {
            return back()->with('error', "Ocorreu um erro ao atualizar o usuário. Por favor, tente novamente.");
        }
    }

    public function destroy($servidor_id)
    {
        try {
            $servidor = Servidor::findOrFail($servidor_id);
            $professor = Professor::where('servidor_id', $servidor_id)->first();

            if (!$servidor || !$professor) {
                return back()->with('error', "Servidor ou professor não encontrado. A exclusão não foi realizada.");
            }

            User::destroy($servidor->user_id);
            Professor::destroy($professor->id);
            Servidor::destroy($servidor->id);

            return redirect('/professor')->with('success', "Usuário removido com sucesso!");
        } catch (\Exception $error) {
            return back()->with('error', "Ocorreu um erro ao excluir o usuário. Por favor, tente novamente.");
        }
    }

    public function view($servidor_id)
    {
        try {
            $servidor = Servidor::findOrFail($servidor_id);
            $professor = Professor::where('servidor_id', $servidor_id)->first();
            $user = User::findOrFail($servidor->user_id);

            if (!$servidor || !$professor || !$user) {
                return back()->with('error', "Professor não encontrado.");
            }

            $areas = AreaProfessor::where('professor_id', $professor->id)->get();
            $curriculos = CurriculoProfessor::where('professor_id', $professor->id)->get();

            return view(
                'professor.view',
                [
                    'professor' => $professor,
                    'servidor' => $servidor,
                    'user' => $user,
                    'areas' => $areas,
                    'curriculos' => $curriculos
                ]
            );
        } catch (\Exception $error) {
            return back()->with('error', "Ocorreu um erro ao buscar informações do professor. Por favor, tente novamente.");
        }
    }


    public function display()
    {

        $servidores = Servidor::join('professor', 'professor.servidor_id', '=', 'servidor.id')
            ->select('servidor.*', 'professor.id as professor_id', 'professor.titulacao', 'professor.foto')
            ->get();

        return view('professor.display', ['servidores' => $servidores]);
    }
}
