<div class="row g-4">
    @forelse($proprietes as $property)
        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="property-item rounded overflow-hidden">
                <div class="position-relative overflow-hidden">
                    <a href="{{ route('immobilier.detail', $property) }}">
                        <div style="width:100%; aspect-ratio: 4/3; overflow:hidden; background:#f5f5f5;">
                            <img class="img-fluid" src="{{ $property->image_url }}" alt="{{ $property->title }}"
                                style="width:100%; height:100%; object-fit:cover; object-position:center;">
                        </div>
                    </a>
                    <div class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                        {{ $property->status === 'sale' ? 'À vendre' : 'À louer' }}
                    </div>
                    <div class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">
                        {{ $property->type ?? 'Type inconnu' }}
                    </div>
                </div>
                <div class="p-4 pb-0">
                    <h5 class="text-primary mb-3">{{ $property->price_formatted }} $ CA</h5>
                    <a class="d-block h5 mb-2" href="{{ route('immobilier.detail', $property) }}">
                        {{ $property->title }}
                    </a>
                    <p><i class="fa fa-map-marker-alt text-primary me-2"></i>{{ $property->address }}</p>
                </div>
                <div class="d-flex border-top">
                    <small class="flex-fill text-center border-end py-2">
                        <i class="fa fa-ruler-combined text-primary me-2"></i>{{ $property->surface ?? 'N/A' }} m²
                    </small>
                    <small class="flex-fill text-center border-end py-2">
                        <i class="fa fa-bed text-primary me-2"></i>{{ $property->bedrooms ?? 0 }} Chambres
                    </small>
                    <small class="flex-fill text-center py-2">
                        <i class="fa fa-bath text-primary me-2"></i>{{ $property->bathrooms ?? 0 }} Salles de bain
                    </small>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12 text-center">
            <div class="alert alert-info">
                <h5>Aucune propriété trouvée</h5>
                <p class="mb-0">Aucune propriété ne correspond à vos critères de recherche.</p>
            </div>
        </div>
    @endforelse
</div>
