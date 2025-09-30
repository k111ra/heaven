@extends('admin.layouts.app')
@section('content')
    <!-- Main content -->

    <main class="col-md-12 ms-sm-auto px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Tableau de bord</h1>
        </div>

        <div class="row">
            <div class="col-md-3 mb-4">
                <div class="card bg-primary text-white">
                    <div class="card-body">
                        <h5 class="card-title">Services</h5>
                        <p class="card-text">4 services</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card bg-success text-white">
                    <div class="card-body">
                        <h5 class="card-title">Propriétés</h5>
                        <p class="card-text">0 propriétés</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card bg-info text-white">
                    <div class="card-body">
                        <h5 class="card-title">Véhicules</h5>
                        <p class="card-text">0 véhicules</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card bg-warning text-white">
                    <div class="card-body">
                        <h5 class="card-title">Événements</h5>
                        <p class="card-text">0 événements</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Dernières activités -->
        <div class="row mt-4">
            <div class="col-12">
                <h3>Dernières activités</h3>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Action</th>
                                <th>Détails</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ date('d/m/Y H:i') }}</td>
                                <td>Création du tableau de bord</td>
                                <td>Installation initiale du back-office</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection
