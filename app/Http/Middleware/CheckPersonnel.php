<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckPersonnel
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->TypeCompte  === 'personnel') {
            return $next($request);
        }

        return redirect('/')->with('error', 'Accès non autorisé');
    }
}