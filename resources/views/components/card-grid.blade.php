<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
    @foreach ($items as $item)
        <div class="col">
            <div class="card shadow-sm">
                @if ($item->image)
                    <img src="{{ asset($item->image) }}" class="card-img-top" height="225" alt="{{ $item->title }}">
                @else
                    <svg class="bd-placeholder-img card-img-top" width="100%" height="225"
                        xmlns="http://www.w3.org/2000/svg">
                        <rect width="100%" height="100%" fill="#55595c" />
                        <text x="50%" y="50%" fill="#eceeef" dy=".3em">{{ $item->title }}</text>
                    </svg>
                @endif
                <div class="card-body">
                    <p class="card-text">{{ $item->description }}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <a href="{{ route($viewRoute, $item) }}" class="btn btn-sm btn-outline-secondary">Voir</a>
                            <a href="{{ route($editRoute, $item) }}"
                                class="btn btn-sm btn-outline-secondary">Modifier</a>
                        </div>
                        <small class="text-body-secondary">{{ $item->created_at->diffForHumans() }}</small>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
