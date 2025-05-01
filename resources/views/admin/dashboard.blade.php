@extends('layouts.admin')

@section('admin-content')
<div class="container">
    <h2>Tableau de bord Administrateur</h2>
    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">Comptes</div>
                <div class="card-body">
                    <h5 class="card-title">{{ App\Models\Compte::count() }}</h5>
                    <p class="card-text">Comptes enregistrés</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">Réservations</div>
                <div class="card-body">
                    <h5 class="card-title">{{ App\Models\Reservation::where('annulation', false)->count() }}</h5>
                    <p class="card-text">Réservations actives</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-danger mb-3">
                <div class="card-header">Annulations</div>
                <div class="card-body">
                    <h5 class="card-title">{{ App\Models\Reservation::where('annulation', true)->count() }}</h5>
                    <p class="card-text">Réservations annulées</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection