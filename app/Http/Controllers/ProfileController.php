<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use App\Models\FotoUser;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\UploadedFile;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        
        $request->user()->fill($request->validated());
        $user = $request->user(); // Obtenha a instância do usuário
        
        $user->update([
            'curriculo_lattes' => $request->curriculo_lattes,
            'titulacao' => $request->titulacao,
            'biografia' => $request->biografia,
            'area' => $request->area,
        ]);


        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

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

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    /**
     * Display a listing of the resource.
     */
    public function display(Request $request)
    {
        $buscar = $request->buscar;
        if ($buscar) {
            $users = User::where('name', 'like', '%' . $buscar . '%')->get();
        } else {
            $users = User::all();
        }

        return view('profile.display', ['users' => $users, 'buscar' => $buscar]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $buscar = $request->buscar;
        if ($buscar) {
            $users = User::where('name', 'like', '%' . $buscar . '%')->get();
        } else {
            $users = User::all();
        }

        return view('profile.index', ['users' => $users, 'buscar' => $buscar]);
    }

    /** 
    *Delete the specified image.
    */
    public function deleteFoto($id)
    {
        $foto = FotoUser::findOrFail($id);

        if (File::exists("storage/"  . $foto->foto)) {
            File::delete("storage/"  . $foto->foto);
        }
        $foto->delete();
        return back();
    }

}
