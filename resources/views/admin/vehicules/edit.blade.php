@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid px-4">
        <!-- En-tête -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="h3 mb-2 text-gray-800">Modifier le véhicule</h1>
                <p class="mb-4 text-muted">Modifiez les informations du véhicule</p>
            </div>
            <a href="{{ route('admin.vehicules.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-2"></i>Retour à la liste
            </a>
        </div>

        <!-- Formulaire -->
        <div class="row">
            <!-- Colonne principale -->
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <form action="{{ route('admin.vehicules.update', $vehicle) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Nom du véhicule</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            id="name" name="name" value="{{ old('name', $vehicle->name) }}"
                                            required>
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="category_id" class="form-label">Catégorie</label>
                                        <select class="form-select @error('category_id') is-invalid @enderror"
                                            id="category_id" name="category_id" required>
                                            <option value="">Sélectionner une catégorie</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ old('category_id', $vehicle->category_id) == $category->id ? 'selected' : '' }}>
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="brand" class="form-label">Marque</label>
                                        <input type="text" class="form-control @error('brand') is-invalid @enderror"
                                            id="brand" name="brand" value="{{ old('brand', $vehicle->brand) }}"
                                            required>
                                        @error('brand')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="model" class="form-label">Modèle</label>
                                        <input type="text" class="form-control @error('model') is-invalid @enderror"
                                            id="model" name="model" value="{{ old('model', $vehicle->model) }}"
                                            required>
                                        @error('model')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="year" class="form-label">Année</label>
                                        <input type="number" class="form-control @error('year') is-invalid @enderror"
                                            id="year" name="year" value="{{ old('year', $vehicle->year) }}"
                                            min="1900" max="{{ date('Y') + 1 }}" required>
                                        @error('year')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="transmission" class="form-label">Transmission</label>
                                        <select class="form-select @error('transmission') is-invalid @enderror"
                                            id="transmission" name="transmission" required>
                                            <option value="">Sélectionner une transmission</option>
                                            <option value="manuel"
                                                {{ old('transmission', $vehicle->transmission) == 'manuel' ? 'selected' : '' }}>
                                                Manuel
                                            </option>
                                            <option value="automatique"
                                                {{ old('transmission', $vehicle->transmission) == 'automatique' ? 'selected' : '' }}>
                                                Automatique</option>
                                        </select>
                                        @error('transmission')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="fuel_type" class="form-label">Type de carburant</label>
                                        <select class="form-select @error('fuel_type') is-invalid @enderror" id="fuel_type"
                                            name="fuel_type" required>
                                            <option value="">Sélectionner un type de carburant</option>
                                            <option value="essence"
                                                {{ old('fuel_type', $vehicle->fuel_type) == 'essence' ? 'selected' : '' }}>
                                                Essence
                                            </option>
                                            <option value="diesel"
                                                {{ old('fuel_type', $vehicle->fuel_type) == 'diesel' ? 'selected' : '' }}>
                                                Diesel
                                            </option>
                                            <option value="électrique"
                                                {{ old('fuel_type', $vehicle->fuel_type) == 'électrique' ? 'selected' : '' }}>
                                                Électrique</option>
                                            <option value="hybride"
                                                {{ old('fuel_type', $vehicle->fuel_type) == 'hybride' ? 'selected' : '' }}>
                                                Hybride
                                            </option>
                                        </select>
                                        @error('fuel_type')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="seats" class="form-label">Nombre de places</label>
                                        <input type="number" class="form-control @error('seats') is-invalid @enderror"
                                            id="seats" name="seats" value="{{ old('seats', $vehicle->seats) }}"
                                            min="1" max="50" required>
                                        @error('seats')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                            rows="3" required>{{ old('description', $vehicle->description) }}</textarea>
                                        @error('description')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="price_per_day" class="form-label">Prix par jour (€)</label>
                                        <input type="number" step="0.01"
                                            class="form-control @error('price_per_day') is-invalid @enderror"
                                            id="price_per_day" name="price_per_day"
                                            value="{{ old('price_per_day', $vehicle->price_per_day) }}" required>
                                        @error('price_per_day')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="image" class="form-label">Image du véhicule</label>
                                        @if ($vehicle->image && Storage::disk('public')->exists($vehicle->image))
                                            <div class="mb-2">
                                                <img src="{{ Storage::url($vehicle->image) }}"
                                                    alt="{{ $vehicle->name }}" class="img-thumbnail"
                                                    style="max-height: 200px" id="current-image">
                                                <p class="text-muted small mt-1">Image actuelle</p>
                                            </div>
                                        @endif
                                        <input type="file" class="form-control @error('image') is-invalid @enderror"
                                            id="image" name="image" accept="image/*">
                                        <div class="form-text">
                                            Formats acceptés : JPEG, PNG, JPG, GIF. Taille maximale : 2 Mo.
                                            @if ($vehicle->image)
                                                Laissez vide pour conserver l'image actuelle.
                                            @endif
                                        </div>
                                        @error('image')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <div class="form-check form-switch">
                                            <input type="checkbox" class="form-check-input" id="is_available"
                                                name="is_available" value="1"
                                                {{ old('is_available', $vehicle->is_available) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="is_available">Disponible à la
                                                location</label>
                                        </div>
                                    </div>

                                    <div class="text-end">
                                        <a href="{{ route('admin.vehicules.index') }}"
                                            class="btn btn-light me-2">Annuler</a>
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-save me-2"></i>Mettre à jour
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Caractéristiques techniques -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-transparent border-0 py-3">
                        <h5 class="mb-0">Caractéristiques techniques</h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-sm-6 col-md-4">
                                <div class="p-3 border rounded bg-light">
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="fas fa-calendar me-2 text-primary"></i>
                                        <small class="text-muted">Année</small>
                                    </div>
                                    <h6 class="mb-0">{{ $vehicle->year }}</h6>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <div class="p-3 border rounded bg-light">
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="fas fa-gas-pump me-2 text-primary"></i>
                                        <small class="text-muted">Carburant</small>
                                    </div>
                                    <h6 class="mb-0">{{ ucfirst($vehicle->fuel_type) }}</h6>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <div class="p-3 border rounded bg-light">
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="fas fa-cog me-2 text-primary"></i>
                                        <small class="text-muted">Transmission</small>
                                    </div>
                                    <h6 class="mb-0">{{ ucfirst($vehicle->transmission) }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Colonne latérale -->
            <div class="col-lg-4">
                <!-- Image du véhicule -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-transparent border-0 py-3">
                        <h5 class="mb-0">Image du véhicule</h5>
                    </div>
                    <div class="card-body">
                        <div class="text-center mb-3">
                            @if ($vehicle->image)
                                <img src="{{ Storage::url($vehicle->image) }}" alt="{{ $vehicle->name }}"
                                    class="img-fluid rounded" style="max-height: 200px">
                            @else
                                <div class="border rounded py-5 mb-3">
                                    <i class="fas fa-image fa-3x text-muted"></i>
                                    <p class="text-muted mt-2">Aucune image</p>
                                </div>
                            @endif
                        </div>
                        <p class="text-muted small">L'image sera mise à jour via le formulaire principal.</p>
                    </div>
                </div>

                <!-- Informations de tarification -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-transparent border-0 py-3">
                        <h5 class="mb-0">Tarification</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-euro-sign text-primary me-2"></i>
                            <span class="fw-bold">{{ number_format($vehicle->price_per_day, 2) }} €/jour</span>
                        </div>
                        <p class="text-muted small mt-2">Le prix sera mis à jour via le formulaire principal.</p>
                    </div>
                </div>

                <!-- État de disponibilité -->
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-transparent border-0 py-3">
                        <h5 class="mb-0">État de disponibilité</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            @if ($vehicle->is_available)
                                <i class="fas fa-check-circle text-success me-2"></i>
                                <span class="text-success">Disponible à la location</span>
                            @else
                                <i class="fas fa-times-circle text-danger me-2"></i>
                                <span class="text-danger">Indisponible à la location</span>
                            @endif
                        </div>
                        <p class="text-muted small mt-2">Le statut sera mis à jour via le formulaire principal.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.getElementById('image')?.addEventListener('change', function(e) {
            if (e.target.files && e.target.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const currentImage = document.getElementById('current-image');
                    const sidebarImage = document.querySelector('.col-lg-4 img.img-fluid');

                    if (currentImage) {
                        currentImage.src = e.target.result;
                    }
                    if (sidebarImage) {
                        sidebarImage.src = e.target.result;
                    }
                }
                reader.readAsDataURL(e.target.files[0]);
            }
        });
    </script>
@endpush
