@extends('base')

@section('titre', $vehicule->marque . ' ' . $vehicule->modele)

@section('contenu')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="mb-0">
        <i class="bi bi-car-front me-2"></i>
        {{ $vehicule->marque }} {{ $vehicule->modele }}
    </h2>
    <a href="{{ route('vehicules.index') }}" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left me-1"></i>Retour
    </a>
</div>

<div class="row g-4">
    <div class="col-md-5">
        <div class="card h-100">
            <div class="card-header bg-dark text-white">
                <i class="bi bi-info-circle me-2"></i>Informations du vehicule
            </div>
            <div class="card-body">
                <table class="table table-borderless mb-0">
                    <tr>
                        <th class="text-muted" style="width:45%">Immatriculation</th>
                        <td><span class="badge bg-dark fs-6">{{ $vehicule->immatriculation }}</span></td>
                    </tr>
                    <tr>
                        <th class="text-muted">Marque</th>
                        <td>{{ $vehicule->marque }}</td>
                    </tr>
                    <tr>
                        <th class="text-muted">Modele</th>
                        <td>{{ $vehicule->modele }}</td>
                    </tr>
                    <tr>
                        <th class="text-muted">Couleur</th>
                        <td>{{ $vehicule->couleur }}</td>
                    </tr>
                    <tr>
                        <th class="text-muted">Annee</th>
                        <td>{{ $vehicule->annee }}</td>
                    </tr>
                    <tr>
                        <th class="text-muted">Kilometrage</th>
                        <td>{{ number_format($vehicule->kilometrage, 0, ',', ' ') }} km</td>
                    </tr>
                    <tr>
                        <th class="text-muted">Carrosserie</th>
                        <td>{{ $vehicule->carrosserie }}</td>
                    </tr>
                    <tr>
                        <th class="text-muted">Energie</th>
                        <td>{{ $vehicule->energie }}</td>
                    </tr>
                    <tr>
                        <th class="text-muted">Boite</th>
                        <td>{{ $vehicule->boite }}</td>
                    </tr>
                </table>
            </div>
            <div class="card-footer d-flex gap-2">
                <a href="{{ route('vehicules.edit', $vehicule) }}" class="btn btn-warning btn-sm">
                    <i class="bi bi-pencil me-1"></i>Modifier
                </a>
                <form action="{{ route('vehicules.destroy', $vehicule) }}" method="POST"
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

    <div class="col-md-7">
        <div class="card">
            <div class="card-header bg-dark text-white">
                <i class="bi bi-wrench me-2"></i>
                Historique des reparations
                <span class="badge bg-secondary ms-2">{{ $vehicule->reparations->count() }}</span>
            </div>
            <div class="card-body p-0">
                @forelse($vehicule->reparations as $reparation)
                    <div class="p-3 border-bottom">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <strong>{{ $reparation->objet_reparation }}</strong>
                                <div class="text-muted small">
                                    <i class="bi bi-calendar me-1"></i>{{ $reparation->date }}
                                    &nbsp;|&nbsp;
                                    <i class="bi bi-clock me-1"></i>{{ $reparation->duree_main_oeuvre }}h
                                </div>
                                <div class="mt-1">
                                    @foreach($reparation->techniciens as $technicien)
                                        <span class="badge bg-secondary me-1">
                                            {{ $technicien->prenom }} {{ $technicien->nom }}
                                        </span>
                                    @endforeach
                                </div>
                            </div>
                            <a href="{{ route('reparations.show', $reparation) }}"
                               class="btn btn-outline-dark btn-sm">
                                <i class="bi bi-eye"></i>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="p-3 text-muted">
                        <i class="bi bi-info-circle me-1"></i>Aucune reparation enregistree.
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
