<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom sticky-top">
    <div class="container-fluid px-4">
        <!-- Toggler pour la sidebar -->
        <button class="btn btn-link text-dark" type="button" id="sidebarToggle">
            <i class="fas fa-bars"></i>
        </button>

        <!-- Barre de recherche -->
        <form class="d-none d-md-flex ms-4">
            <div class="input-group">
                <span class="input-group-text bg-light border-0">
                    <i class="fas fa-search text-muted"></i>
                </span>
                <input type="text" class="form-control bg-light border-0" placeholder="Rechercher...">
            </div>
        </form>

        <!-- Menu de droite -->
        <ul class="navbar-nav ms-auto">
            <!-- Notifications -->
            <li class="nav-item dropdown me-3">
                <a class="nav-link position-relative" href="#" role="button" data-bs-toggle="dropdown">
                    <i class="fas fa-bell"></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        3
                        <span class="visually-hidden">notifications non lues</span>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-end border-0 shadow-sm" style="min-width: 300px;">
                    <h6 class="dropdown-header">Notifications</h6>
                    <a class="dropdown-item py-2" href="#">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <div class="rounded-circle bg-primary bg-opacity-10 p-2">
                                    <i class="fas fa-bell text-primary"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <p class="mb-0 fs-7">Nouvelle réservation</p>
                                <small class="text-muted">Il y a 5 minutes</small>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-center small text-muted" href="#">Voir toutes les
                        notifications</a>
                </div>
            </li>

            <!-- Profile -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                    <img src="{{ asset('img/avatar-placeholder.jpg') }}" class="rounded-circle" width="32"
                        height="32" alt="Avatar">
                </a>
                <ul class="dropdown-menu dropdown-menu-end border-0 shadow-sm">
                    <li><a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i>Mon profil</a></li>
                    <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i>Paramètres</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item text-danger">
                                <i class="fas fa-sign-out-alt me-2"></i>Déconnexion
                            </button>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
