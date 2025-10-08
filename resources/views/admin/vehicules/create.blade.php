@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid px-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="h3 mb-2 text-gray-800">Ajouter un véhicule</h1>
                <p class="mb-4 text-muted">Créez un nouveau véhicule dans votre flotte</p>
            </div>
            <div>
                <a href="{{ route('admin.vehicules.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-2"></i>Retour à la liste
                </a>
            </div>
        </div>

        <form action="{{ route('admin.vehicules.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <!-- Colonne principale -->
                <div class="col-lg-8">
                    <!-- Informations de base -->
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-header bg-transparent border-0 py-3">
                            <h5 class="mb-0">Informations principales</h5>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Nom du véhicule</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="name" name="name" value="{{ old('name') }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="category_id" class="form-label">Catégorie</label>
                                    <select class="form-select @error('category_id') is-invalid @enderror" id="category_id"
                                        name="category_id" required>
                                        <option value="">Sélectionner une catégorie</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="brand" class="form-label">Marque</label>
                                    <input type="text" class="form-control @error('brand') is-invalid @enderror"
                                        id="brand" name="brand" value="{{ old('brand') }}" required>
                                    @error('brand')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="model" class="form-label">Modèle</label>
                                    <input type="text" class="form-control @error('model') is-invalid @enderror"
                                        id="model" name="model" value="{{ old('model') }}" required>
                                    @error('model')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="year" class="form-label">Année</label>
                                    <input type="number" class="form-control @error('year') is-invalid @enderror"
                                        id="year" name="year" value="{{ old('year') }}" min="1900"
                                        max="{{ date('Y') + 1 }}" required>
                                    @error('year')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="seats" class="form-label">Nombre de places</label>
                                    <input type="number" class="form-control @error('seats') is-invalid @enderror"
                                        id="seats" name="seats" value="{{ old('seats') }}" min="1"
                                        max="50" required>
                                    @error('seats')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="transmission" class="form-label">Transmission</label>
                                    <select class="form-select @error('transmission') is-invalid @enderror"
                                        id="transmission" name="transmission" required>
                                        <option value="">Sélectionner une transmission</option>
                                        <option value="manuel" {{ old('transmission') == 'manuel' ? 'selected' : '' }}>
                                            Manuel
                                        </option>
                                        <option value="automatique"
                                            {{ old('transmission') == 'automatique' ? 'selected' : '' }}>
                                            Automatique</option>
                                    </select>
                                    @error('transmission')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="fuel_type" class="form-label">Type de carburant</label>
                                    <select class="form-select @error('fuel_type') is-invalid @enderror" id="fuel_type"
                                        name="fuel_type" required>
                                        <option value="">Sélectionner un type de carburant</option>
                                        <option value="essence" {{ old('fuel_type') == 'essence' ? 'selected' : '' }}>
                                            Essence</option>
                                        <option value="diesel" {{ old('fuel_type') == 'diesel' ? 'selected' : '' }}>Diesel
                                        </option>
                                        <option value="électrique"
                                            {{ old('fuel_type') == 'électrique' ? 'selected' : '' }}>
                                            Électrique</option>
                                        <option value="hybride" {{ old('fuel_type') == 'hybride' ? 'selected' : '' }}>
                                            Hybride
                                        </option>
                                    </select>
                                    @error('fuel_type')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                        rows="4" required>{{ old('description') }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Caractéristiques techniques -->
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-header bg-transparent border-0 py-3">
                            <h5 class="mb-0">Caractéristiques techniques</h5>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <!-- Contenu des caractéristiques techniques -->
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Colonne latérale -->
                <div class="col-lg-4">
                    <!-- Images -->
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-header bg-transparent border-0 py-3">
                            <h5 class="mb-0">Images du véhicule</h5>
                        </div>
                        <div class="card-body">
                            <div class="text-center mb-3">
                                <div id="imagePreview" class="row g-3">
                                    <div class="col-12">
                                        <i class="fas fa-images fa-3x text-muted"></i>
                                        <p class="text-muted mt-2">Sélectionnez une ou plusieurs images</p>
                                    </div>
                                </div>
                            </div>

                            <div class="d-grid">
                                <label for="images" class="btn btn-outline-primary">
                                    <i class="fas fa-upload me-2"></i>Choisir des images
                                    <input type="file" class="d-none @error('images.*') is-invalid @enderror"
                                        id="images" name="images[]" accept="image/*" multiple>
                                </label>
                            </div>

                            @error('images.*')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tarification -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-transparent border-0 py-3">
                    <h5 class="mb-0">Tarification</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="price_per_day" class="form-label">Prix par jour (€)</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-euro-sign"></i></span>
                            <input type="number" step="0.01"
                                class="form-control @error('price_per_day') is-invalid @enderror" id="price_per_day"
                                name="price_per_day" value="{{ old('price_per_day') }}" required>
                        </div>
                        @error('price_per_day')
                            <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- État de disponibilité -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-transparent border-0 py-3">
                    <h5 class="mb-0">État de disponibilité</h5>
                </div>
                <div class="card-body">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="is_available" name="is_available"
                            value="1" {{ old('is_available', true) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_available">
                            Disponible à la location
                        </label>
                    </div>
                </div>
            </div>

            <!-- Boutons d'action -->
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-plus-circle me-2"></i>Créer le véhicule
                </button>
                <a href="{{ route('admin.vehicules.index') }}" class="btn btn-light">Annuler</a>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        document.getElementById('images')?.addEventListener('change', function(e) {
            const preview = document.getElementById('imagePreview');
            preview.innerHTML = '';

            if (e.target.files) {
                Array.from(e.target.files).forEach((file, index) => {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        preview.innerHTML += `
                            <div class="col-md-4">
                                <div class="position-relative">
                                    <img src="${e.target.result}" class="img-fluid rounded" alt="Aperçu ${index + 1}">
                                    ${index === 0 ? '<span class="badge bg-primary position-absolute top-0 end-0 m-2">Principal</span>' : ''}
                                </div>
                            </div>
                        `;
                    }
                    reader.readAsDataURL(file);
                });
            }
        });
    </script>
@endpush
