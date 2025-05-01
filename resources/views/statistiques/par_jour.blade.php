@extends('layouts.admin')

@section('page-title', 'Statistiques par jour')

@section('admin-content')
<div class="card">
    <div class="card-header">
        <h3>Statistiques par jour</h3>
    </div>
    <div class="card-body">
        <form method="GET" class="mb-4">
            <div class="row">
                <div class="col-md-6">
                    <label for="date" class="form-label">Sélectionnez une date</label>
                    <input type="date" class="form-control" id="date" name="date"
                           value="{{ request('date') ?? date('Y-m-d') }}">
                </div>
                <div class="col-md-6 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-search"></i> Rechercher
                    </button>
                </div>
            </div>
        </form>

        <div class="row text-center">
            <div class="col-md-4">
                <div class="card bg-light mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Petit-déjeuner</h5>
                        <p class="display-4">{{ $stats['petit_dejeuner'] }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-light mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Déjeuner</h5>
                        <p class="display-4">{{ $stats['dejeuner'] }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-light mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Dîner</h5>
                        <p class="display-4">{{ $stats['diner'] }}</p>
                    </div>
                </div>
            </div>
        </div>

        <h4 class="mt-4">Détail des réservations</h4>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Petit-déj</th>
                        <th>Déjeuner
