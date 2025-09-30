<!-- Sidebar -->
<nav class="col-md-2 d-none d-md-block bg-dark sidebar min-vh-100">
    <div class="position-sticky pt-3">

        <ul class="nav flex-column">
            <li>
                <img class="center" src="{{ asset('img/heaven-logo.png') }}" width="100px" alt="">
            </li>
            <li class="nav-item">
                <a class="nav-link active text-white" href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-tachometer-alt me-2"></i> Tableau de bord
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" data-bs-toggle="collapse" href="#contentManagement" role="button">
                    <i class="fas fa-file-alt me-2"></i> Gestion du contenu
                </a>
                <div class="collapse" id="contentManagement">
                    <ul class="nav flex-column ms-3">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('admin.slides.index') }}">
                                <i class="fas fa-images me-2"></i> Slides
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" data-bs-toggle="collapse" href="#servicesManagement" role="button">
                    <i class="fas fa-concierge-bell me-2"></i> Services
                </a>
                <div class="collapse" id="servicesManagement">
                    <ul class="nav flex-column ms-3">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">
                                <i class="fas fa-home me-2"></i> Propriétés
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">
                                <i class="fas fa-car me-2"></i> Location Véhicules
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">
                                <i class="fas fa-broom me-2"></i> Nettoyage
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">
                                <i class="fas fa-calendar-alt me-2"></i> Événementiel
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">
                                <i class="fas fa-handshake me-2"></i> Consulting
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="#">
                    <i class="fas fa-users me-2"></i> Utilisateurs
                </a>
            </li>
        </ul>
    </div>
</nav>
