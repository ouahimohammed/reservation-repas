<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function dashboard()
    {
        return view('user.dashboard');
    }

    public function reservations()
    {
        $user = Auth::user();
        $reservations = $user->reservations()->where('annulation', false)->get();
        return view('user.reservations', compact('reservations'));
    }

    public function annulations()
    {
        $user = Auth::user();
        $annulations = $user->reservations()->where('annulation', true)->get();
        return view('user.annulations', compact('annulations'));
    }
}