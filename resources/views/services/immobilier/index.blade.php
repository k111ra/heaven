@extends('layouts.layout')
@section('content')
    <!-- Header Start -->
    <div class="container-fluid header bg-white p-0">
        <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
            <div class="col-md-6 p-5 mt-lg-5">
                <h1 class="display-5 animated fadeIn mb-4">Type de propriété</h1>
                <nav aria-label="breadcrumb animated fadeIn">
                    <ol class="breadcrumb text-uppercase">
                        <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                        <li class="breadcrumb-item"><a href="#">Immobilier</a></li>
                        <li class="breadcrumb-item text-body active" aria-current="page">Type de propriété</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-6 animated fadeIn">
                <img class="img-fluid" src="img/header.jpg" alt="">
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- Category Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="mb-3">Property Types</h1>
                <p>Eirmod sed ipsum dolor sit rebum labore magna erat. Tempor ut dolore lorem kasd vero ipsum sit eirmod
                    sit. Ipsum diam justo sed rebum vero dolor duo.</p>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <a class="cat-item d-block bg-light text-center rounded p-3"
                        href="{{ route('immobilier.proprietes.index', ['type' => 'Appartement']) }}">
                        <div class="rounded p-4">
                            <div class="icon mb-3">
                                <img class="img-fluid" src="{{ asset('img/icons8-apartment-100.png') }}" alt="Icon">
                            </div>
                            <h6>Appartement</h6>
                            <span>{{ $propertyTypes['Appartement'] ?? 0 }} Propriétés</span>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                    <a class="cat-item d-block bg-light text-center rounded p-3"
                        href="{{ route('immobilier.proprietes.index', ['type' => 'Villa']) }}">
                        <div class="rounded p-4">
                            <div class="icon mb-3">
                                <img class="img-fluid" src="{{ asset('img/icon-villa.png') }}" alt="Icon">
                            </div>
                            <h6>Villa</h6>
                            <span>{{ $propertyTypes['Villa'] ?? 0 }} Propriétés</span>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                    <a class="cat-item d-block bg-light text-center rounded p-3"
                        href="{{ route('immobilier.proprietes.index', ['type' => 'Maison']) }}">
                        <div class="rounded p-4">
                            <div class="icon mb-3">
                                <img class="img-fluid" src="{{ asset('img/icon-house.png') }}" alt="Icon">
                            </div>
                            <h6>Maison</h6>
                            <span>{{ $propertyTypes['Maison'] ?? 0 }} Propriétés</span>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                    <a class="cat-item d-block bg-light text-center rounded p-3"
                        href="{{ route('immobilier.proprietes.index', ['type' => 'Bureau']) }}">
                        <div class="rounded p-4">
                            <div class="icon mb-3">
                                <img class="img-fluid" src="{{ asset('img/icon-housing.png') }}" alt="Icon">
                            </div>
                            <h6>Bureau</h6>
                            <span>{{ $propertyTypes['Bureau'] ?? 0 }} Propriétés</span>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <a class="cat-item d-block bg-light text-center rounded p-3"
                        href="{{ route('immobilier.proprietes.index', ['type' => 'Immeuble']) }}">
                        <div class="rounded p-4">
                            <div class="icon mb-3">
                                <img class="img-fluid" src="{{ asset('img/icon-building.png') }}" alt="Icon">
                            </div>
                            <h6>Immeuble</h6>
                            <span>{{ $propertyTypes['Immeuble'] ?? 0 }} Propriétés</span>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                    <a class="cat-item d-block bg-light text-center rounded p-3"
                        href="{{ route('immobilier.proprietes.index', ['type' => 'Terrain']) }}">
                        <div class="rounded p-4">
                            <div class="icon mb-3">
                                <img class="img-fluid" src="{{ asset('img/icon-neighborhood.png') }}" alt="Icon">
                            </div>
                            <h6>Terrain</h6>
                            <span>{{ $propertyTypes['Terrain'] ?? 0 }} Propriétés</span>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                    <a class="cat-item d-block bg-light text-center rounded p-3"
                        href="{{ route('immobilier.proprietes.index', ['type' => 'Commercial']) }}">
                        <div class="rounded p-4">
                            <div class="icon mb-3">
                                <img class="img-fluid" src="{{ asset('img/icon-condominium.png') }}" alt="Icon">
                            </div>
                            <h6>Commercial</h6>
                            <span>{{ $propertyTypes['Commercial'] ?? 0 }} Propriétés</span>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                    <a class="cat-item d-block bg-light text-center rounded p-3"
                        href="{{ route('immobilier.proprietes.index', ['type' => 'Entrepot']) }}">
                        <div class="rounded p-4">
                            <div class="icon mb-3">
                                <img class="img-fluid" src="{{ asset('img/icon-luxury.png') }}" alt="Icon">
                            </div>
                            <h6>Entrepôt</h6>
                            <span>{{ $propertyTypes['Entrepot'] ?? 0 }} Propriétés</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Category End -->
@endsection
