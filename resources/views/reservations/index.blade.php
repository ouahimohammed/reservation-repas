@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Réservation des repas</h2>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('reservations.store') }}" class="mb-4">
        @csrf
        <div class="row g-3">
            <div class="col-md-4">
                <label for="matricule" class="form-label">Personnel</label>
                <select class="form-select" id="matricule" name="matricule" required>
                    <option value="">Sélectionner un membre du personnel</option>
                    @foreach($comptes as $compte)
                        <option value="{{ $compte->matricule }}">{{ $compte->nom }} {{ $compte->prenom }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <label for="date_reservation" class="form-label">Date de réservation</label>
                <input type="date" class="form-control" id="date_reservation" name="date_reservation" required>
            </div>
            <div class="col-md-4">
                <label class="form-label">Repas</label>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="repas1" name="repas1">
                    <label class="form-check-label" for="repas1">Petit-déjeuner</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="repas2" name="repas2">
                    <label class="form-check-label" for="repas2">Déjeuner</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="repas3" name="repas3">
                    <label class="form-check-label" for="repas3">Dîner</label>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Enregistrer</button>
    </form>

    <h3 class="mt-5">Liste des réservations</h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Matricule</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Petit-déjeuner</th>
                <th>Déjeuner</th>
                <th>Dîner</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($comptes as $compte)
                @foreach($compte->reservations as $reservation)
                <tr>
                    <td>{{ $compte->matricule }}</td>
                    <td>{{ $compte->nom }}</td>
                    <td>{{ $compte->prenom }}</td>
                    <td>{{ $reservation->repas1 ? '✔' : '✖' }}</td>
                    <td>{{ $reservation->repas2 ? '✔' : '✖' }}</td>
                    <td>{{ $reservation->repas3 ? '✔' : '✖' }}</td>
                    <td>{{ $reservation->date_reservation->format('d/m/Y') }}</td>
                    <td>
                        @if(!$reservation->annulation)
                            <form action="{{ route('reservations.annuler', $reservation->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-danger">Annuler</button>
                            </form>
                        @else
                            <span class="badge bg-secondary">Annulée</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>

    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Petit-déjeuner</div>
                <div class="card-body">
                    <h5 class="card-title" id="petit-dejeuner-count">0</h5>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Déjeuner</div>
                <div class="card-body">
                    <h5 class="card-title" id="dejeuner-count">0</h5>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Dîner</div>
                <div class="card-body">
                    <h5 class="card-title" id="diner-count">0</h5>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Calculer le nombre de repas réservés
        function calculerRepas() {
            let petitDejeuner = 0;
            let dejeuner = 0;
            let diner = 0;

            document.querySelectorAll('tbody tr').forEach(row => {
                if (row.cells[3].textContent === '✔') petitDejeuner++;
                if (row.cells[4].textContent === '✔') dejeuner++;
                if (row.cells[5].textContent === '✔') diner++;
            });

            document.getElementById('petit-dejeuner-count').textContent = petitDejeuner;
            document.getElementById('dejeuner-count').textContent = dejeuner;
            document.getElementById('diner-count').textContent = diner;
        }

        // Appeler la fonction au chargement
        calculerRepas();
    });
</script>
@endsection