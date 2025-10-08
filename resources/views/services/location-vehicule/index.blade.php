@extends('layouts.layout')
@section('content')
    <div class="container-fluid header bg-white p-0">
        <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
            <div class="col-md-6 p-5 mt-lg-5">
                <h1 class="display-5 animated fadeIn mb-4">Location de Véhicule</h1>
                <nav aria-label="breadcrumb animated fadeIn">
                    <ol class="breadcrumb text-uppercase">
                        <li class="breadcrumb-item"><a href="/">Accueil</a></li>
                        <li class="breadcrumb-item text-body active" aria-current="page">Location de Véhicule</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-6 animated fadeIn">
                <img class="img-fluid" src="{{ asset('img/property-4.jpg') }}" alt="Location de véhicule">
            </div>
        </div>
    </div>

    <!-- Types de véhicules Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="mb-3">Types de véhicules</h1>
                <p>Choisissez parmi nos différentes catégories de véhicules pour répondre à tous vos besoins de déplacement.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <a class="cat-item d-block bg-light text-center rounded p-3"
                        href="{{ route('location-vehicule.list') }}">
                        <div class="rounded p-4">
                            <div class="icon mb-3">
                                <img class="img-fluid" src="{{ asset('img/icons8-car-100.png') }}" alt="Voiture">
                            </div>
                            <h6>Voiture</h6>
                            <span>45 véhicules</span>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                    <a class="cat-item d-block bg-light text-center rounded p-3"
                        href="{{ route('location-vehicule.list') }}">
                        <div class="rounded p-4">
                            <div class="icon mb-3">
                                <img class="img-fluid" src="{{ asset('img/icons8-suv-100.png') }}" alt="SUV">
                            </div>
                            <h6>SUV</h6>
                            <span>18 véhicules</span>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                    <a class="cat-item d-block bg-light text-center rounded p-3"
                        href="{{ route('location-vehicule.list') }}">
                        <div class="rounded p-4">
                            <div class="icon mb-3">
                                <img class="img-fluid" src="{{ asset('img/icons8-minibus-100.png') }}" alt="Minibus">
                            </div>
                            <h6>Minibus</h6>
                            <span>7 véhicules</span>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                    <a class="cat-item d-block bg-light text-center rounded p-3"
                        href="{{ route('location-vehicule.list') }}">
                        <div class="rounded p-4">
                            <div class="icon mb-3">
                                <img class="img-fluid" src="{{ asset('img/icons8-truck-100.png') }}" alt="Camion">
                            </div>
                            <h6>Camion</h6>
                            <span>3 véhicules</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Types de véhicules End -->
@endsection
