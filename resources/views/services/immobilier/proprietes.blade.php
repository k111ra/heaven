@extends('layouts.layout')
@section('content')
    <!-- Header Start -->
    <div class="container-fluid header bg-white p-0">
        <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
            <div class="col-md-6 p-5 mt-lg-5">
                <h1 class="display-5 animated fadeIn mb-4">Nos Propriétés</h1>
                <nav aria-label="breadcrumb animated fadeIn">
                    <ol class="breadcrumb text-uppercase">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Accueil</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('immobilier.index') }}">Immobilier</a></li>
                        <li class="breadcrumb-item text-body active" aria-current="page">Propriétés</li>
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
            <form action="{{ route('immobilier.proprietes.search') }}" method="GET">
                <div class="row g-2">
                    <div class="col-md-10">
                        <div class="row g-2">
                            <div class="col-md-2">
                                <input type="text" name="q" class="form-control border-0 py-3"
                                    placeholder="Rechercher..." value="{{ request('q') }}">
                            </div>
                            <div class="col-md-2">
                                <select name="type" class="form-select border-0 py-3">
                                    <option value="">Type de bien</option>
                                    @foreach (\App\Models\Property::getTypes() as $key => $value)
                                        <option value="{{ $key }}"
                                            {{ request('type') === $key ? 'selected' : '' }}>
                                            {{ $value }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2">
                                <select name="status" class="form-select border-0 py-3">
                                    <option value="">Tous les statuts</option>
                                    <option value="sale" {{ request('status') === 'sale' ? 'selected' : '' }}>À vendre
                                    </option>
                                    <option value="rent" {{ request('status') === 'rent' ? 'selected' : '' }}>À louer
                                    </option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <input type="number" name="price_min" class="form-control border-0 py-3"
                                    placeholder="Prix min ($ CA)" value="{{ request('price_min') }}">
                            </div>
                            <div class="col-md-3">
                                <input type="number" name="price_max" class="form-control border-0 py-3"
                                    placeholder="Prix max ($ CA)" value="{{ request('price_max') }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-dark border-0 w-100 py-3">Rechercher</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Search End -->

    <!-- Property List Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-0 gx-5 align-items-end">
                <div class="col-lg-6">
                    <div class="text-start mx-auto mb-5 wow slideInLeft" data-wow-delay="0.1s">
                        <h1 class="mb-3">Nos Propriétés</h1>
                        <p>Découvrez notre sélection de propriétés à vendre et à louer dans les meilleurs quartiers
                            d'Abidjan.</p>
                    </div>
                </div>
                <div class="col-lg-6 text-start text-lg-end wow slideInRight" data-wow-delay="0.1s">
                    <p class="text-muted">{{ $proprietes->total() }} propriété(s) trouvée(s)</p>
                </div>
            </div>

            @include('services.immobilier.partials.property-list', ['proprietes' => $proprietes])

            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-5">
                {{ $proprietes->links() }}
            </div>
        </div>
    </div>
    <!-- Property List End -->

    <!-- Call to Action Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="bg-light rounded p-3">
                <div class="bg-white rounded p-4" style="border: 1px dashed rgba(0, 185, 142, .3)">
                    <div class="row g-5 align-items-center">
                        <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                            <img class="img-fluid rounded w-100" src="{{ asset('img/call-to-action.jpg') }}"
                                alt="">
                        </div>
                        <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                            <div class="mb-4">
                                <h1 class="mb-3">Contactez notre agent certifié</h1>
                                <p>Contactez-nous pour plus d'informations sur nos propriétés et pour organiser une visite.
                                </p>
                            </div>
                            <a href="{{ route('contact') }}" class="btn btn-primary py-3 px-4 me-2">
                                <i class="fa fa-phone-alt me-2"></i>Nous appeler
                            </a>
                            <a href="{{ route('contact') }}" class="btn btn-dark py-3 px-4">
                                <i class="fa fa-calendar-alt me-2"></i>Demander une visite
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Call to Action End -->
@endsection
