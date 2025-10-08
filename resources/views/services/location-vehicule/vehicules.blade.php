@extends('layouts.layout')
@section('content')
    <div class="container-xxl py-5">
        <div class="">
            <!-- Header Start -->
            <div class="container-fluid header bg-white p-0">
                <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
                    <div class="col-md-6 p-5 mt-lg-5">
                        <h1 class="display-5 animated fadeIn mb-4">Type de vehicules</h1>
                        <nav aria-label="breadcrumb animated fadeIn">
                            <ol class="breadcrumb text-uppercase">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                                <li class="breadcrumb-item text-body active" aria-current="page">type de vehicules</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-6 animated fadeIn">
                        <img class="img-fluid" src="{{ asset('img/header.jpg') }}" alt="">
                    </div>
                </div>
            </div>
            <!-- Header End -->
            <!-- Search Start -->
            <div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
                <div class="container">
                    <div class="row g-2">
                        <div class="col-md-10">
                            <div class="row g-2">
                                <div class="col-md-4">
                                    <input type="text" class="form-control border-0 py-3" placeholder="Search Keyword">
                                </div>
                                <div class="col-md-4">
                                    <select class="form-select border-0 py-3">
                                        <option selected>Property Type</option>
                                        <option value="1">Property Type 1</option>
                                        <option value="2">Property Type 2</option>
                                        <option value="3">Property Type 3</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <select class="form-select border-0 py-3">
                                        <option selected>Location</option>
                                        <option value="1">Location 1</option>
                                        <option value="2">Location 2</option>
                                        <option value="3">Location 3</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-dark border-0 w-100 py-3">Search</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Search End -->
            <div class="row g-4">
                @forelse($vehicles as $vehicle)
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="property-item rounded overflow-hidden">
                            <div class="position-relative overflow-hidden">
                                <a href="{{ route('location-vehicule.show', $vehicle) }}">
                                    @if ($vehicle->images->isNotEmpty())
                                        <img class="img-fluid"
                                            src="{{ asset('storage/' . $vehicle->images->first()->path) }}"
                                            alt="{{ $vehicle->name }}">
                                    @else
                                        <img class="img-fluid" src="{{ asset('img/property-4.jpg') }}"
                                            alt="{{ $vehicle->name }}">
                                    @endif
                                </a>
                                <div class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                                    À louer
                                </div>
                                <div
                                    class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">
                                    {{ $vehicle->category->name ?? 'Non catégorisé' }}
                                </div>
                            </div>
                            <div class="p-4 pb-0">
                                <h5 class="text-primary mb-3">{{ number_format($vehicle->price_per_day, 0, ',', ' ') }}
                                    FCFA/jour</h5>
                                <a class="d-block h5 mb-2"
                                    href="{{ route('location-vehicule.show', $vehicle) }}">{{ $vehicle->name }}</a>
                                <p><i
                                        class="fa fa-map-marker-alt text-primary me-2"></i>{{ $vehicle->location ?? 'Abidjan, Côte d\'Ivoire' }}
                                </p>
                            </div>
                            <div class="d-flex border-top">
                                <small class="flex-fill text-center border-end py-2"><i
                                        class="fa fa-car text-primary me-2"></i>{{ $vehicle->transmission }}</small>
                                <small class="flex-fill text-center border-end py-2"><i
                                        class="fa fa-user text-primary me-2"></i>{{ $vehicle->seats }} places</small>
                                <small class="flex-fill text-center py-2"><i
                                        class="fa fa-gas-pump text-primary me-2"></i>{{ $vehicle->fuel_type }}</small>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p>Aucun véhicule disponible.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
<small class="flex-fill text-center border-end py-2"><i class="fa fa-car text-primary me-2"></i>Manuelle</small>
<small class="flex-fill text-center border-end py-2"><i class="fa fa-user text-primary me-2"></i>5 places</small>
<small class="flex-fill text-center py-2"><i class="fa fa-gas-pump text-primary me-2"></i>Diesel</small>
</div>
</div>
</div>
<div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
    <div class="property-item rounded overflow-hidden">
        <div class="position-relative overflow-hidden">
            <a href="#"><img class="img-fluid" src="{{ asset('img/property-6.jpg') }}" alt=""></a>
            <div class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">À louer
            </div>
            <div class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">
                Minibus</div>
        </div>
        <div class="p-4 pb-0">
            <h5 class="text-primary mb-3">50 000 FCFA/jour</h5>
            <a class="d-block h5 mb-2" href="#">Toyota Hiace</a>
            <p><i class="fa fa-map-marker-alt text-primary me-2"></i>Abidjan, Côte d'Ivoire</p>
        </div>
        <div class="d-flex border-top">
            <small class="flex-fill text-center border-end py-2"><i
                    class="fa fa-car text-primary me-2"></i>Manuelle</small>
            <small class="flex-fill text-center border-end py-2"><i class="fa fa-user text-primary me-2"></i>15
                places</small>
            <small class="flex-fill text-center py-2"><i class="fa fa-gas-pump text-primary me-2"></i>Diesel</small>
        </div>
    </div>
</div>
<div class="col-12 text-center wow fadeInUp" data-wow-delay="0.1s">
    <a class="btn btn-primary py-3 px-5" href="#">Voir plus de véhicules</a>
</div>
</div>
</div>
</div>
@endsection
