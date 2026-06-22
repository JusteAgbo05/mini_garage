@extends('base')

@section('titre', $technicien->prenom . ' ' . $technicien->nom)

@section('contenu')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="mb-0">
        <i class="bi bi-person-gear me-2"></i>
        {{ $technicien->prenom }} {{ $technicien->nom }}
    </h2>
    <a href="{{ route('techniciens.index') }}" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left me-1"></i>Retour
    </a>
</div>

<div class="row g-4">
    <div class="col-md-4">
        <div class="card h-100">
            <div class="card-header bg-dark text-white">
                <i class="bi bi-person me-2"></i>Profil du technicien
            </div>
            <div class="card-body text-center">
                <div class="rounded-circle bg-dark text-white d-flex align-items-center
                            justify-content-center mx-auto mb-3"
                     style="width:80px;height:80px;font-size:2rem">
                    {{ strtoupper(substr($technicien->prenom, 0, 1)) }}{{ strtoupper(substr($technicien->nom, 0, 1)) }}
                </div>
                <h4>{{ $technicien->prenom }} {{ $technicien->nom }}</h4>
                <span class="badge bg-secondary fs-6 mb-3">{{ $technicien->specialite }}</span>
                <table class="table table-borderless text-start mb-0">
                    <tr>
                        <th class="text-muted">Nom</th>
                        <td>{{ $technicien->nom }}</td>
                    </tr>
                    <tr>
                        <th class="text-muted">Prenom</th>
                        <td>{{ $technicien->prenom }}</td>
                    </tr>
                    <tr>
                        <th class="text-muted">Specialite</th>
                        <td>{{ $technicien->specialite }}</td>
                    </tr>
                    <tr>
                        <th class="text-muted">Reparations</th>
                        <td>{{ $technicien->reparations->count() }}</td>
                    </tr>
                </table>
            </div>
            <div class="card-footer d-flex gap-2">
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
                        <i class="bi bi-trash me-1"></i>Supprimer
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-dark text-white">
                <i class="bi bi-wrench me-2"></i>
                Reparations effectuees
                <span class="badge bg-secondary ms-2">
                    {{ $technicien->reparations->count() }}
                </span>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>Objet</th>
                                <th>Vehicule</th>
                                <th>Date</th>
                                <th>Duree</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($technicien->reparations as $reparation)
                                <tr>
                                    <td>{{ $reparation->objet_reparation }}</td>
                                    <td>
                                        {{ $reparation->vehicule->marque }}
                                        {{ $reparation->vehicule->modele }}
                                        <div class="text-muted small">
                                            {{ $reparation->vehicule->immatriculation }}
                                        </div>
                                    </td>
                                    <td>{{ $reparation->date }}</td>
                                    <td>{{ $reparation->duree_main_oeuvre }}h</td>
                                    <td>
                                        <a href="{{ route('reparations.show', $reparation) }}"
                                           class="btn btn-outline-dark btn-sm">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted py-3">
                                        Aucune reparation effectuee.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
