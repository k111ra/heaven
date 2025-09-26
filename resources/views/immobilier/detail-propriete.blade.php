@extends('layouts.layout')
@section('content')
    <!-- Header Start -->
    <div class="container-fluid header bg-white p-0">
        <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
            <div class="col-md-6 p-5 mt-lg-5">
                <h1 class="display-5 animated fadeIn mb-4">Détail de la propriété</h1>
                <nav aria-label="breadcrumb animated fadeIn">
                    <ol class="breadcrumb text-uppercase">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Accueil</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('/immobilier/proprietes') }}">Propriétés</a></li>
                        <li class="breadcrumb-item text-body active">Détail</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-6 animated fadeIn">
                <img class="img-fluid" src="{{ asset('img/property-4.jpg') }}" alt="Location de véhicule">
            </div>
        </div>
    </div>
    <!-- Header End -->

    <!-- Property Detail Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-8">
                    <div class="mb-5">
                        <h2 class="mb-3">Villa de luxe à Cocody</h2>
                        <h3 class="text-primary mb-4">150,000,000 FCFA</h3>
                        <p><i class="fa fa-map-marker-alt text-primary me-2"></i>Cocody Riviera, Abidjan</p>
                        <p class="mb-4">Description détaillée de la propriété avec toutes ses caractéristiques...</p>
                    </div>

                    <div class="mb-5">
                        <h4 class="mb-4">Caractéristiques de la propriété</h4>
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="d-flex align-items-center mb-3">
                                    <i class="fa fa-ruler-combined fa-2x text-primary me-3"></i>
                                    <div>
                                        <p class="mb-0">Surface</p>
                                        <h6>500 m²</h6>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center mb-3">
                                    <i class="fa fa-bed fa-2x text-primary me-3"></i>
                                    <div>
                                        <p class="mb-0">Chambres</p>
                                        <h6>5 chambres</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-center mb-3">
                                    <i class="fa fa-bath fa-2x text-primary me-3"></i>
                                    <div>
                                        <p class="mb-0">Salles de bain</p>
                                        <h6>4 salles de bain</h6>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center mb-3">
                                    <i class="fa fa-car fa-2x text-primary me-3"></i>
                                    <div>
                                        <p class="mb-0">Garage</p>
                                        <h6>2 places</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="bg-light rounded p-4 mb-5">
                        <h4 class="mb-4">Contacter l'agent</h4>
                        <div class="d-flex align-items-center mb-4">
                            <img class="flex-shrink-0 rounded-circle" src="{{ asset('img/agent.jpg') }}" alt=""
                                style="width: 50px; height: 50px;">
                            <div class="ms-3">
                                <h6 class="mb-1">John Doe</h6>
                                <small>Agent Immobilier</small>
                            </div>
                        </div>
                        <form>
                            <div class="mb-3">
                                <input type="text" class="form-control" placeholder="Votre nom">
                            </div>
                            <div class="mb-3">
                                <input type="email" class="form-control" placeholder="Votre email">
                            </div>
                            <div class="mb-3">
                                <textarea class="form-control" rows="4" placeholder="Message"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Envoyer un message</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Property Detail End -->
@endsection
