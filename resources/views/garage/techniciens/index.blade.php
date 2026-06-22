@extends('base')

@section('titre', 'Liste des techniciens')

@section('contenu')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="mb-0"><i class="bi bi-person-gear me-2"></i>Techniciens</h2>
    <a href="{{ route('techniciens.create') }}" class="btn btn-dark">
        <i class="bi bi-plus-lg me-1"></i>Nouveau technicien
    </a>
</div>

<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 mb-4">
    @forelse($techniciens as $technicien)
        <div class="col">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="rounded-circle bg-dark text-white d-flex align-items-center
                                    justify-content-center me-3"
                             style="width:48px;height:48px;font-size:1.2rem;flex-shrink:0">
                            {{ strtoupper(substr($technicien->prenom, 0, 1)) }}{{ strtoupper(substr($technicien->nom, 0, 1)) }}
                        </div>
                        <div>
                            <h5 class="card-title mb-0">
                                {{ $technicien->prenom }} {{ $technicien->nom }}
                            </h5>
                            <span class="badge bg-secondary mt-1">
                                {{ $technicien->specialite }}
                            </span>
                        </div>
                    </div>
                    <p class="text-muted small mb-0">
                        <i class="bi bi-wrench me-1"></i>
                        {{ $technicien->reparations->count() }} reparation(s) effectuee(s)
                    </p>
                </div>
                <div class="card-footer d-flex gap-2">
                    <a href="{{ route('techniciens.show', $technicien) }}"
                       class="btn btn-outline-dark btn-sm">
                        <i class="bi bi-eye me-1"></i>Detail
                    </a>
                    <a href="{{ route('techniciens.edit', $technicien) }}"
                       class="btn btn-warning btn-sm">
                        <i class="bi bi-pencil me-1"></i>Modifier
                    </a>
                    <form action="{{ route('techniciens.destroy', $technicien) }}"
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
        </div>
    @empty
        <div class="col-12">
            <div class="alert alert-info">
                <i class="bi bi-info-circle me-2"></i>Aucun technicien enregistre.
            </div>
        </div>
    @endforelse
</div>

{{ $techniciens->links('pagination::bootstrap-5') }}
@endsection
