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
                <img class="img-fluid" src="{{ asset('img/HGL-Location800x533px.png') }}" alt="Location de véhicule">
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
                @foreach ($categories as $category)
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                        <a class="cat-item d-block bg-light text-center rounded p-3"
                            href="{{ route('location-vehicule.list', ['category' => $category->id]) }}">
                            <div class="rounded p-4">
                                <div class="icon mb-3">
                                    @php
                                        $iconMap = [
                                            'Voiture' => 'icons8-car-100.png',
                                            'SUV' => 'icons8-suv-100.png',
                                            'Minibus' => 'icons8-minibus-100.png',
                                            'Camion' => 'icons8-truck-100.png',
                                            'Moto' => 'icons8-motorcycle-100.png',
                                            'Scooter' => 'icons8-scooter-100.png',
                                        ];
                                        $icon = $iconMap[$category->name] ?? 'icons8-car-100.png';
                                    @endphp
                                    <img class="img-fluid" src="{{ asset('img/' . $icon) }}" alt="{{ $category->name }}">
                                </div>
                                <h6>{{ $category->name }}</h6>
                                <span>{{ $category->vehicles_count ?? 0 }} véhicules</span>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Types de véhicules End -->
@endsection
