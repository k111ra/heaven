@extends('layouts.layout')
@section('content')
    <!-- Header Start -->
    <div class="container-fluid header bg-white p-0">
        <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
            <div class="col-md-6 p-5 mt-lg-5">
                <h1 class="display-5 animated fadeIn mb-4">Service de Nettoyage</h1>
                <nav aria-label="breadcrumb animated fadeIn">
                    <ol class="breadcrumb text-uppercase">
                        <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                        <li class="breadcrumb-item"><a href="#">Services</a></li>
                        <li class="breadcrumb-item text-body active" aria-current="page">Nettoyage</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-6 animated fadeIn">
                <img class="img-fluid" src="{{ asset('img/HGL-Nettoyage-800x533px.png') }}" alt="">
            </div>
        </div>
    </div>
    <!-- Header End -->
    <div class="container py-5">

        <div>
            <h1 class="mb-4">Service de Nettoyage</h1>
            <p>Nous proposons des services de nettoyage professionnels pour maisons, bureaux et locaux commerciaux. Qualité
                et
                rapidité garanties.</p>
            <a class="btn btn-primary mt-3" href="/">Contactez-Nous</a>
        </div>

    </div>
@endsection
