@extends('layouts.user')

@section('content')
<div class="container">
    <h2>Nouvelle réservation</h2>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('reservations.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="date_reservation" class="form-label">Date</label>
                    <input type="date" class="form-control @error('date_reservation') is-invalid @enderror"
                           id="date_reservation" name="date_reservation"
                           min="{{ date('Y-m-d') }}" value="{{ old('date_reservation') }}" required>
                    @error('date_reservation')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Repas</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="repas1" name="repas1" {{ old('repas1') ? 'checked' : '' }}>
                        <label class="form-check-label" for="repas1">Petit-déjeuner</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="repas2" name="repas2" {{ old('repas2') ? 'checked' : '' }}>
                        <label class="form-check-label" for="repas2">Déjeuner</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="repas3" name="repas3" {{ old('repas3') ? 'checked' : '' }}>
                        <label class="form-check-label" for="repas3">Dîner</label>
                    </div>
                </div>

                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a href="{{ route('reservations.index') }}" class="btn btn-secondary me-md-2">
                        Annuler
                    </a>
                    <button type="submit" class="btn btn-primary">
                        Enregistrer
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Validation client pour s'assurer qu'au moins un repas est sélectionné
        const form = document.querySelector('form');
        form.addEventListener('submit', function(e) {
            const checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');
            if (checkboxes.length === 0) {
                e.preventDefault();
                alert('Veuillez sélectionner au moins un repas.');
            }
        });
    });
</script>
@endpush
