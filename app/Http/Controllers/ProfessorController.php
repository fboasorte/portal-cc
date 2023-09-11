<?php

namespace App\Http\Controllers;

use App\Models\Professor;
use App\Models\Servidor;
use App\Models\Usuario;
use Illuminate\Http\Request;

class ProfessorController extends Controller
{
    public function index(){
        return view('');
    }

    public function create(){
        return view('professor.create');
    }
    public function store(Request $request){
        Usuario::create([
            'login'=> $request->login,
            'senha'=> md5($request->login)
        ]);

        Servidor::create([
            'nome'=> $request->nome,
            'email'=> strtolower($request->email),
            'usuario_id'=> '1'
        ]);

        return "Professor Cadastrado com Sucesso";
    }
}
