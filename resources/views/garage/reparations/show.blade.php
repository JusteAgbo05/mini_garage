@extends('base')

@section('titre', 'Detail reparation')

@section('contenu')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="mb-0"><i class="bi bi-wrench me-2"></i>Detail de la reparation</h2>
    <a href="{{ route('reparations.index') }}" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left me-1"></i>Retour
    </a>
</div>

<div class="row g-4">
    <div class="col-md-6">
        <div class="card h-100">
            <div class="card-header bg-dark text-white">
                <i class="bi bi-info-circle me-2"></i>Informations de la reparation
            </div>
            <div class="card-body">
                <table class="table table-borderless mb-0">
                    <tr>
                        <th class="text-muted" style="width:45%">Objet</th>
                        <td>{{ $reparation->objet_reparation }}</td>
                    </tr>
                    <tr>
                        <th class="text-muted">Date</th>
                        <td>{{ $reparation->date }}</td>
                    </tr>
                    <tr>
                        <th class="text-muted">Duree main d'oeuvre</th>
                        <td>{{ $reparation->duree_main_oeuvre }} heure(s)</td>
                    </tr>
                </table>
            </div>
            <div class="card-footer d-flex gap-2">
                <a href="{{ route('reparations.edit', $reparation) }}" class="btn btn-warning btn-sm">
                    <i class="bi bi-pencil me-1"></i>Modifier
                </a>
                <form action="{{ route('reparations.destroy', $reparation) }}" method="POST"
                      onsubmit="return confirm('Confirmer la suppression ?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">
                        <i class="bi bi-trash me-1"></i>Supprimer
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card mb-4">
            <div class="card-header bg-dark text-white">
                <i class="bi bi-car-front me-2"></i>Vehicule concerne
            </div>
            <div class="card-body">
                <table class="table table-borderless mb-0">
                    <tr>
                        <th class="text-muted" style="width:45%">Immatriculation</th>
                        <td>
                            <span class="badge bg-dark fs-6">
                                {{ $reparation->vehicule->immatriculation }}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <th class="text-muted">Marque / Modele</th>
                        <td>
                            {{ $reparation->vehicule->marque }}
                            {{ $reparation->vehicule->modele }}
                        </td>
                    </tr>
                    <tr>
                        <th class="text-muted">Annee</th>
                        <td>{{ $reparation->vehicule->annee }}</td>
                    </tr>
                    <tr>
                        <th class="text-muted">Energie</th>
                        <td>{{ $reparation->vehicule->energie }}</td>
                    </tr>
                </table>
                <a href="{{ route('vehicules.show', $reparation->vehicule) }}"
                   class="btn btn-outline-dark btn-sm mt-2">
                    <i class="bi bi-eye me-1"></i>Voir le vehicule
                </a>
            </div>
        </div>

        <div class="card">
            <div class="card-header bg-dark text-white">
                <i class="bi bi-person-gear me-2"></i>
                Techniciens assignes
                <span class="badge bg-secondary ms-2">
                    {{ $reparation->techniciens->count() }}
                </span>
            </div>
            <div class="card-body">
                @forelse($reparation->techniciens as $technicien)
                    <div class="d-flex justify-content-between align-items-center
                                border-bottom py-2">
                        <div>
                            <strong>{{ $technicien->prenom }} {{ $technicien->nom }}</strong>
                            <div class="text-muted small">{{ $technicien->specialite }}</div>
                        </div>
                        <a href="{{ route('techniciens.show', $technicien) }}"
                           class="btn btn-outline-dark btn-sm">
                            <i class="bi bi-eye"></i>
                        </a>
                    </div>
                @empty
                    <p class="text-muted mb-0">Aucun technicien assigne.</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
