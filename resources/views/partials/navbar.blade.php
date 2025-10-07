 <!-- Navbar Start -->
 <div class="container-fluid nav-bar bg-transparent">
     <nav class="navbar navbar-expand-lg bg-white navbar-light py-0 px-4">
         <a href="/" class="navbar-brand d-flex align-items-center text-center">
             <div class="icon p-2 me-2">
                 <img class="img-fluid" src="{{ asset('img/logo.jpg') }}" alt="Icon"
                     style="width: 100px; height: 100px;">
             </div>
             <h1 class="m-0 text-primary"></h1>
         </a>
         <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
             <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarCollapse">
             <div class="navbar-nav ms-auto">
                 <a href="{{ url('/') }}" class="nav-item nav-link active">Accueil</a>
                 <a href="{{ url('/a-propos') }}" class="nav-item nav-link">À propos</a>
                 <div class="nav-item dropdown">
                     <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Services</a>
                     <div class="dropdown-menu rounded-0 m-0">
                         <a href="{{ url('/immobilier') }}" class="dropdown-item">IMMOBILIER</a>
                         <a href="{{ url('/location-vehicule') }}" class="dropdown-item">LOCATION DE VOITURE</a>
                         <a href="{{ url('/services/nettoyage') }}" class="dropdown-item">NETTOYAGE</a>
                         <a href="{{ url('/services/evenementiel') }}" class="dropdown-item">ÉVÉNEMENTIEL</a>
                         <a href="{{ url('/services/consulting') }}" class="dropdown-item">CONSULTING</a>

                     </div>
                 </div>
                 {{-- <div class="nav-item dropdown">
                     <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                     <div class="dropdown-menu rounded-0 m-0">
                         <a href="testimonial.html" class="dropdown-item">Témoignages</a>
                         <a href="404.html" class="dropdown-item">Erreur 404</a>
                     </div>
                 </div> --}}
                 {{-- <a href="{{ url('/contact') }}" class="nav-item nav-link">Contact</a> --}}
             </div>
             <a href="{{ url('contact') }}" class="btn btn-primary px-3 d-none d-lg-flex">Contact</a>
         </div>
     </nav>
 </div>
 <!-- Navbar End -->
