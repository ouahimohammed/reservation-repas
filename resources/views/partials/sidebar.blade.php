<div class="col-md-3 col-lg-2 d-md-block bg-dark sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link text-white {{ Request::is('admin') ? 'active' : '' }}"
                   href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-tachometer-alt me-2"></i> Tableau de bord
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ Request::is('admin/comptes*') ? 'active' : '' }}"
                   href="{{ route('admin.comptes.index') }}">
                    <i class="fas fa-users me-2"></i> Comptes
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ Request::is('admin/statistiques*') ? 'active' : '' }}"
                   href="{{ route('admin.statistiques') }}">
                    <i class="fas fa-chart-bar me-2"></i> Statistiques
                </a>
            </li>
        </ul>

        <hr class="bg-light">

        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt me-2"></i> Déconnexion
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</div>
