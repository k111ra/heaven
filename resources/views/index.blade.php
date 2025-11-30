@extends('layouts.layout')
@section('title', 'Heaven League')

@push('styles')
    <style>
        /* Margin négatif uniquement sur desktop */
        @media (min-width: 768px) {
            .header {
                margin-top: -120px;
            }
        }

        /* Sur mobile, pas de margin négatif */
        @media (max-width: 767.98px) {
            .header {
                margin-top: 0;
            }
        }
    </style>
@endpush
@section('content')
    <!-- Header Start -->
    <div class="container-fluid p-0 header">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <ol class="carousel-indicators">
                @foreach ($slides as $index => $slide)
                    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $index }}"
                        @if ($index === 0) class="active" @endif></li>
                @endforeach
            </ol>
            <div class="carousel-inner">
                @foreach ($slides as $index => $slide)
                    <div class="carousel-item @if ($index === 0) active @endif">
                        <img class="d-block w-100" src="{{ asset('storage/' . $slide->image) }}" alt="{{ $slide->title }}">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>{{ $slide->title }}</h5>
                            <p>{{ $slide->description }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Header End -->

    <!-- Services Section Start -->
    <div class="container-xxl py-5" style="background:#f5f7fa;">
        <div class="container">
            <h2 class="text-center mb-4" style="font-weight:700;">Nos services, Notre Expertise</h2>
            <div class="row justify-content-center">
                <div class="col-md-2 col-6 text-center mb-3">
                    <a href="{{ url('/immobilier') }}">
                        <img src="img/icon-house.png" alt="Immobilier" style="height:60px;">
                        <div class="mt-2" style="font-weight:500;">IMMOBILIER</div>
                    </a>
                </div>
                <div class="col-md-2 col-6 text-center mb-3">
                    <a href="{{ url('/location-vehicule') }}">
                        <img src="{{ asset('img/icons8-car-100.png') }}" alt="Location de voiture" style="height:60px;">
                        <div class="mt-2" style="font-weight:500;">LOCATION DE VOITURE</div>
                    </a>
                </div>
                <div class="col-md-2 col-6 text-center mb-3">
                    <a href="{{ url('/services/nettoyage') }}">
                        <img src="{{ asset('img/icons8-housekeeping-100.png') }}" alt="Nettoyage" style="height:60px;">
                        <div class="mt-2" style="font-weight:500;">NETTOYAGE</div>
                    </a>
                </div>
                <div class="col-md-2 col-6 text-center mb-3">
                    <a href="{{ url('/services/evenementiel') }}">
                        <img src="{{ asset('img/icons8-event-100.png') }}" alt="Événementiel" style="height:60px;">
                        <div class="mt-2" style="font-weight:500;">ÉVÉNEMENTIEL</div>
                    </a>
                </div>
                <div class="col-md-2 col-6 text-center mb-3">
                    <a href="{{ url('/services/consulting') }}">
                        <img src="{{ asset('img/icons8-consulting-100.png') }}" alt="Consulting" style="height:60px;">
                        <div class="mt-2" style="font-weight:500;">CONSULTING</div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Services Section End -->


    <!-- Property List Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-0 gx-5 align-items-end">
                <div class="col-lg-6">
                    <div class="text-start mx-auto mb-5 wow slideInLeft" data-wow-delay="0.1s">
                        <h1 class="mb-3">Aperçu des maisons</h1>
                        <p>Découvrez nos maisons disponibles à la vente ou à la location. Trouvez la propriété idéale pour
                            vous et votre famille.</p>
                    </div>
                </div>
                <div class="col-lg-6 text-start text-lg-end wow slideInRight" data-wow-delay="0.1s">
                    <ul class="nav nav-pills d-inline-flex justify-content-end mb-5">
                        <li class="nav-item me-2">
                            <a class="btn btn-outline-primary active" data-bs-toggle="pill" href="#tab-1">En vedette</a>
                        </li>
                        <li class="nav-item me-2">
                            <a class="btn btn-outline-primary" data-bs-toggle="pill" href="#tab-2">À vendre</a>
                        </li>
                        <li class="nav-item me-0">
                            <a class="btn btn-outline-primary" data-bs-toggle="pill" href="#tab-3">À louer</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade show p-0 active">
                    <div class="row g-4">
                        @foreach ($proprietes as $property)
                            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="property-item rounded overflow-hidden">
                                    <div class="position-relative overflow-hidden">
                                        <a href="{{ route('immobilier.detail', $property) }}">
                                            <div
                                                style="width:100%; aspect-ratio: 4/3; overflow:hidden; background:#f5f5f5;">
                                                <img class="img-fluid"
                                                    src="{{ $property->image_url ?? asset('img/property-1.jpg') }}"
                                                    alt="{{ $property->title }}"
                                                    style="width:100%; height:100%; object-fit:cover; object-position:center;">
                                            </div>
                                        </a>
                                        <div
                                            class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                                            {{ $property->status === 'sale' ? 'À vendre' : 'À louer' }}
                                        </div>
                                        <div
                                            class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">
                                            {{ $property->type ?? 'Type inconnu' }}
                                        </div>
                                    </div>
                                    <div class="p-4 pb-0">
                                        <h5 class="text-primary mb-3">
                                            {{ number_format($property->price, 0, ',', ' ') }} $ CA
                                        </h5>
                                        <a class="d-block h5 mb-2" href="{{ route('immobilier.detail', $property) }}">
                                            {{ $property->title }}
                                        </a>
                                        <p>
                                            <i class="fa fa-map-marker-alt text-primary me-2"></i>
                                            {{ $property->address ?? 'Abidjan, Côte d\'Ivoire' }}
                                        </p>
                                    </div>
                                    <div class="d-flex border-top">
                                        <small class="flex-fill text-center border-end py-2">
                                            <i class="fa fa-ruler-combined text-primary me-2"></i>
                                            {{ $property->surface ?? 'N/A' }} m²
                                        </small>
                                        <small class="flex-fill text-center border-end py-2">
                                            <i class="fa fa-bed text-primary me-2"></i>
                                            {{ $property->bedrooms ?? 0 }} Chambres
                                        </small>
                                        <small class="flex-fill text-center py-2">
                                            <i class="fa fa-bath text-primary me-2"></i>
                                            {{ $property->bathrooms ?? 0 }} Salles de bain
                                        </small>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.1s">
                            <a class="btn btn-primary py-3 px-5" href="{{ url('/immobilier/proprietes') }}">Voir plus
                                proprietes</a>
                        </div>
                    </div>
                </div>
                <div id="tab-2" class="tab-pane fade show p-0">
                    <div class="row g-4">
                        @foreach ($propertiesForSale as $property)
                            <div class="col-lg-4 col-md-6">
                                <div class="property-item rounded overflow-hidden">
                                    <div class="position-relative overflow-hidden">
                                        <a href="{{ route('immobilier.detail', $property) }}">
                                            <div
                                                style="width:100%; aspect-ratio: 4/3; overflow:hidden; background:#f5f5f5;">
                                                <img class="img-fluid"
                                                    src="{{ $property->image_url ?? asset('img/property-1.jpg') }}"
                                                    alt="{{ $property->title }}"
                                                    style="width:100%; height:100%; object-fit:cover; object-position:center;">
                                            </div>
                                        </a>
                                        <div
                                            class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                                            À vendre
                                        </div>
                                        <div
                                            class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">
                                            {{ $property->type ?? 'Type inconnu' }}
                                        </div>
                                    </div>
                                    <div class="p-4 pb-0">
                                        <h5 class="text-primary mb-3">
                                            {{ number_format($property->price, 0, ',', ' ') }} $ CA
                                        </h5>
                                        <a class="d-block h5 mb-2" href="{{ route('immobilier.detail', $property) }}">
                                            {{ $property->title }}
                                        </a>
                                        <p>
                                            <i class="fa fa-map-marker-alt text-primary me-2"></i>
                                            {{ $property->address ?? 'Abidjan, Côte d\'Ivoire' }}
                                        </p>
                                    </div>
                                    <div class="d-flex border-top">
                                        <small class="flex-fill text-center border-end py-2">
                                            <i class="fa fa-ruler-combined text-primary me-2"></i>
                                            {{ $property->surface ?? 'N/A' }} m²
                                        </small>
                                        <small class="flex-fill text-center border-end py-2">
                                            <i class="fa fa-bed text-primary me-2"></i>
                                            {{ $property->bedrooms ?? 0 }} Chambres
                                        </small>
                                        <small class="flex-fill text-center py-2">
                                            <i class="fa fa-bath text-primary me-2"></i>
                                            {{ $property->bathrooms ?? 0 }} Salles de bain
                                        </small>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.1s">
                            <a class="btn btn-primary py-3 px-5" href="{{ url('/immobilier/proprietes') }}">Voir plus
                                proprietes</a>
                        </div>
                    </div>
                </div>
                <div id="tab-3" class="tab-pane fade show p-0">
                    <div class="row g-4">
                        @foreach ($propertiesForRent as $property)
                            <div class="col-lg-4 col-md-6">
                                <div class="property-item rounded overflow-hidden">
                                    <div class="position-relative overflow-hidden">
                                        <a href="{{ route('immobilier.detail', $property) }}">
                                            <div
                                                style="width:100%; aspect-ratio: 4/3; overflow:hidden; background:#f5f5f5;">
                                                <img class="img-fluid"
                                                    src="{{ $property->image_url ?? asset('img/property-1.jpg') }}"
                                                    alt="{{ $property->title }}"
                                                    style="width:100%; height:100%; object-fit:cover; object-position:center;">
                                            </div>
                                        </a>
                                        <div
                                            class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                                            À louer
                                        </div>
                                        <div
                                            class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">
                                            {{ $property->type ?? 'Type inconnu' }}
                                        </div>
                                    </div>
                                    <div class="p-4 pb-0">
                                        <h5 class="text-primary mb-3">
                                            {{ number_format($property->price, 0, ',', ' ') }} $ CA
                                        </h5>
                                        <a class="d-block h5 mb-2" href="{{ route('immobilier.detail', $property) }}">
                                            {{ $property->title }}
                                        </a>
                                        <p>
                                            <i class="fa fa-map-marker-alt text-primary me-2"></i>
                                            {{ $property->address ?? 'Abidjan, Côte d\'Ivoire' }}
                                        </p>
                                    </div>
                                    <div class="d-flex border-top">
                                        <small class="flex-fill text-center border-end py-2">
                                            <i class="fa fa-ruler-combined text-primary me-2"></i>
                                            {{ $property->surface ?? 'N/A' }} m²
                                        </small>
                                        <small class="flex-fill text-center border-end py-2">
                                            <i class="fa fa-bed text-primary me-2"></i>
                                            {{ $property->bedrooms ?? 0 }} Chambres
                                        </small>
                                        <small class="flex-fill text-center py-2">
                                            <i class="fa fa-bath text-primary me-2"></i>
                                            {{ $property->bathrooms ?? 0 }} Salles de bain
                                        </small>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.1s">
                            <a class="btn btn-primary py-3 px-5" href="{{ url('/immobilier/proprietes') }}">Voir plus
                                proprietes</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Property List End -->
    <!-- Aperçu des véhicules Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-0 gx-5 align-items-end">
                <div class="col-lg-6">
                    <div class="text-start mx-auto mb-5 wow slideInLeft" data-wow-delay="0.1s">
                        <h1 class="mb-3">Aperçu des véhicules</h1>
                        <p>Découvrez notre sélection de véhicules disponibles à la location pour tous vos besoins.</p>
                    </div>
                </div>
            </div>
            <div class="row g-4">
                @forelse($vehicules as $vehicule)
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="property-item rounded overflow-hidden">
                            <div class="position-relative overflow-hidden">
                                <a href="{{ route('location-vehicule.show', $vehicule) }}">
                                    <div style="width:100%; aspect-ratio: 4/3; overflow:hidden; background:#f5f5f5;">
                                        @if ($vehicule->images->isNotEmpty())
                                            <img class="img-fluid"
                                                src="{{ asset('storage/' . $vehicule->images->first()->path) }}"
                                                alt="{{ $vehicule->name }}"
                                                style="width:100%; height:100%; object-fit:cover; object-position:center;">
                                        @else
                                            <img class="img-fluid" src="{{ asset('img/property-4.jpg') }}"
                                                alt="{{ $vehicule->name }}"
                                                style="width:100%; height:100%; object-fit:cover; object-position:center;">
                                        @endif
                                    </div>
                                </a>
                                <div class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                                    À louer
                                </div>
                                <div
                                    class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">
                                    {{ $vehicule->category->name ?? 'Non catégorisé' }}
                                </div>
                            </div>
                            <div class="p-4 pb-0">
                                <h5 class="text-primary mb-3">{{ number_format($vehicule->price_per_day, 0, ',', ' ') }}
                                    $ CA/jour</h5>
                                <a class="d-block h5 mb-2"
                                    href="{{ route('location-vehicule.show', $vehicule) }}">{{ $vehicule->name }}</a>
                                <p><i class="fa fa-map-marker-alt text-primary me-2"></i>
                                    Abidjan, Côte d'Ivoire
                                </p>
                            </div>
                            <div class="d-flex border-top">
                                <small class="flex-fill text-center border-end py-2">
                                    <i class="fa fa-car text-primary me-2"></i>{{ $vehicule->transmission }}
                                </small>
                                <small class="flex-fill text-center border-end py-2">
                                    <i class="fa fa-user text-primary me-2"></i>{{ $vehicule->seats }} places
                                </small>
                                <small class="flex-fill text-center py-2">
                                    <i class="fa fa-gas-pump text-primary me-2"></i>{{ $vehicule->fuel_type }}
                                </small>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p>Aucun véhicule disponible pour le moment.</p>
                    </div>
                @endforelse
                <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.1s">
                    <a class="btn btn-primary py-3 px-5" href="{{ route('location-vehicule.index') }}">Voir plus</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Aperçu des véhicules End -->





    <!-- Section Nettoyage Start -->
    <div class="container-xxl py-5">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="mb-3">Nos Autres service !</h1>
            <p>Eirmod sed ipsum dolor sit rebum labore magna erat. Tempor ut dolore lorem kasd vero ipsum sit
                eirmod sit. Ipsum diam justo sed rebum vero dolor duo.</p>
        </div>
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <img class="img-fluid w-100" src=" {{ asset('img/HGL-Nettoyage-800x533px.png') }}" alt="Nettoyage">
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <h1 class="mb-4">Service de Nettoyage</h1>
                    <p class="mb-4">Nous proposons des services de nettoyage professionnels pour vos maisons, bureaux et
                        locaux commerciaux. Qualité et rapidité garanties.</p>
                    <a class="btn btn-primary py-2 px-4 mt-2" href="{{ url('/services/nettoyage') }}">Voir plus</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Section Nettoyage End -->

    <!-- Section Événementiel Start -->
    <div class="container-xxl py-5 bg-light">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <img class="img-fluid w-100" src="{{ asset('img/Event-800x533.png') }}" alt="Événementiel">
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <h1 class="mb-4">Organisation Événementielle</h1>
                    <p class="mb-4">Confiez-nous l’organisation de vos événements privés ou professionnels. Notre équipe
                        assure la réussite de vos projets.</p>
                    <a class="btn btn-primary py-2 px-4 mt-2" href="{{ url('/services/evenementiel') }}">Voir plus</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Section Événementiel End -->

    <!-- Section Consulting Start -->
    <div class="container-xxl py-5 ">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <img class="img-fluid w-100" src="{{ asset('img/HGL-consulting-800x533px.png') }}" alt="Consulting">
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <h1 class="mb-4">Consulting</h1>
                    <p class="mb-4">Bénéficiez de notre expertise en consulting pour optimiser vos projets immobiliers,
                        événementiels ou commerciaux.</p>
                    <a class="btn btn-primary py-2 px-4 mt-2" href="{{ url('/services/consulting') }}">Voir plus</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Section Consulting End -->



    <!-- Call to Action Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="bg-light rounded p-3">
                <div class="bg-white rounded p-4" style="border: 1px dashed rgba(0, 185, 142, .3)">
                    <div class="row g-5 align-items-center">
                        <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                            <img class="img-fluid rounded w-100" src="img/call-to-action.jpg" alt="">
                        </div>
                        <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                            <div class="mb-4">
                                <h1 class="mb-3">Contactez notre agent certifié</h1>
                                <p>Eirmod sed ipsum dolor sit rebum magna erat. Tempor lorem kasd vero ipsum sit sit
                                    diam justo sed vero dolor duo.</p>
                            </div>
                            <a href="{{ url
                                    class="fa fa-phone-alt me-2"></i>Make A Call</a>
                            <a href="{{ url('/contact') }}" class="btn btn-dark py-3 px-4"><i
                                    class="fa fa-calendar-alt me-2"></i>demandez une visite</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Call to Action End -->


    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="mb-3">Nos Agents</h1>
                <p>Eirmod sed ipsum dolor sit rebum labore magna erat. Tempor ut dolore lorem kasd vero ipsum sit
                    eirmod sit. Ipsum diam justo sed rebum vero dolor duo.</p>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item rounded overflow-hidden">
                        <div class="position-relative">
                            <img class="img-fluid" src="img/team-1.jpg" alt="">
                            <div class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4 mt-3">
                            <h5 class="fw-bold mb-0">Full Name</h5>
                            <small>Designation</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="team-item rounded overflow-hidden">
                        <div class="position-relative">
                            <img class="img-fluid" src="img/team-2.jpg" alt="">
                            <div class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4 mt-3">
                            <h5 class="fw-bold mb-0">Full Name</h5>
                            <small>Designation</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="team-item rounded overflow-hidden">
                        <div class="position-relative">
                            <img class="img-fluid" src="img/team-3.jpg" alt="">
                            <div class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4 mt-3">
                            <h5 class="fw-bold mb-0">Full Name</h5>
                            <small>Designation</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="team-item rounded overflow-hidden">
                        <div class="position-relative">
                            <img class="img-fluid" src="img/team-4.jpg" alt="">
                            <div class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4 mt-3">
                            <h5 class="fw-bold mb-0">Full Name</h5>
                            <small>Designation</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->


    <!-- Testimonial Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="mb-3">Nos Clients disent !</h1>
                <p>Eirmod sed ipsum dolor sit rebum labore magna erat. Tempor ut dolore lorem kasd vero ipsum sit
                    eirmod sit. Ipsum diam justo sed rebum vero dolor duo.</p>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                <div class="testimonial-item bg-light rounded p-3">
                    <div class="bg-white border rounded p-4">
                        <p>Tempor stet labore dolor clita stet diam amet ipsum dolor duo ipsum rebum stet dolor amet
                            diam stet. Est stet ea lorem amet est kasd kasd erat eos</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded" src="img/testimonial-1.jpg"
                                style="width: 45px; height: 45px;">
                            <div class="ps-3">
                                <h6 class="fw-bold mb-1">Client Name</h6>
                                <small>Profession</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item bg-light rounded p-3">
                    <div class="bg-white border rounded p-4">
                        <p>Tempor stet labore dolor clita stet diam amet ipsum dolor duo ipsum rebum stet dolor amet
                            diam stet. Est stet ea lorem amet est kasd kasd erat eos</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded" src="img/testimonial-2.jpg"
                                style="width: 45px; height: 45px;">
                            <div class="ps-3">
                                <h6 class="fw-bold mb-1">Client Name</h6>
                                <small>Profession</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item bg-light rounded p-3">
                    <div class="bg-white border rounded p-4">
                        <p>Tempor stet labore dolor clita stet diam amet ipsum dolor duo ipsum rebum stet dolor amet
                            diam stet. Est stet ea lorem amet est kasd kasd erat eos</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded" src="img/testimonial-3.jpg"
                                style="width: 45px; height: 45px;">
                            <div class="ps-3">
                                <h6 class="fw-bold mb-1">Client Name</h6>
                                <small>Profession</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
