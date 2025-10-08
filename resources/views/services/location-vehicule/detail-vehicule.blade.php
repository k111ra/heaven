@extends('layouts.layout')
@section('content')
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="about-img position-relative overflow-hidden p-5 pe-0">
                        @if ($vehicle->images->isNotEmpty())
                            <img class="img-fluid w-100" src="{{ asset('storage/' . $vehicle->images->first()->path) }}"
                                alt="{{ $vehicle->name }}">
                        @else
                            <img class="img-fluid w-100" src="{{ asset('img/property-4.jpg') }}" alt="{{ $vehicle->name }}">
                        @endif
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <h1 class="mb-4">{{ $vehicle->name }}</h1>
                    <p class="mb-4">{{ $vehicle->description }}</p>
                    <p><strong>Prix :</strong> {{ number_format($vehicle->price_per_day, 0, ',', ' ') }} FCFA/jour</p>
                    <div class="row g-4 mb-4">
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center">
                                <i class="fa fa-car fa-2x text-primary flex-shrink-0 me-3"></i>
                                <h6 class="mb-0">Transmission: {{ $vehicle->transmission }}</h6>
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
                                <h6 class="mb-0">Carburant: {{ $vehicle->fuel_type }}</h6>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center">
                                <i class="fa fa-cog fa-2x text-primary flex-shrink-0 me-3"></i>
                                <h6 class="mb-0">Année: {{ $vehicle->year }}</h6>
                            </div>
                        </div>
                    </div>
                    <a class="btn btn-primary py-3 px-5 mt-3" href="#">Réserver maintenant</a>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-12">
                    <h2 class="mb-4">Caractéristiques du véhicule</h2>
                    <div class="row g-4">
                        <div class="col-lg-3 col-md-6">
                            <h5>Équipements</h5>
                            <ul class="list-unstyled">
                                <li><i class="fa fa-check text-primary me-2"></i>Climatisation</li>
                                <li><i class="fa fa-check text-primary me-2"></i>GPS</li>
                                <li><i class="fa fa-check text-primary me-2"></i>Bluetooth</li>
                                <li><i class="fa fa-check text-primary me-2"></i>USB</li>
                            </ul>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <h5>Sécurité</h5>
                            <ul class="list-unstyled">
                                <li><i class="fa fa-check text-primary me-2"></i>ABS</li>
                                <li><i class="fa fa-check text-primary me-2"></i>Airbags</li>
                                <li><i class="fa fa-check text-primary me-2"></i>Alarme</li>
                                <li><i class="fa fa-check text-primary me-2"></i>Caméra de recul</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
