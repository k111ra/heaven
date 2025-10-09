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

        <!-- Messages d'erreur globaux -->
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <div class="d-flex align-items-center">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    <strong>Erreur de validation :</strong>
                </div>
                <ul class="mb-0 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Messages de succès ou d'erreur -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form action="{{ route('admin.vehicules.store') }}" method="POST" enctype="multipart/form-data" id="vehicleForm">
            @csrf
            <div class="row">
                <!-- Colonne principale -->
                <div class="col-lg-8">
                    <!-- Informations de base -->
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-header bg-transparent border-0 py-3">
                            <h5 class="mb-0">
                                <i class="fas fa-info-circle me-2 text-primary"></i>Informations principales
                                <span class="text-danger">*</span>
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="name" class="form-label">
                                        Nom du véhicule <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="name" name="name" value="{{ old('name') }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">
                                            <i class="fas fa-exclamation-triangle me-1"></i>{{ $message }}
                                        </div>
                                    @else
                                        <div class="valid-feedback">
                                            Parfait !
                                        </div>
                                    @enderror
                                    <div class="form-text">Entrez le nom complet du véhicule</div>
                                </div>

                                <div class="col-md-6">
                                    <label for="category_id" class="form-label">
                                        Catégorie <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-select @error('category_id') is-invalid @enderror" id="category_id"
                                        name="category_id" required>
                                        <option value="">-- Sélectionner une catégorie --</option>
                                        @forelse ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @empty
                                            <option value="" disabled>Aucune catégorie disponible</option>
                                        @endforelse
                                    </select>
                                    @error('category_id')
                                        <div class="invalid-feedback">
                                            <i class="fas fa-exclamation-triangle me-1"></i>{{ $message }}
                                        </div>
                                    @enderror
                                    <div class="form-text">Choisissez la catégorie du véhicule</div>
                                </div>

                                <div class="col-md-6">
                                    <label for="brand" class="form-label">
                                        Marque <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control @error('brand') is-invalid @enderror"
                                        id="brand" name="brand" value="{{ old('brand') }}" required
                                        placeholder="Ex: Toyota, Peugeot, BMW...">
                                    @error('brand')
                                        <div class="invalid-feedback">
                                            <i class="fas fa-exclamation-triangle me-1"></i>{{ $message }}
                                        </div>
                                    @enderror
                                    <div class="form-text">Marque du constructeur</div>
                                </div>

                                <div class="col-md-6">
                                    <label for="model" class="form-label">
                                        Modèle <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control @error('model') is-invalid @enderror"
                                        id="model" name="model" value="{{ old('model') }}" required
                                        placeholder="Ex: Corolla, 208, X3...">
                                    @error('model')
                                        <div class="invalid-feedback">
                                            <i class="fas fa-exclamation-triangle me-1"></i>{{ $message }}
                                        </div>
                                    @enderror
                                    <div class="form-text">Modèle spécifique du véhicule</div>
                                </div>

                                <div class="col-md-6">
                                    <label for="year" class="form-label">
                                        Année <span class="text-danger">*</span>
                                    </label>
                                    <input type="number" class="form-control @error('year') is-invalid @enderror"
                                        id="year" name="year" value="{{ old('year', date('Y')) }}"
                                        min="1900" max="{{ date('Y') + 1 }}" required>
                                    @error('year')
                                        <div class="invalid-feedback">
                                            <i class="fas fa-exclamation-triangle me-1"></i>{{ $message }}
                                        </div>
                                    @enderror
                                    <div class="form-text">Année de fabrication ({{ 1900 }} -
                                        {{ date('Y') + 1 }})</div>
                                </div>

                                <div class="col-md-6">
                                    <label for="seats" class="form-label">
                                        Nombre de places <span class="text-danger">*</span>
                                    </label>
                                    <input type="number" class="form-control @error('seats') is-invalid @enderror"
                                        id="seats" name="seats" value="{{ old('seats') }}" min="1"
                                        max="50" required>
                                    @error('seats')
                                        <div class="invalid-feedback">
                                            <i class="fas fa-exclamation-triangle me-1"></i>{{ $message }}
                                        </div>
                                    @enderror
                                    <div class="form-text">Capacité en nombre de passagers (1-50)</div>
                                </div>

                                <div class="col-md-6">
                                    <label for="transmission" class="form-label">
                                        Transmission <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-select @error('transmission') is-invalid @enderror"
                                        id="transmission" name="transmission" required>
                                        <option value="">-- Sélectionner une transmission --</option>
                                        <option value="manuel" {{ old('transmission') == 'manuel' ? 'selected' : '' }}>
                                            Manuel
                                        </option>
                                        <option value="automatique"
                                            {{ old('transmission') == 'automatique' ? 'selected' : '' }}>
                                            Automatique
                                        </option>
                                    </select>
                                    @error('transmission')
                                        <div class="invalid-feedback">
                                            <i class="fas fa-exclamation-triangle me-1"></i>{{ $message }}
                                        </div>
                                    @enderror
                                    <div class="form-text">Type de boîte de vitesses</div>
                                </div>

                                <div class="col-md-6">
                                    <label for="fuel_type" class="form-label">
                                        Type de carburant <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-select @error('fuel_type') is-invalid @enderror" id="fuel_type"
                                        name="fuel_type" required>
                                        <option value="">-- Sélectionner un carburant --</option>
                                        <option value="essence" {{ old('fuel_type') == 'essence' ? 'selected' : '' }}>
                                            Essence
                                        </option>
                                        <option value="diesel" {{ old('fuel_type') == 'diesel' ? 'selected' : '' }}>
                                            Diesel
                                        </option>
                                        <option value="électrique"
                                            {{ old('fuel_type') == 'électrique' ? 'selected' : '' }}>
                                            Électrique
                                        </option>
                                        <option value="hybride" {{ old('fuel_type') == 'hybride' ? 'selected' : '' }}>
                                            Hybride
                                        </option>
                                    </select>
                                    @error('fuel_type')
                                        <div class="invalid-feedback">
                                            <i class="fas fa-exclamation-triangle me-1"></i>{{ $message }}
                                        </div>
                                    @enderror
                                    <div class="form-text">Source d'énergie du véhicule</div>
                                </div>

                                <div class="col-12">
                                    <label for="description" class="form-label">
                                        Description <span class="text-danger">*</span>
                                    </label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                        rows="4" required
                                        placeholder="Décrivez les caractéristiques principales du véhicule, son état, ses équipements...">{{ old('description') }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">
                                            <i class="fas fa-exclamation-triangle me-1"></i>{{ $message }}
                                        </div>
                                    @enderror
                                    <div class="form-text">Description détaillée du véhicule et de ses équipements</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Colonne latérale -->
                <div class="col-lg-4">
                    <!-- Images -->
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-header bg-transparent border-0 py-3">
                            <h5 class="mb-0">
                                <i class="fas fa-images me-2 text-primary"></i>Images du véhicule
                                <span class="text-danger">*</span>
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="text-center mb-3">
                                <div id="imagePreview" class="row g-3">
                                    <div class="col-12">
                                        <i class="fas fa-images fa-3x text-muted"></i>
                                        <p class="text-muted mt-2">Sélectionnez une ou plusieurs images</p>
                                        <small class="text-danger">Au moins une image est requise</small>
                                    </div>
                                </div>
                            </div>

                            <div class="d-grid">
                                <label for="images"
                                    class="btn btn-outline-primary @error('images') border-danger @enderror @error('images.*') border-danger @enderror">
                                    <i class="fas fa-upload me-2"></i>Choisir des images
                                    <input type="file" class="d-none" id="images" name="images[]"
                                        accept="image/*" multiple required>
                                </label>
                            </div>

                            <div class="form-text mt-2">
                                <strong>Formats acceptés :</strong> JPEG, PNG, JPG, GIF<br>
                                <strong>Taille maximale :</strong> 2 Mo par image<br>
                                <strong>Note :</strong> La première image sera l'image principale
                            </div>

                            @error('images')
                                <div class="alert alert-danger mt-2 py-2">
                                    <i class="fas fa-exclamation-triangle me-1"></i>{{ $message }}
                                </div>
                            @enderror
                            @error('images.*')
                                <div class="alert alert-danger mt-2 py-2">
                                    <i class="fas fa-exclamation-triangle me-1"></i>{{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tarification -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-transparent border-0 py-3">
                    <h5 class="mb-0">
                        <i class="fas fa-euro-sign me-2 text-primary"></i>Tarification
                        <span class="text-danger">*</span>
                    </h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="price_per_day" class="form-label">
                            Prix par jour <span class="text-danger">*</span>
                        </label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-euro-sign"></i></span>
                            <input type="number" step="0.01" min="0"
                                class="form-control @error('price_per_day') is-invalid @enderror" id="price_per_day"
                                name="price_per_day" value="{{ old('price_per_day') }}" required placeholder="0.00">
                            <span class="input-group-text">€/jour</span>
                            @error('price_per_day')
                                <div class="invalid-feedback">
                                    <i class="fas fa-exclamation-triangle me-1"></i>{{ $message }}
                                </div>
                            @enderror
                        </div>
                        @error('price_per_day')
                            <div class="text-danger small mt-1">
                                <i class="fas fa-exclamation-triangle me-1"></i>{{ $message }}
                            </div>
                        @else
                            <div class="form-text">Prix de location par jour en euros</div>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- État de disponibilité -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-transparent border-0 py-3">
                    <h5 class="mb-0">
                        <i class="fas fa-toggle-on me-2 text-primary"></i>État de disponibilité
                    </h5>
                </div>
                <div class="card-body">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="is_available" name="is_available"
                            value="1" {{ old('is_available', true) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_available">
                            <strong>Disponible à la location</strong>
                        </label>
                    </div>
                    <small class="text-muted">Décochez si le véhicule n'est pas encore disponible à la location</small>
                </div>
            </div>

            <!-- Boutons d'action -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.vehicules.index') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-arrow-left me-2"></i>Annuler
                        </a>
                        <button type="submit" class="btn btn-primary" id="submitBtn">
                            <i class="fas fa-plus-circle me-2"></i>Créer le véhicule
                        </button>
                    </div>
                    <div class="text-center mt-2">
                        <small class="text-muted">
                            <span class="text-danger">*</span> Champs obligatoires
                        </small>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        document.getElementById('images')?.addEventListener('change', function(e) {
            const preview = document.getElementById('imagePreview');
            preview.innerHTML = '';

            if (e.target.files && e.target.files.length > 0) {
                const row = document.createElement('div');
                row.className = 'row g-2';
                preview.appendChild(row);

                Array.from(e.target.files).forEach((file, index) => {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const colDiv = document.createElement('div');
                        colDiv.className = e.target.files?.length > 1 ? 'col-6' : 'col-12';

                        colDiv.innerHTML = `
                            <div class="position-relative">
                                <img src="${e.target.result}" class="img-fluid rounded w-100"
                                     style="height: 120px; object-fit: cover;" alt="Aperçu ${index + 1}">
                                ${index === 0 ? '<span class="badge bg-primary position-absolute top-0 end-0 m-1">Principal</span>' : ''}
                            </div>
                        `;
                        row.appendChild(colDiv);
                    }
                    reader.readAsDataURL(file);
                });
            } else {
                preview.innerHTML = `
                    <div class="col-12">
                        <i class="fas fa-images fa-3x text-muted"></i>
                        <p class="text-muted mt-2">Sélectionnez une ou plusieurs images</p>
                    </div>
                `;
            }
        });

        // Validation côté client
        document.getElementById('vehicleForm')?.addEventListener('submit', function(e) {
            const requiredFields = this.querySelectorAll('[required]');
            let hasErrors = false;

            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    hasErrors = true;
                    field.classList.add('is-invalid');
                } else {
                    field.classList.remove('is-invalid');
                }
            });

            if (hasErrors) {
                e.preventDefault();

                // Afficher un message d'erreur
                const alertDiv = document.createElement('div');
                alertDiv.className = 'alert alert-danger alert-dismissible fade show';
                alertDiv.innerHTML = `
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    <strong>Veuillez remplir tous les champs obligatoires.</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                `;

                document.querySelector('.container-fluid').insertBefore(alertDiv, document.querySelector('form'));

                // Défiler vers le haut
                window.scrollTo(0, 0);
            }
        });

        // Validation temps réel avec Bootstrap
        document.querySelectorAll('[required]').forEach(field => {
            field.addEventListener('input', function() {
                validateField(this);
            });

            field.addEventListener('blur', function() {
                validateField(this);
            });
        });

        function validateField(field) {
            const value = field.value.trim();
            const isValid = field.type === 'file' ? field.files.length > 0 : value !== '';

            // Nettoyer les classes précédentes
            field.classList.remove('is-valid', 'is-invalid');

            // Ajouter la classe appropriée
            if (isValid) {
                field.classList.add('is-valid');
            } else {
                field.classList.add('is-invalid');
            }
        }

        // Validation pour les fichiers
        document.getElementById('images')?.addEventListener('change', function() {
            validateField(this);
        });

        // Validation côté client améliorée
        document.getElementById('vehicleForm')?.addEventListener('submit', function(e) {
            const requiredFields = this.querySelectorAll('[required]');
            let hasErrors = false;

            requiredFields.forEach(field => {
                const isValid = field.type === 'file' ? field.files.length > 0 : field.value.trim() !== '';

                field.classList.remove('is-valid', 'is-invalid');

                if (!isValid) {
                    hasErrors = true;
                    field.classList.add('is-invalid');

                    // Faire défiler vers le premier champ en erreur
                    if (!this.querySelector('.is-invalid:focus')) {
                        field.focus();
                        field.scrollIntoView({
                            behavior: 'smooth',
                            block: 'center'
                        });
                    }
                } else {
                    field.classList.add('is-valid');
                }
            });

            if (hasErrors) {
                e.preventDefault();

                // Compter les erreurs et afficher un toast
                const errorCount = this.querySelectorAll('.is-invalid').length;
                showErrorToast(`${errorCount} champ(s) ${errorCount > 1 ? 'sont' : 'est'} obligatoire(s)`);
            }
        });

        function showErrorToast(message) {
            // Créer un toast Bootstrap
            const toastHtml = `
                <div class="toast position-fixed top-0 end-0 m-3" role="alert" style="z-index: 9999;">
                    <div class="toast-header bg-danger text-white">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        <strong class="me-auto">Erreur de validation</strong>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast"></button>
                    </div>
                    <div class="toast-body">
                        ${message}
                    </div>
                </div>
            `;

            document.body.insertAdjacentHTML('beforeend', toastHtml);
            const toastElement = document.querySelector('.toast:last-child');
            const toast = new bootstrap.Toast(toastElement);
            toast.show();

            // Supprimer le toast après fermeture
            toastElement.addEventListener('hidden.bs.toast', () => {
                toastElement.remove();
            });
        }
    </script>
@endpush
