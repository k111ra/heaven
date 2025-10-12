@extends('layouts.layout')
@section('content')
    <!-- Header Start -->
    <div class="container-fluid header bg-white p-0">
        <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
            <div class="col-md-6 p-5 mt-lg-5">
                <h1 class="display-5 animated fadeIn mb-4">{{ $vehicle->name }}</h1>
                <nav aria-label="breadcrumb animated fadeIn">
                    <ol class="breadcrumb text-uppercase">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Accueil</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('location-vehicule.index') }}">Location Véhicule</a>
                        </li>
                        <li class="breadcrumb-item text-body active">{{ $vehicle->name }}</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-6 animated fadeIn">
                @if ($vehicle->images->isNotEmpty())
                    <img class="img-fluid" src="{{ asset('storage/' . $vehicle->images->first()->path) }}"
                        alt="{{ $vehicle->name }}">
                @else
                    <img class="img-fluid" src="{{ asset('img/property-4.jpg') }}" alt="{{ $vehicle->name }}">
                @endif
            </div>
        </div>
    </div>
    <!-- Header End -->

    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="about-img position-relative overflow-hidden p-5 pe-0">
                        @if ($vehicle->images->isNotEmpty())
                            <img class="img-fluid w-100" src="{{ asset('storage/' . $vehicle->images->first()->path) }}"
                                alt="{{ $vehicle->name }}">
                        @else
                            <img class="img-fluid w-100" src="{{ asset('img/property-4.jpg') }}"
                                alt="{{ $vehicle->name }}">
                        @endif
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <h1 class="mb-4">{{ $vehicle->name }}</h1>
                    <p class="mb-4">{{ $vehicle->description }}</p>
                    <p><strong>Prix :</strong> {{ number_format($vehicle->price_per_day, 0, ',', ' ') }} $ CA/jour</p>
                    <div class="row g-4 mb-4">
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center">
                                <i class="fa fa-car fa-2x text-primary flex-shrink-0 me-3"></i>
                                <h6 class="mb-0">Transmission: {{ ucfirst($vehicle->transmission) }}</h6>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center">
                                <i class="fa fa-user fa-2x text-primary flex-shrink-0 me-3"></i>
                                <h6 class="mb-0">Capacité: {{ $vehicle->seats }} places</h6>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center">
                                <i class="fa fa-gas-pump fa-2x text-primary flex-shrink-0 me-3"></i>
                                <h6 class="mb-0">Carburant: {{ ucfirst($vehicle->fuel_type) }}</h6>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center">
                                <i class="fa fa-cog fa-2x text-primary flex-shrink-0 me-3"></i>
                                <h6 class="mb-0">Année: {{ $vehicle->year }}</h6>
                            </div>
                        </div>
                    </div>
                    <a class="btn btn-primary py-3 px-5 mt-3" href="{{ url('/contact') }}">Réserver maintenant</a>
                </div>
            </div>

            @if (isset($similarVehicles) && $similarVehicles->count() > 0)
                <div class="row mt-5">
                    <div class="col-12">
                        <h2 class="mb-4">Véhicules similaires</h2>
                        <div class="row g-4">
                            @foreach ($similarVehicles as $similar)
                                <div class="col-lg-4 col-md-6">
                                    <div class="property-item rounded overflow-hidden">
                                        <div class="position-relative overflow-hidden">
                                            <a href="{{ route('location-vehicule.show', $similar) }}">
                                                @if ($similar->images->isNotEmpty())
                                                    <img class="img-fluid"
                                                        src="{{ asset('storage/' . $similar->images->first()->path) }}"
                                                        alt="{{ $similar->name }}">
                                                @else
                                                    <img class="img-fluid" src="{{ asset('img/property-4.jpg') }}"
                                                        alt="{{ $similar->name }}">
                                                @endif
                                            </a>
                                            <div
                                                class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                                                À louer
                                            </div>
                                        </div>
                                        <div class="p-4 pb-0">
                                            <h5 class="text-primary mb-3">
                                                {{ number_format($similar->price_per_day, 0, ',', ' ') }} $ CA/jour</h5>
                                            <a class="d-block h5 mb-2"
                                                href="{{ route('location-vehicule.show', $similar) }}">{{ $similar->name }}</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
