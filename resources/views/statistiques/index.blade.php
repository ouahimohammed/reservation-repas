@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Statistiques des réservations</h2>
    
    <ul class="nav nav-tabs mt-4" id="statTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="type-tab" data-bs-toggle="tab" data-bs-target="#type" type="button" role="tab">Par type de repas</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="jour-tab" data-bs-toggle="tab" data-bs-target="#jour" type="button" role="tab">Par jour</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="mois-tab" data-bs-toggle="tab" data-bs-target="#mois" type="button" role="tab">Par mois</button>
        </li>
    </ul>
    
    <div class="tab-content mt-3" id="statTabsContent">
        <div class="tab-pane fade show active" id="type" role="tabpanel">
            <h4>Réservations par type de repas</h4>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Type de repas</th>
                        <th>Nombre de réservations</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Petit-déjeuner</td>
                        <td>{{ $petitDejeuner }}</td>
                    </tr>
                    <tr>
                        <td>Déjeuner</td>
                        <td>{{ $dejeuner }}</td>
                    </tr>
                    <tr>
                        <td>Dîner</td>
                        <td>{{ $diner }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <div class="tab-pane fade" id="jour" role="tabpanel">
            <h4>Réservations par jour</h4>
            <form method="GET" action="{{ route('statistiques.jour') }}" class="mb-3">
                <div class="row">
                    <div class="col-md-6">
                        <label for="date" class="form-label">Entrez la date:</label>
                        <input type="date" class="form-control" id="date" name="date" required>
                    </div>
                    <div class="col-md-6 d-flex align-items-end">
                        <button type="submit" class="btn btn-primary">Recherche</button>
                    </div>
                </div>
            </form>
        </div>
        
        <div class="tab-pane fade" id="mois" role="tabpanel">
            <h4>Réservations par mois</h4>
            <form method="GET" action="{{ route('statistiques.mois') }}" class="mb-3">
                <div class="row">
                    <div class="col-md-4">
                        <label for="mois" class="form-label">Mois:</label>
                        <select class="form-select" id="mois" name="mois" required>
                            @for($i = 1; $i <= 12; $i++)
                                <option value="{{ $i }}" {{ now()->month == $i ? 'selected' : '' }}>{{ DateTime::createFromFormat('!m', $i)->format('F') }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="annee" class="form-label">Année:</label>
                        <select class="form-select" id="annee" name="annee" required>
                            @for($i = now()->year - 2; $i <= now()->year + 2; $i++)
                                <option value="{{ $i }}" {{ now()->year == $i ? 'selected' : '' }}>{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="col-md-4 d-flex align-items-end">
                        <button type="submit" class="btn btn-primary">Recherche</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection