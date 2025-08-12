<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{



    public function login() {
        return view('auth/login');
    }

    public function handlelogin(AuthRequest $request) {
        //dd($request);

        $credentials = $request->only(['email','password']);
        if(Auth::attempt($credentials)) {

            return redirect()->route('dashboard');
        } else {
            return redirect()->back()->with('error_msg','Paramettre de connexion non reconnu');
        }
        
    }

    
public function logout(request $request)
{
    Auth::logout();

    // Invalider la session
    $request->session()->invalidate();

    // Régénérer le token CSRF pour sécurité
    $request->session()->regenerateToken();

    return redirect()->route('login')->with('success', 'Vous êtes déconnecté avec succès.');
}
    //
}
