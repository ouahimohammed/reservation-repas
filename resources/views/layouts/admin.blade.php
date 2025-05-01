@extends('layouts.app')

@section('content')
<header class="mb-4">
    <h1>Espace Administrateur</h1>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.comptes') }}">Administration des comptes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.reservations') }}">Réservation</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.annulations') }}">Annulation</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('statistiques.index') }}">Statistique</a>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="nav-link btn btn-link">Déconnexion</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<main>
    @yield('admin-content')
</main>
@endsection