@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid px-4">

        {{-- Header --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3">Gestion immobilière – Propriétés</h1>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createPropertyModal">
                <span class="material-symbols-rounded align-middle">add</span>
                <span class="align-middle">Ajouter une propriété</span>
            </button>
        </div>

        {{-- Flash messages --}}
        @if (session('success'))
            <div class="alert alert-success mb-3">
                {{ session('success') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger mb-3">
                <ul class="mb-0">
                    @foreach ($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Listing --}}
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead>
                            <tr>
                                <th style="width:72px">Image</th>
                                <th>Titre</th>
                                <th>Adresse</th>
                                <th class="text-end">Prix ($ CA)</th>
                                <th class="text-center">Surf. (m²)</th>
                                <th class="text-center">Ch.</th>
                                <th class="text-center">Sdb</th>
                                <th class="text-center">Garage</th>
                                <th>Créée le</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($proprietes as $property)
                                <tr>
                                    <td>
                                        @php
                                            $thumb = $property->image
                                                ? asset('storage/' . $property->image)
                                                : asset('img/property-4.jpg');
                                        @endphp
                                        <img src="{{ $thumb }}" alt="img" class="rounded"
                                            style="width:60px;height:60px;object-fit:cover;">
                                    </td>
                                    <td class="fw-semibold">{{ $property->title }}</td>
                                    <td>{{ $property->address }}</td>
                                    <td class="text-end">{{ number_format($property->price, 0, ',', ' ') }}</td>
                                    <td class="text-center">{{ $property->surface }}</td>
                                    <td class="text-center">{{ $property->bedrooms }}</td>
                                    <td class="text-center">{{ $property->bathrooms }}</td>
                                    <td class="text-center">{{ $property->garage }}</td>
                                    <td>{{ optional($property->created_at)->format('d/m/Y') }}</td>
                                    <td class="text-end">
                                        <div class="btn-group">
                                            {{-- EDIT --}}
                                            <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                                                data-bs-target="#editPropertyModal" data-id="{{ $property->id }}"
                                                data-title="{{ $property->title }}"
                                                data-address="{{ $property->address }}"
                                                data-price="{{ $property->price }}"
                                                data-surface="{{ $property->surface }}"
                                                data-bedrooms="{{ $property->bedrooms }}"
                                                data-bathrooms="{{ $property->bathrooms }}"
                                                data-garage="{{ $property->garage }}"
                                                data-description="{{ $property->description }}"
                                                data-agent_id="{{ $property->agent_id }}"
                                                data-image="{{ $property->image }}">
                                                <span class="material-symbols-rounded">edit</span>
                                            </button>

                                            {{-- DELETE --}}
                                            <form action="{{ route('admin.proprietes.destroy', $property->id) }}"
                                                method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger"
                                                    onclick="return confirm('Supprimer cette propriété ?')">
                                                    <span class="material-symbols-rounded">delete</span>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="10" class="text-center text-muted py-4">
                                        Aucune propriété pour le moment.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- Pagination --}}
                <div class="mt-3">
                    {{ $proprietes->links() }}
                </div>
            </div>
        </div>
    </div>

    {{-- ========================= --}}
    {{-- MODAL : CREATE PROPERTY   --}}
    {{-- ========================= --}}
    <div class="modal fade" id="createPropertyModal" tabindex="-1" aria-labelledby="createPropertyLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <form action="{{ route('admin.proprietes.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="createPropertyLabel">Ajouter une propriété</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                    </div>

                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-md-8">
                                <label class="form-label">Titre <span class="text-danger">*</span></label>
                                <input type="text" name="title"
                                    class="form-control @error('title') is-invalid @enderror" required>
                                @error('title')
                                    <div class="invalid-feedback">
                                        <i class="fas fa-exclamation-triangle me-1"></i>{{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Prix ($ CA) <span class="text-danger">*</span></label>
                                <input type="number" name="price"
                                    class="form-control @error('price') is-invalid @enderror" min="0" step="1"
                                    required>
                                @error('price')
                                    <div class="invalid-feedback">
                                        <i class="fas fa-exclamation-triangle me-1"></i>{{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label class="form-label">Adresse</label>
                                <input type="text" name="address"
                                    class="form-control @error('address') is-invalid @enderror">
                                @error('address')
                                    <div class="invalid-feedback">
                                        <i class="fas fa-exclamation-triangle me-1"></i>{{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-3">
                                <label class="form-label">Surface (m²)</label>
                                <input type="number" name="surface"
                                    class="form-control @error('surface') is-invalid @enderror" min="0">
                                @error('surface')
                                    <div class="invalid-feedback">
                                        <i class="fas fa-exclamation-triangle me-1"></i>{{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Chambres</label>
                                <input type="number" name="bedrooms"
                                    class="form-control @error('bedrooms') is-invalid @enderror" min="0">
                                @error('bedrooms')
                                    <div class="invalid-feedback">
                                        <i class="fas fa-exclamation-triangle me-1"></i>{{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Salles de bain</label>
                                <input type="number" name="bathrooms"
                                    class="form-control @error('bathrooms') is-invalid @enderror" min="0">
                                @error('bathrooms')
                                    <div class="invalid-feedback">
                                        <i class="fas fa-exclamation-triangle me-1"></i>{{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Garage</label>
                                <input type="number" name="garage"
                                    class="form-control @error('garage') is-invalid @enderror" min="0">
                                @error('garage')
                                    <div class="invalid-feedback">
                                        <i class="fas fa-exclamation-triangle me-1"></i>{{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Agent (ID)</label>
                                <input type="number" name="agent_id"
                                    class="form-control @error('agent_id') is-invalid @enderror" min="1"
                                    placeholder="optionnel">
                                @error('agent_id')
                                    <div class="invalid-feedback">
                                        <i class="fas fa-exclamation-triangle me-1"></i>{{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Image (principale)</label>
                                <input type="file" name="image"
                                    class="form-control @error('image') is-invalid @enderror" accept="image/*">
                                @error('image')
                                    <div class="invalid-feedback">
                                        <i class="fas fa-exclamation-triangle me-1"></i>{{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label class="form-label">Description</label>
                                <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="4"></textarea>
                                @error('description')
                                    <div class="invalid-feedback">
                                        <i class="fas fa-exclamation-triangle me-1"></i>{{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    {{-- ========================= --}}
    {{-- MODAL : EDIT PROPERTY     --}}
    {{-- ========================= --}}
    <div class="modal fade" id="editPropertyModal" tabindex="-1" aria-labelledby="editPropertyLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <form id="editPropertyForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="editPropertyLabel">Modifier la propriété</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                    </div>

                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-md-8">
                                <label class="form-label">Titre <span class="text-danger">*</span></label>
                                <input type="text" name="title" class="form-control" id="edit-title" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Prix ($ CA) <span class="text-danger">*</span></label>
                                <input type="number" name="price" class="form-control" id="edit-price"
                                    min="0" step="1" required>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Adresse</label>
                                <input type="text" name="address" class="form-control" id="edit-address">
                            </div>

                            <div class="col-md-3">
                                <label class="form-label">Surface (m²)</label>
                                <input type="number" name="surface" class="form-control" id="edit-surface"
                                    min="0">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Chambres</label>
                                <input type="number" name="bedrooms" class="form-control" id="edit-bedrooms"
                                    min="0">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Salles de bain</label>
                                <input type="number" name="bathrooms" class="form-control" id="edit-bathrooms"
                                    min="0">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Garage</label>
                                <input type="number" name="garage" class="form-control" id="edit-garage"
                                    min="0">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Agent (ID)</label>
                                <input type="number" name="agent_id" class="form-control" id="edit-agent_id"
                                    min="1" placeholder="optionnel">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Image (remplacer)</label>
                                <input type="file" name="image" class="form-control" accept="image/*">
                                <small class="text-muted">Laissez vide pour conserver l'image existante.</small>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Description</label>
                                <textarea name="description" class="form-control" id="edit-description" rows="4"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Mettre à jour</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const editModal = document.getElementById('editPropertyModal');
            editModal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget;

                // Récup data-*
                const id = button.getAttribute('data-id');
                const title = button.getAttribute('data-title') || '';
                const address = button.getAttribute('data-address') || '';
                const price = button.getAttribute('data-price') || 0;
                const surface = button.getAttribute('data-surface') || '';
                const bedrooms = button.getAttribute('data-bedrooms') || '';
                const bathrooms = button.getAttribute('data-bathrooms') || '';
                const garage = button.getAttribute('data-garage') || '';
                const description = button.getAttribute('data-description') || '';
                const agentId = button.getAttribute('data-agent_id') || '';

                // Remplir champs
                document.getElementById('edit-title').value = title;
                document.getElementById('edit-address').value = address;
                document.getElementById('edit-price').value = price;
                document.getElementById('edit-surface').value = surface;
                document.getElementById('edit-bedrooms').value = bedrooms;
                document.getElementById('edit-bathrooms').value = bathrooms;
                document.getElementById('edit-garage').value = garage;
                document.getElementById('edit-description').value = description;
                document.getElementById('edit-agent_id').value = agentId;

                // Action dynamique du form (route PUT)
                const form = document.getElementById('editPropertyForm');
                form.action = `{{ route('admin.proprietes.index') }}/${id}`;
            });

        });
    </script>
@endpush
