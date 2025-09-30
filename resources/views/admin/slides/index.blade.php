@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        @if (session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger mt-3">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <!-- Header Section -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h2 mb-0">Gestion des Slides</h1>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSlideModal">
                <i class="fas fa-plus"></i> Ajouter un slide
            </button>
        </div>
        <!-- Stats Section -->
        <div class="row g-3 mb-4">
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="card bg-light">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-images fa-2x text-primary me-3"></i>
                            <div>
                                <h6 class="card-title mb-1">Total Slides</h6>
                                <h3 class="mb-0">{{ count($slides ?? []) }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="card bg-light">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-check-circle fa-2x text-success me-3"></i>
                            <div>
                                <h6 class="card-title mb-1">Slides Actifs</h6>
                                <h3 class="mb-0">{{ $slides->where('active', true)->count() }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!-- Filters and Search -->
        <div class="row g-3 mb-4">
            <div class="col-12 col-md-6">
                <div class="input-group">
                    <span class="input-group-text bg-white"><i class="fas fa-search"></i></span>
                    <input type="text" class="form-control" id="searchSlides" placeholder="Rechercher un slide...">
                </div>
            </div>
            <div class="col-12 col-md-6 text-md-end">
                <div class="btn-group">
                    <button type="button" class="btn btn-outline-primary active" data-filter="all">Tous</button>
                    <button type="button" class="btn btn-outline-primary" data-filter="active">Actifs</button>
                    <button type="button" class="btn btn-outline-primary" data-filter="inactive">Inactifs</button>
                </div>
            </div>
        </div>

        <!-- Slides Grid -->
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 g-4">
            @foreach ($slides ?? [] as $slide)
                <div class="col slide-item" data-status="{{ $slide->active ? 'active' : 'inactive' }}">
                    <div class="card h-100 shadow-hover">
                        @if ($slide->image && Storage::disk('public')->exists($slide->image))
                            <img src="{{ Storage::url($slide->image) }}" class="card-img-top" alt="{{ $slide->title }}"
                                style="height: 200px; object-fit: cover;">
                        @else
                            <div class="card-img-top bg-light d-flex align-items-center justify-content-center"
                                style="height: 200px;">
                                <i class="fas fa-image fa-3x text-muted"></i>
                            </div>
                        @endif
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h5 class="card-title">{{ $slide->title }}</h5>
                                <span class="badge bg-{{ $slide->active ? 'success' : 'danger' }}">
                                    {{ $slide->active ? 'Actif' : 'Inactif' }}
                                </span>
                            </div>
                            <p class="card-text text-muted">{{ Str::limit($slide->description, 100) }}</p>
                            <div class="mt-3 pt-2 border-top">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                                            data-bs-target="#editSlideModal{{ $slide->id }}">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <form action="{{ route('admin.slides.destroy', $slide) }}" method="POST"
                                            class="d-inline"
                                            onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce slide ?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                    <small class="text-muted">Ordre: {{ $slide->order }}</small>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    </div>
    </div>
    </div>

    <!-- Modals d'édition pour chaque slide -->
    @foreach ($slides as $slide)
        <div class="modal fade" id="editSlideModal{{ $slide->id }}" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modifier le slide</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <form action="{{ route('admin.slides.update', $slide) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Image actuelle</label>
                                <div class="mb-2">
                                    @if ($slide->image && Storage::disk('public')->exists($slide->image))
                                        <img src="{{ Storage::url($slide->image) }}" alt="Image actuelle"
                                            class="img-thumbnail" style="max-height: 200px">
                                    @else
                                        <div class="alert alert-info">Aucune image</div>
                                    @endif
                                </div>
                                <label class="form-label">Nouvelle image (optionnel)</label>
                                <input type="file" class="form-control" name="image"
                                    accept="image/jpeg,image/png,image/jpg">
                                <small class="form-text text-muted">Laissez vide pour garder l'image actuelle</small>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Titre</label>
                                <input type="text" class="form-control" name="title" value="{{ $slide->title }}"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea class="form-control" name="description" rows="3" required>{{ $slide->description }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Ordre</label>
                                <input type="number" class="form-control" name="order" value="{{ $slide->order }}"
                                    required>
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" name="active"
                                    id="activeCheck{{ $slide->id }}" {{ $slide->active ? 'checked' : '' }}>
                                <label class="form-check-label" for="activeCheck{{ $slide->id }}">Actif</label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                            <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    <!-- Modal pour ajouter un slide -->
    <div class="modal fade" id="addSlideModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ajouter un nouveau slide</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('admin.slides.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Image (formats acceptés : jpeg, png, jpg, max : 2Mo)</label>
                            <input type="file" class="form-control" name="image"
                                accept="image/jpeg,image/png,image/jpg" required>
                            <small class="form-text text-muted">
                                L'image sera redimensionnée automatiquement
                            </small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Titre</label>
                            <input type="text" class="form-control" name="title" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" name="description" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Ordre</label>
                            <input type="number" class="form-control" name="order" required>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" name="active" id="activeCheck">
                            <label class="form-check-label" for="activeCheck">Actif</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
