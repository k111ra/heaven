@extends('layouts.layout')
@section('content')
    <!-- Header Start -->
    <div class="container-fluid header bg-white p-0">
        <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
            <div class="col-md-6 p-5 mt-lg-5">
                <h1 class="display-5 animated fadeIn mb-4">{{ $property->title }}</h1>
                <nav aria-label="breadcrumb animated fadeIn">
                    <ol class="breadcrumb text-uppercase">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Accueil</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('immobilier.proprietes.index') }}">Propriétés</a></li>
                        <li class="breadcrumb-item text-body active">{{ $property->title }}</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-6 animated fadeIn">
                <img class="img-fluid" src="{{ $property->image_url }}" alt="{{ $property->title }}">
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
                        <h2 class="mb-3">{{ $property->title }}</h2>
                        <h3 class="text-primary mb-4">{{ $property->price_formatted }} $ CA</h3>
                        <p><i class="fa fa-map-marker-alt text-primary me-2"></i>{{ $property->address }}</p>
                        <div class="badge bg-{{ $property->status === 'sale' ? 'success' : 'info' }} mb-3">
                            {{ $property->status === 'sale' ? 'À vendre' : 'À louer' }}
                        </div>
                        <p class="mb-4">{{ $property->description }}</p>
                    </div>

                    <div class="mb-5">
                        <h4 class="mb-4">Caractéristiques de la propriété</h4>
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="d-flex align-items-center mb-3">
                                    <i class="fa fa-ruler-combined fa-2x text-primary me-3"></i>
                                    <div>
                                        <p class="mb-0">Surface</p>
                                        <h6>{{ $property->surface ?? 'Non spécifié' }} m²</h6>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center mb-3">
                                    <i class="fa fa-bed fa-2x text-primary me-3"></i>
                                    <div>
                                        <p class="mb-0">Chambres</p>
                                        <h6>{{ $property->bedrooms ?? 0 }} chambre(s)</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-center mb-3">
                                    <i class="fa fa-bath fa-2x text-primary me-3"></i>
                                    <div>
                                        <p class="mb-0">Salles de bain</p>
                                        <h6>{{ $property->bathrooms ?? 0 }} salle(s) de bain</h6>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center mb-3">
                                    <i class="fa fa-car fa-2x text-primary me-3"></i>
                                    <div>
                                        <p class="mb-0">Garage</p>
                                        <h6>{{ $property->garage ?? 0 }} place(s)</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if ($similarProperties->count() > 0)
                        <div class="mb-5">
                            <h4 class="mb-4">Propriétés similaires</h4>
                            <div class="row g-4">
                                @foreach ($similarProperties as $similar)
                                    <div class="col-md-4">
                                        <div class="property-item rounded overflow-hidden">
                                            <div class="position-relative overflow-hidden">
                                                <a href="{{ route('immobilier.proprietes.show', $similar) }}">
                                                    <img class="img-fluid" src="{{ $similar->image_url }}"
                                                        alt="{{ $similar->title }}">
                                                </a>
                                                <div
                                                    class="bg-primary rounded text-white position-absolute start-0 top-0 m-2 py-1 px-2">
                                                    {{ $similar->status === 'sale' ? 'À vendre' : 'À louer' }}
                                                </div>
                                            </div>
                                            <div class="p-3">
                                                <h6 class="text-primary mb-2">{{ $similar->price_formatted }} $ CA</h6>
                                                <a class="d-block mb-2"
                                                    href="{{ route('immobilier.proprietes.show', $similar) }}">
                                                    {{ Str::limit($similar->title, 30) }}
                                                </a>
                                                <small><i
                                                        class="fa fa-map-marker-alt text-primary me-1"></i>{{ $similar->address }}</small>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>

                <div class="col-lg-4">
                    <div class="bg-light rounded p-4 mb-5">
                        <h4 class="mb-4">Contacter l'agent</h4>
                        @if ($property->agent)
                            <div class="d-flex align-items-center mb-4">
                                <img class="flex-shrink-0 rounded-circle" src="{{ asset('img/agent.jpg') }}" alt=""
                                    style="width: 50px; height: 50px;">
                                <div class="ms-3">
                                    <h6 class="mb-1">{{ $property->agent->name }}</h6>
                                    <small>Agent Immobilier</small>
                                </div>
                            </div>
                        @endif

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form action="{{ route('immobilier.proprietes.contact', $property) }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <input type="text" name="name"
                                    class="form-control @error('name') is-invalid @enderror" placeholder="Votre nom"
                                    value="{{ old('name') }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <input type="email" name="email"
                                    class="form-control @error('email') is-invalid @enderror" placeholder="Votre email"
                                    value="{{ old('email') }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <input type="text" name="phone"
                                    class="form-control @error('phone') is-invalid @enderror" placeholder="Votre téléphone"
                                    value="{{ old('phone') }}">
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <textarea name="message" class="form-control @error('message') is-invalid @enderror" rows="4"
                                    placeholder="Votre message..." required>{{ old('message', 'Je suis intéressé(e) par cette propriété. Pouvez-vous me contacter ?') }}</textarea>
                                @error('message')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
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
