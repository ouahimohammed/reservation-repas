<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class StatistiqueController extends Controller
{
    public function index()
    {
        // Statistiques par type de repas
        $petitDejeuner = Reservation::where('repas1', true)->where('annulation', false)->count();
        $dejeuner = Reservation::where('repas2', true)->where('annulation', false)->count();
        $diner = Reservation::where('repas3', true)->where('annulation', false)->count();

        return view('statistique.index', compact('petitDejeuner', 'dejeuner', 'diner'));
    }

    public function parJour(Request $request)
    {
        $date = $request->input('date') ? Carbon::parse($request->input('date')) : Carbon::today();
        
        $stats = [
            'petit_dejeuner' => Reservation::whereDate('date_reservation', $date)
                ->where('repas1', true)
                ->where('annulation', false)
                ->count(),
            'dejeuner' => Reservation::whereDate('date_reservation', $date)
                ->where('repas2', true)
                ->where('annulation', false)
                ->count(),
            'diner' => Reservation::whereDate('date_reservation', $date)
                ->where('repas3', true)
                ->where('annulation', false)
                ->count(),
        ];

        return view('statistique.par-jour', compact('stats', 'date'));
    }

    public function parMois(Request $request)
    {
        $mois = $request->input('mois') ?: Carbon::now()->month;
        $annee = $request->input('annee') ?: Carbon::now()->year;
        
        $stats = [
            'petit_dejeuner' => Reservation::whereMonth('date_reservation', $mois)
                ->whereYear('date_reservation', $annee)
                ->where('repas1', true)
                ->where('annulation', false)
                ->count(),
            'dejeuner' => Reservation::whereMonth('date_reservation', $mois)
                ->whereYear('date_reservation', $annee)
                ->where('repas2', true)
                ->where('annulation', false)
                ->count(),
            'diner' => Reservation::whereMonth('date_reservation', $mois)
                ->whereYear('date_reservation', $annee)
                ->where('repas3', true)
                ->where('annulation', false)
                ->count(),
        ];

        return view('statistique.par-mois', compact('stats', 'mois', 'annee'));
    }
}