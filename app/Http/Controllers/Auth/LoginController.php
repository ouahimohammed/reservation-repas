<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Compte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        $user = Compte::where('login', $request->login)->first();
    
        if ($user && Hash::check($request->password, $user->motdepasse)) {
            // Créer un token manuel
            $token = Str::random(60);
            $user->forceFill([
                'remember_token' => hash('sha256', $token),
            ])->save();
    
            // Stocker dans un cookie persistant
            return redirect()->intended(route('admin.dashboard'))
                ->withCookie(cookie()->forever('atlas_auth', $token));
        }
    
        return back()->withErrors(['login' => 'Échec de connexion']);
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}