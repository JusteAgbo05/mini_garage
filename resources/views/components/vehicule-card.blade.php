<div class="card h-100">
    <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
        <span class="fw-bold">{{ $vehicule->immatriculation }}</span>
        <span class="badge bg-secondary">{{ $vehicule->energie }}</span>
    </div>
    <div class="card-body">
        <h5 class="card-title">{{ $vehicule->marque }} {{ $vehicule->modele }}</h5>
        <ul class="list-unstyled text-muted small mb-0">
            <li><i class="bi bi-palette me-1"></i>{{ $vehicule->couleur }}</li>
            <li><i class="bi bi-calendar me-1"></i>{{ $vehicule->annee }}</li>
            <li><i class="bi bi-speedometer2 me-1"></i>{{ number_format($vehicule->kilometrage, 0, ',', ' ') }} km</li>
            <li><i class="bi bi-car-front me-1"></i>{{ $vehicule->carrosserie }}</li>
            <li><i class="bi bi-gear me-1"></i>{{ $vehicule->boite }}</li>
        </ul>
    </div>
    <div class="card-footer d-flex gap-2">
        <a href="{{ route('vehicules.show', $vehicule) }}"
           class="btn btn-outline-dark btn-sm flex-grow-1">
            <i class="bi bi-eye me-1"></i>Detail
        </a>
        <a href="{{ route('vehicules.edit', $vehicule) }}"
           class="btn btn-warning btn-sm">
            <i class="bi bi-pencil"></i>
        </a>
        <form action="{{ route('vehicules.destroy', $vehicule) }}"
              method="POST"
              onsubmit="return confirm('Confirmer la suppression ?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm">
                <i class="bi bi-trash"></i>
            </button>
        </form>
    </div>
</div>
