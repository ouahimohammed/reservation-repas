@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">Connexion</div>
            <div class="card-body">
                <form method="POST" action="{{ route('login.post') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="login" class="form-label">Login</label>
                        <input id="login" type="text" class="form-control @error('login') is-invalid @enderror" name="login" value="{{ old('login') }}" required autofocus>
                        @error('login')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3 form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember">
                        <label class="form-check-label" for="remember">Mémoriser le mot de passe</label>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Connecter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // Remplir automatiquement les champs si les cookies existent
    document.addEventListener('DOMContentLoaded', function() {
        const login = getCookie('login');
        const password = getCookie('password');
        
        if (login && password) {
            document.getElementById('login').value = login;
            document.getElementById('password').value = password;
            document.getElementById('remember').checked = true;
        }
    });

    function getCookie(name) {
        const value = `; ${document.cookie}`;
        const parts = value.split(`; ${name}=`);
        if (parts.length === 2) return parts.pop().split(';').shift();
    }
</script>
@endsection