@extends('base')

@section('titre', 'Liste des reparations')

@section('contenu')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="mb-0"><i class="bi bi-wrench me-2"></i>Reparations</h2>
    <a href="{{ route('reparations.create') }}" class="btn btn-dark">
        <i class="bi bi-plus-lg me-1"></i>Nouvelle reparation
    </a>
</div>

<div class="card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Vehicule</th>
                        <th>Objet</th>
                        <th>Date</th>
                        <th>Duree (h)</th>
                        <th>Techniciens</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($reparations as $reparation)
                        <tr>
                            <td>{{ $reparation->id }}</td>
                            <td>
                                <a href="{{ route('vehicules.show', $reparation->vehicule) }}"
                                   class="text-decoration-none fw-semibold">
                                    {{ $reparation->vehicule->marque }}
                                    {{ $reparation->vehicule->modele }}
                                </a>
                                <div class="text-muted small">
                                    {{ $reparation->vehicule->immatriculation }}
                                </div>
                            </td>
                            <td>{{ $reparation->objet_reparation }}</td>
                            <td>{{ $reparation->date }}</td>
                            <td>{{ $reparation->duree_main_oeuvre }}h</td>
                            <td>
                                @foreach($reparation->techniciens as $technicien)
                                    <span class="badge bg-secondary me-1">
                                        {{ $technicien->prenom }} {{ $technicien->nom }}
                                    </span>
                                @endforeach
                            </td>
                            <td>
                                <div class="d-flex gap-1">
                                    <a href="{{ route('reparations.show', $reparation) }}"
                                       class="btn btn-outline-dark btn-sm">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{ route('reparations.edit', $reparation) }}"
                                       class="btn btn-warning btn-sm">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('reparations.destroy', $reparation) }}"
                                          method="POST"
                                          onsubmit="return confirm('Confirmer la suppression ?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted py-4">
                                <i class="bi bi-info-circle me-2"></i>Aucune reparation enregistree.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="mt-3">
    {{ $reparations->links('pagination::bootstrap-5') }}
</div>
@endsection
