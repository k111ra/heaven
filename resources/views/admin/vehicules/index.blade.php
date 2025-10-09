@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid px-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="h3 mb-0 text-gray-800">Véhicules</h1>
                <p class="mb-0 text-muted">Gestion des véhicules</p>
            </div>
            <a href="{{ route('admin.vehicules.create') }}" class="btn btn-primary">
                <i class="fas fa-plus-circle me-2"></i>Nouveau véhicule
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Nom</th>
                                <th>Catégorie</th>
                                <th>Marque</th>
                                <th>Prix/Jour</th>
                                <th>Statut</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($vehicles as $vehicle)
                                <tr>
                                    <td style="width: 100px;">
                                        @if ($vehicle->image)
                                            <img src="{{ Storage::url($vehicle->image) }}" class="img-fluid rounded"
                                                alt="{{ $vehicle->name }}" style="max-height: 60px;">
                                        @else
                                            <div class="bg-light rounded text-center p-3">
                                                <i class="fas fa-car text-muted"></i>
                                            </div>
                                        @endif
                                    </td>
                                    <td>{{ $vehicle->name }}</td>
                                    <td>{{ $vehicle->category->name }}</td>
                                    <td>{{ $vehicle->brand }}</td>
                                    <td>{{ number_format($vehicle->price_per_day, 0, ',', ' ') }} $ CA</td>
                                    <td>
                                        <span class="badge bg-{{ $vehicle->is_available ? 'success' : 'danger' }}">
                                            {{ $vehicle->is_available ? 'Disponible' : 'Indisponible' }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('admin.vehicules.edit', $vehicle) }}"
                                                class="btn btn-sm btn-outline-primary">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.vehicules.destroy', $vehicle) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger"
                                                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce véhicule ?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center py-4 text-muted">
                                        Aucun véhicule enregistré
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-center mt-4">
                    {{ $vehicles->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.getElementById('searchVehicle')?.addEventListener('input', function(e) {
            // Implémentation de la recherche en temps réel
            const searchTerm = e.target.value.toLowerCase();
            const rows = document.querySelectorAll('tbody tr');

            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(searchTerm) ? '' : 'none';
            });
        });
    </script>
@endpush
