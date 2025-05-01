<?php

namespace App\Http\Controllers;

use App\Models\Compte;
use App\Models\Reservation;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function gestionComptes()
    {
        $comptes = Compte::all();
        return view('admin.comptes', compact('comptes'));
    }

    public function reservations()
    {
        $reservations = Reservation::with('compte')->get();
        return view('admin.reservations', compact('reservations'));
    }

    public function annulations()
    {
        $annulations = Reservation::where('annulation', true)->with('compte')->get();
        return view('admin.annulations', compact('annulations'));
    }
}