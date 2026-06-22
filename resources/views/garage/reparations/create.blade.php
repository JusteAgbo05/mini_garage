@extends('base')

@section('titre', 'Nouvelle reparation')

@section('contenu')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="mb-0"><i class="bi bi-plus-circle me-2"></i>Nouvelle reparation</h2>
    <a href="{{ route('reparations.index') }}" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left me-1"></i>Retour
    </a>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('reparations.store') }}" method="POST">
            @csrf
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Vehicule</label>
                    <select name="vehicule_id"
                            class="form-select @error('vehicule_id') is-invalid @enderror">
                        <option value="">-- Selectionner un vehicule --</option>
                        @foreach($vehicules as $vehicule)
                            <option value="{{ $vehicule->id }}"
                                {{ old('vehicule_id') == $vehicule->id ? 'selected' : '' }}>
                                {{ $vehicule->immatriculation }} -
                                {{ $vehicule->marque }} {{ $vehicule->modele }}
                            </option>
                        @endforeach
                    </select>
                    @error('vehicule_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Date de reparation</label>
                    <input type="date" name="date"
                           class="form-control @error('date') is-invalid @enderror"
                           value="{{ old('date') }}">
                    @error('date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Duree de main d'oeuvre (heures)</label>
                    <input type="number" name="duree_main_oeuvre" step="0.5" min="0"
                           class="form-control @error('duree_main_oeuvre') is-invalid @enderror"
                           value="{{ old('duree_main_oeuvre') }}" placeholder="3.5">
                    @error('duree_main_oeuvre')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Objet de la reparation</label>
                    <input type="text" name="objet_reparation"
                           class="form-control @error('objet_reparation') is-invalid @enderror"
                           value="{{ old('objet_reparation') }}"
                           placeholder="Changement de freins">
                    @error('objet_reparation')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12">
                    <label class="form-label fw-semibold">
                        Techniciens assignes
                        <span class="text-muted fw-normal">(selection multiple possible)</span>
                    </label>
                    @error('techniciens')
                        <div class="text-danger small mb-2">{{ $message }}</div>
                    @enderror
                    <div class="row g-2">
                        @foreach($techniciens as $technicien)
                            <div class="col-md-4">
                                <div class="form-check border rounded p-3">
                                    <input class="form-check-input" type="checkbox"
                                           name="techniciens[]"
                                           value="{{ $technicien->id }}"
                                           id="tech_{{ $technicien->id }}"
                                           {{ in_array($technicien->id, old('techniciens', [])) ? 'checked' : '' }}>
                                    <label class="form-check-label w-100"
                                           for="tech_{{ $technicien->id }}">
                                        <strong>{{ $technicien->prenom }} {{ $technicien->nom }}</strong>
                                        <div class="text-muted small">{{ $technicien->specialite }}</div>
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="mt-4 d-flex gap-2">
                <button type="submit" class="btn btn-dark">
                    <i class="bi bi-check-lg me-1"></i>Enregistrer
                </button>
                <a href="{{ route('reparations.index') }}" class="btn btn-outline-secondary">
                    Annuler
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
