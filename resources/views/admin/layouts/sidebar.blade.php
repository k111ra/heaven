<!-- Sidebar -->
<nav id="sidebar" class="col-md-2 d-none d-md-block sidebar">
    <div class="position-sticky">
        <!-- Logo -->
        <div class="text-center py-4 mb-3 border-bottom">
            <img src="{{ asset('img/heaven-logo.png') }}" width="120" alt="Heaven League" class="img-fluid">
        </div>

        <!-- Menu principal -->
        <div class="px-3">
            <ul class="nav flex-column">
                <li class="nav-item mb-2">
                    <a class="nav-link d-flex align-items-center text-white rounded-3 {{ Request::is('admin/dashboard*') ? 'active bg-primary' : 'hover-primary' }}"
                        href="{{ route('admin.dashboard') }}">
                        <i class="fas fa-tachometer-alt me-3"></i>
                        <span>Tableau de bord</span>
                    </a>
                </li>

                <!-- Gestion du contenu -->
                <li class="nav-item mb-2">
                    <a class="nav-link d-flex align-items-center justify-content-between text-white rounded-3 hover-primary"
                        data-bs-toggle="collapse" href="#contentManagement">
                        <div>
                            <i class="fas fa-file-alt me-3"></i>
                            <span>Gestion du contenu</span>
                        </div>
                        <i class="fas fa-chevron-right fs-6"></i>
                    </a>
                    <div class="collapse {{ Request::is('admin/slides*') ? 'show' : '' }}" id="contentManagement">
                        <ul class="nav flex-column ms-3 mt-2">
                            <li class="nav-item">
                                <a class="nav-link text-white ps-4 rounded-3 {{ Request::is('admin/slides*') ? 'active bg-primary' : 'hover-primary' }}"
                                    href="{{ route('admin.slides.index') }}">
                                    <i class="fas fa-images me-2"></i>
                                    Slides
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Services -->
                <li class="nav-item mb-2">
                    <a class="nav-link d-flex align-items-center justify-content-between text-white rounded-3 hover-primary"
                        data-bs-toggle="collapse" href="#servicesManagement">
                        <div>
                            <i class="fas fa-concierge-bell me-3"></i>
                            <span>Services</span>
                        </div>
                        <i class="fas fa-chevron-right fs-6"></i>
                    </a>
                    <div class="collapse {{ Request::is('admin/proprietes*') || Request::is('admin/vehicules*') ? 'show' : '' }}"
                        id="servicesManagement">
                        <ul class="nav flex-column ms-3 mt-2">
                            <!-- Propriétés -->
                            <li class="nav-item mb-2">
                                <a class="nav-link text-white ps-4 rounded-3 {{ Request::is('admin/proprietes*') ? 'active bg-primary' : 'hover-primary' }}"
                                    href="{{ route('admin.proprietes.index') }}">
                                    <i class="fas fa-home me-2"></i>
                                    Propriétés
                                </a>
                            </li>

                            <!-- Véhicules -->
                            <li class="nav-item mb-2">
                                <a class="nav-link d-flex align-items-center justify-content-between text-white ps-4 rounded-3 hover-primary"
                                    data-bs-toggle="collapse" href="#vehiculesManagement">
                                    <div>
                                        <i class="fas fa-car me-2"></i>
                                        <span>Location Véhicules</span>
                                    </div>
                                    <i class="fas fa-chevron-right fs-6"></i>
                                </a>
                                <div class="collapse {{ Request::is('admin/vehicules*') || Request::is('admin/vehicule-categories*') ? 'show' : '' }}"
                                    id="vehiculesManagement">
                                    <ul class="nav flex-column mt-2">
                                        <li class="nav-item">
                                            <a class="nav-link text-white ps-5 rounded-3 {{ Request::is('admin/vehicules*') ? 'active bg-primary' : 'hover-primary' }}"
                                                href="{{ route('admin.vehicules.index') }}">
                                                <i class="fas fa-list me-2"></i>
                                                Liste des véhicules
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link text-white ps-5 rounded-3 {{ Request::is('admin/vehicule-categories*') ? 'active bg-primary' : 'hover-primary' }}"
                                                href="{{ route('admin.vehicule-categories.index') }}">
                                                <i class="fas fa-tags me-2"></i>
                                                Catégories
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <!-- Autres services -->
                            <li class="nav-item mb-2">
                                <a class="nav-link text-white ps-4 rounded-3 hover-primary" href="#">
                                    <i class="fas fa-broom me-2"></i>
                                    Nettoyage
                                </a>
                            </li>
                            <li class="nav-item mb-2">
                                <a class="nav-link text-white ps-4 rounded-3 hover-primary" href="#">
                                    <i class="fas fa-calendar-check me-2"></i>
                                    Événementiel
                                </a>
                            </li>
                            <li class="nav-item mb-2">
                                <a class="nav-link text-white ps-4 rounded-3 hover-primary" href="#">
                                    <i class="fas fa-lightbulb me-2"></i>
                                    Consulting
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Utilisateurs -->
                <li class="nav-item mb-2">
                    <a class="nav-link d-flex align-items-center text-white rounded-3 {{ Request::is('admin/users*') ? 'active bg-primary' : 'hover-primary' }}"
                        href="{{ route('admin.users.index') }}">
                        <i class="fas fa-users me-3"></i>
                        <span>Utilisateurs</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
