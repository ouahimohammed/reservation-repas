@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Statistiques globales</h2>

    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Petit-déjeuner</h5>
                    <p class="card-text display-4">{{ $stats['petit_dejeuner'] }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Déjeuner</h5>
                    <p class="card-text display-4">{{ $stats['dejeuner'] }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Dîner</h5>
                    <p class="card-text display-4">{{ $stats['diner'] }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            <h3>Dernières réservations</h3>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Personnel</th>
                        <th>Repas</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($recentReservations as $reservation)
                    <tr>
                        <td>{{ $reservation->date_reservation->format('d/m/Y') }}</td>
                        <td>{{ $reservation->compte->nom }} {{ $reservation->compte->prenom }}</td>
                        <td>
                            @if($reservation->repas1) Petit-déj @endif
                            @if($reservation->repas2) Déjeuner @endif
                            @if($reservation->repas3) Dîner @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <a href="{{ route('statistiques.par_jour') }}" class="btn btn-info btn-block">
                Voir par jour
            </a>
        </div>
        <div class="col-md-6">
            <a href="{{ route('statistiques.par_mois') }}" class="btn btn-info btn-block">
                Voir par mois
            </a>
        </div>
    </div>
</div>
@endsection
