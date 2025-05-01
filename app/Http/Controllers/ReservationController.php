<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function index()
    {
        $comptes = \App\Models\Compte::where('type_compte', 'personnel')->get();
        return view('reservation.index', compact('comptes'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'matricule' => 'required|exists:comptes,matricule',
            'date_reservation' => 'required|date',
            'repas1' => 'sometimes|boolean',
            'repas2' => 'sometimes|boolean',
            'repas3' => 'sometimes|boolean',
        ]);

        $reservation = Reservation::create([
            'matricule' => $validated['matricule'],
            'date_reservation' => $validated['date_reservation'],
            'repas1' => $validated['repas1'] ?? false,
            'repas2' => $validated['repas2'] ?? false,
            'repas3' => $validated['repas3'] ?? false,
            'annulation' => false,
        ]);

        return redirect()->back()->with('success', 'Réservation enregistrée avec succès');
    }

    public function annuler($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->update(['annulation' => true]);

        return redirect()->back()->with('success', 'Réservation annulée avec succès');
    }
}