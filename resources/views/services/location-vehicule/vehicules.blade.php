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
    <div class="container-xxl py-5">
        <div class="">
            {{-- <!-- Header Start -->
            <div class="container-fluid header bg-white p-0">
                <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
                    <div class="col-md-6 p-5 mt-lg-5">
                        <h1 class="display-5 animated fadeIn mb-4">Type de vehicules</h1>
                        <nav aria-label="breadcrumb animated fadeIn">
                            <ol class="breadcrumb text-uppercase">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Accueil</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('location-vehicule.index') }}">Location
                                        Véhicule</a></li>
                                <li class="breadcrumb-item text-body active" aria-current="page">Véhicules</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-6 animated fadeIn">
                        <img class="img-fluid" src="{{ asset('img/header.jpg') }}" alt="">
                    </div>
                </div>
            </div>
            <!-- Header End --> --}}

            <!-- Search Start -->
            <div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
                <div class="container">
                    <div class="row g-2">
                        <div class="col-md-10">
                            <div class="row g-2">
                                <div class="col-md-4">
                                    <input type="text" class="form-control border-0 py-3" placeholder="Rechercher...">
                                </div>
                                <div class="col-md-4">
                                    <select class="form-select border-0 py-3" name="category">
                                        <option value="">Toutes les catégories</option>
                                        @foreach ($categories ?? [] as $category)
                                            <option value="{{ $category->id }}"
                                                {{ request('category') == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <select class="form-select border-0 py-3">
                                        <option selected>Transmission</option>
                                        <option value="manuel">Manuel</option>
                                        <option value="automatique">Automatique</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-dark border-0 w-100 py-3">Rechercher</button>
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
                                        <img class="img-fluid object-fit-cover"
                                            src="{{ asset('storage/' . $vehicle->images->first()->path) }}"
                                            alt="{{ $vehicle->name }}" style="width:100%; height:250px; object-fit:cover;">
                                    @else
                                        <img class="img-fluid object-fit-cover"
                                            src="{{ asset('img/HGL-Location800x533px.png') }}" alt="{{ $vehicle->name }}"
                                            style="width:100%; height:250px; object-fit:cover;">
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
                                    $ CA/jour</h5>
                                <a class="d-block h5 mb-2"
                                    href="{{ route('location-vehicule.show', $vehicle) }}">{{ $vehicle->name }}</a>
                                <p><i
                                        class="fa fa-map-marker-alt text-primary me-2"></i>{{ $vehicle->location ?? 'Abidjan, Côte d\'Ivoire' }}
                                </p>
                            </div>
                            <div class="d-flex border-top">
                                <small class="flex-fill text-center border-end py-2"><i
                                        class="fa fa-car text-primary me-2"></i>{{ ucfirst($vehicle->transmission) }}</small>
                                <small class="flex-fill text-center border-end py-2"><i
                                        class="fa fa-user text-primary me-2"></i>{{ $vehicle->seats }} places</small>
                                <small class="flex-fill text-center py-2"><i
                                        class="fa fa-gas-pump text-primary me-2"></i>{{ ucfirst($vehicle->fuel_type) }}</small>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p>Aucun véhicule disponible.</p>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if (isset($vehicles) && $vehicles->hasPages())
                <div class="d-flex justify-content-center mt-5">
                    {{ $vehicles->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection
