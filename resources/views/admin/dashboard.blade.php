@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid py-4">
        <!-- En-tête -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="h3 mb-0 text-gray-800">Tableau de bord</h1>
                <p class="text-muted">Bienvenue dans votre espace d'administration</p>
            </div>
            <div>
                <span class="text-muted">{{ date('d/m/Y') }}</span>
            </div>
        </div>

        <!-- Cartes statistiques -->
        <div class="row g-4 mb-4">
            <!-- Propriétés -->
            <div class="col-xl-3 col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <div class="rounded-circle bg-primary bg-opacity-10 p-3">
                                <i class="fas fa-home text-primary fa-2x"></i>
                            </div>
                            <span class="badge bg-success">+12% ce mois</span>
                        </div>
                        <h3 class="fs-2 fw-bold mb-1">0</h3>
                        <p class="text-muted mb-0">Propriétés</p>
                        <div class="progress mt-3" style="height: 4px;">
                            <div class="progress-bar bg-primary" style="width: 65%"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Véhicules -->
            <div class="col-xl-3 col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <div class="rounded-circle bg-success bg-opacity-10 p-3">
                                <i class="fas fa-car text-success fa-2x"></i>
                            </div>
                            <span class="badge bg-success">+5% ce mois</span>
                        </div>
                        <h3 class="fs-2 fw-bold mb-1">0</h3>
                        <p class="text-muted mb-0">Véhicules</p>
                        <div class="progress mt-3" style="height: 4px;">
                            <div class="progress-bar bg-success" style="width: 45%"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Événements -->
            <div class="col-xl-3 col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <div class="rounded-circle bg-info bg-opacity-10 p-3">
                                <i class="fas fa-calendar-alt text-info fa-2x"></i>
                            </div>
                            <span class="badge bg-success">+8% ce mois</span>
                        </div>
                        <h3 class="fs-2 fw-bold mb-1">0</h3>
                        <p class="text-muted mb-0">Événements</p>
                        <div class="progress mt-3" style="height: 4px;">
                            <div class="progress-bar bg-info" style="width: 55%"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Utilisateurs -->
            <div class="col-xl-3 col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <div class="rounded-circle bg-warning bg-opacity-10 p-3">
                                <i class="fas fa-users text-warning fa-2x"></i>
                            </div>
                            <span class="badge bg-success">+15% ce mois</span>
                        </div>
                        <h3 class="fs-2 fw-bold mb-1">0</h3>
                        <p class="text-muted mb-0">Utilisateurs</p>
                        <div class="progress mt-3" style="height: 4px;">
                            <div class="progress-bar bg-warning" style="width: 75%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Graphiques et Tableaux -->
        <div class="row g-4">
            <!-- Graphique d'activité -->
            <div class="col-xl-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-transparent border-0 py-3">
                        <h5 class="mb-0">Aperçu des activités</h5>
                    </div>
                    <div class="card-body">
                        <canvas id="activitiesChart" style="height: 300px;"></canvas>
                    </div>
                </div>
            </div>

            <!-- Dernières notifications -->
            <div class="col-xl-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-transparent border-0 py-3">
                        <h5 class="mb-0">Notifications récentes</h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="list-group list-group-flush">
                            <div class="list-group-item border-0 py-3">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <div class="rounded-circle bg-primary bg-opacity-10 p-2">
                                            <i class="fas fa-bell text-primary"></i>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h6 class="mb-1">Nouvelle réservation</h6>
                                        <p class="text-muted small mb-0">Il y a 5 minutes</p>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item border-0 py-3">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <div class="rounded-circle bg-success bg-opacity-10 p-2">
                                            <i class="fas fa-check text-success"></i>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h6 class="mb-1">Mise à jour du système</h6>
                                        <p class="text-muted small mb-0">Il y a 1 heure</p>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item border-0 py-3">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <div class="rounded-circle bg-warning bg-opacity-10 p-2">
                                            <i class="fas fa-exclamation text-warning"></i>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h6 class="mb-1">Alerte de maintenance</h6>
                                        <p class="text-muted small mb-0">Il y a 2 heures</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tableau des dernières activités -->
            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-transparent border-0 py-3">
                        <h5 class="mb-0">Dernières activités</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Action</th>
                                        <th scope="col">Utilisateur</th>
                                        <th scope="col">Statut</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>#1</td>
                                        <td>{{ date('d/m/Y H:i') }}</td>
                                        <td>Mise à jour du dashboard</td>
                                        <td>Admin</td>
                                        <td><span class="badge bg-success">Complété</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('activitiesChart').getContext('2d');
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin', 'Juil'],
                    datasets: [{
                        label: 'Activités',
                        data: [65, 59, 80, 81, 56, 55, 40],
                        fill: true,
                        borderColor: 'rgb(75, 192, 192)',
                        backgroundColor: 'rgba(75, 192, 192, 0.1)',
                        tension: 0.3
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                display: true,
                                color: 'rgba(0,0,0,0.05)'
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            }
                        }
                    }
                }
            });
        });
    </script>
@endpush
