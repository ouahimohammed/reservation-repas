@extends('layouts.user')

@section('user-content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h3>Informations</h3>
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3">
                            <label class="form-label">Matricule:</label>
                            <input type="text" class="form-control" value="{{ $user->matricule }}" readonly>
                        </div>
                        
                        <div class="mb-3">
                            <label for="nom" class="form-label">Nom:</label>
                            <input type="text" class="form-control" id="nom" name="nom" value="{{ $user->nom }}">
                        </div>
                        
                        <div class="mb-3">
                            <label for="prenom" class="form-label">Prénom:</label>
                            <input type="text" class="form-control" id="prenom" name="prenom" value="{{ $user->prenom }}">
                        </div>
                        
                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
                        </div>
                        
                        <div class="mb-3">
                            <label for="photo" class="form-label">Photo:</label>
                            <input type="file" class="form-control" id="photo" name="photo">
                            @if($user->photo)
                                <img src="{{ asset('storage/' . $user->photo) }}" alt="Photo de profil" class="img-thumbnail mt-2" width="100">
                            @endif
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Mettre à jour</button>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <h3>Réservations du mois en cours</h3>
            <div class="card">
                <div class="card-body">
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
                            @foreach($reservations as $reservation)
                            <tr>
                                <td>{{ $reservation->date_reservation->format('d/m/Y') }}</td>
                                <td>{{ $reservation->repas1 ? '✔' : '✖' }}</td>
                                <td>{{ $reservation->repas2 ? '✔' : '✖' }}</td>
                                <td>{{ $reservation->repas3 ? '✔' : '✖' }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection