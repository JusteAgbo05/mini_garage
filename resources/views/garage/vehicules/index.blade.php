@extends('base')

@section('titre', 'Liste des vehicules')

@section('contenu')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="mb-0"><i class="bi bi-car-front me-2"></i>Vehicules</h2>
    <a href="{{ route('vehicules.create') }}" class="btn btn-dark">
        <i class="bi bi-plus-lg me-1"></i>Nouveau vehicule
    </a>
</div>

<div class="card mb-4">
    <div class="card-body">
        <form method="GET" action="{{ route('vehicules.index') }}" class="row g-2">
            <div class="col-md-8">
                <input type="text" name="recherche" class="form-control"
                       placeholder="Rechercher par marque ou immatriculation..."
                       value="{{ $recherche ?? '' }}">
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-dark w-100">
                    <i class="bi bi-search me-1"></i>Rechercher
                </button>
            </div>
            <div class="col-md-2">
                <a href="{{ route('vehicules.index') }}" class="btn btn-outline-secondary w-100">
                    <i class="bi bi-x-circle me-1"></i>Reinitialiser
                </a>
            </div>
        </form>
    </div>
</div>

<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 mb-4">
    @forelse($vehicules as $vehicule)
        <div class="col">
            <x-vehicule-card :vehicule="$vehicule" />
        </div>
    @empty
        <div class="col-12">
            <div class="alert alert-info">
                <i class="bi bi-info-circle me-2"></i>Aucun vehicule trouve.
            </div>
        </div>
    @endforelse
</div>

{{ $vehicules->appends(['recherche' => $recherche])->links('pagination::bootstrap-5') }}
@endsection
