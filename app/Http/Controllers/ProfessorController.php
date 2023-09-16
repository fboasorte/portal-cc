<?php

namespace App\Http\Controllers;

use App\Models\Professor;
use App\Models\Servidor;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactUser;
use PharIo\Manifest\Email;

class ProfessorController extends Controller
{
    public function index(Request $request)
    {

        $buscar = $request->buscar;

        if ($buscar) {
            $servidores = Servidor::where('nome', 'like', '%' . $buscar . '%')->get();
        } else {
            $servidores = Servidor::all();
        }

        return view('professor.index', ['servidores' => $servidores, 'buscar' => $buscar]);
    }

    public function create(){
        return view('professor.create');
    }

    public function view($servidor_id){
        $servidor = Servidor::where('id', $servidor_id)->first();
        $professor = Professor::where('servidor_id', $servidor_id)->first();
        return view('professor.view', ['professor' => $professor, 'servidor' => $servidor]);
    }

    public function store(Request $request){
        $usuarioExists = Usuario::where('login', $request->login)->exists();
        $servidorExists = Servidor::where('email', $request->email)->exists();

        if ($usuarioExists || $servidorExists) {
            // Usuário ou servidor com login ou e-mail já existente
            return redirect('/professor/create');
        }
         
        $usuario = Usuario::create([
            'login'=> $request->login,
            'senha'=> md5($request->login)

        ]);

        $servidor = Servidor::create([
            'nome'=> $request->nome,
            'email'=> strtolower($request->email),
            'usuario_id'=> $usuario->id,
        ]);

        Professor::create([
            'servidor_id' => $servidor->id,
        ]);

        // Enviar email com credencias de Login
        $email = new CredentialMail($request);

        try{
            $email->sendMail();
        } catch (\Exception $error){
            return back()->with('erros', "Ocorreu um erro inesperado! {$error->getMessage()}");
        }

        return redirect('/professor');
    }
    public function edit($servidor_id){
        $servidor = Servidor::where('id', $servidor_id)->first();
        $usuario = Usuario::where('id', $servidor->usuario_id)->first();
        return view('professor.edit',['usuario' => $usuario, 'servidor' => $servidor]);
    }

    public function update(Request $request, $servidor_id){
        
        // Falta validação se o nome e email que vou alterar já existe em outo usuario;
        
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
            return back();
        }
        


        $usuario->update([
            'login'=> $request->login,
            'senha'=> md5($request->login)

        ]);

        $servidor->update([
            'nome'=> $request->nome,
            'email'=> strtolower($request->email),
        ]);

        return redirect('/professor');

    }
    
    public function delete($servidor_id){
        $servidor = Servidor::where('id', $servidor_id)->first();
        $professor = Professor::where('servidor_id', $servidor_id)->first();
        Usuario::destroy($servidor->usuario_id);
        Professor::destroy($professor->id);
        Servidor::destroy($servidor->id);

        return redirect('/professor');

    }
}
