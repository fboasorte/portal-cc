<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactUser;

class CredentialMail extends Controller
{
    private $nome;
    private $email;
    private $login;
    private $senha;

    public function __construct(Request $request)
    {
        $this->nome = $request->nome;
        $this->email = $request->email;
        $this->login = $request->login;
        $this->senha = $request->login;
    }

    public function sendMail(){
        $data = array(
            'nome'=> $this->nome,
            'login'=> $this->login,
            'senha'=> $this->senha
        );

        Mail::to($this->email)->send( new ContactUser($data));
    }
}
