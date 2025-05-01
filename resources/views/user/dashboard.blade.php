@extends('layouts.user')

@section('content')
<div class="container">
    <h2>Bienvenue, {{ Auth::user()->prenom }}!</h2>

    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">Réservations aujourd'hui</h5>
                    <p class="display-4">{{ $todayReservations }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">Réservations ce mois</h5>
                    <p class="display-4">{{ $monthReservations }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">Prochain repas</h5>
                    <p class="display-4">
                        @if($nextMeal)
                            {{ $nextMeal->format('d/m') }}
                        @else
                            Aucun
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-header">
            <h3>Mes prochaines réservations</h3>
        </div>
        <div class="card-body">
            @if($upcomingReservations->count() > 0)
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Petit-déjeuner</th>
                                <th>Déjeuner</th>
                                <th>Dîner</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($upcomingReservations as $reservation)
                            <tr>
                                <td>{{ $reservation->date_reservation->format('d/m/Y') }}</td>
                                <td>{{ $reservation->repas1 ? '✔' : '' }}</td>
                                <td>{{ $reservation->repas2 ? '✔' : '' }}</td>
                                <td>{{ $reservation->repas3 ? '✔' : '' }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="text-muted">Aucune réservation à venir</p>
            @endif
        </div>
    </div>
</div>
@endsection
