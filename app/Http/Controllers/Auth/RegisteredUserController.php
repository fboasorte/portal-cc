<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\FotoUser;
use App\Models\Servidor;
use App\Models\Professor;
use App\Models\AreaProfessor;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'curriculo_lattes' => ['nullable', 'string', 'max:255'],
            'titulacao' => ['nullable', 'string', 'max:500'],
            'biografia' => ['nullable', 'string', 'max:1000'],
            'area' => ['nullable', 'string', 'max:255'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'curriculo_lattes' => $request->curriculo_lattes,
            'titulacao' => $request->titulacao,
            'biografia' => $request->biografia,
            'area'=> $request->area,
        ]);



        //Forma nova de salvar usuário
        $servidor = Servidor::create([
            'nome'=> $request->name,
            'email'=> strtolower($request->email),
            'user_id'=> $user->id,
        ]);

        //Professor com foto 
        if ($request->hasFile("fotos")) {
            $fotos = $request->file("fotos");
            
            $professor = Professor::create([
                'titulacao'=> $request->titulacao,
                'biografia'=> $request->biografia,
                'servidor_id'=> $servidor->id,
                'foto' => $fotos[0]->store('FotoUser/' . $user->id),
            ]);
            //$professor->save();
        }else { //Professor sem foto
            $professor = Professor::create([
                'titulacao'=> $request->titulacao,
                'biografia'=> $request->biografia,
                'servidor_id'=> $servidor->id,
            ]);
        }

        $area_prof = AreaProfessor::create([
            'professor_id'=> $professor->id,
            'area'=> $request->area,
            'link'=> $request->curriculo_lattes,
        ]);




        //Forma antiga de salvar fotos (tabela FotoUser)
        if ($request->hasFile("fotos")) {
            $fotos = $request->file("fotos");              
 
            foreach ($fotos as $foto) {
                 $fotoUser = new FotoUser();
                 $fotoUser->user_id = $user->id;
                 $fotoUser->foto = $foto->store('FotoUser/' . $user->id);
                 $fotoUser->save();
                 unset($fotoUser);
             }
         }

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
