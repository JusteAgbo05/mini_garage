@extends('base')

@section('titre', 'Modifier ' . $vehicule->marque . ' ' . $vehicule->modele)

@section('contenu')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="mb-0"><i class="bi bi-pencil me-2"></i>Modifier le vehicule</h2>
    <a href="{{ route('vehicules.index') }}" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left me-1"></i>Retour
    </a>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('vehicules.update', $vehicule) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Immatriculation</label>
                    <input type="text" name="immatriculation"
                           class="form-control @error('immatriculation') is-invalid @enderror"
                           value="{{ old('immatriculation', $vehicule->immatriculation) }}">
                    @error('immatriculation')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Marque</label>
                    <input type="text" name="marque"
                           class="form-control @error('marque') is-invalid @enderror"
                           value="{{ old('marque', $vehicule->marque) }}">
                    @error('marque')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Modele</label>
                    <input type="text" name="modele"
                           class="form-control @error('modele') is-invalid @enderror"
                           value="{{ old('modele', $vehicule->modele) }}">
                    @error('modele')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Couleur</label>
                    <input type="text" name="couleur"
                           class="form-control @error('couleur') is-invalid @enderror"
                           value="{{ old('couleur', $vehicule->couleur) }}">
                    @error('couleur')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Annee</label>
                    <input type="number" name="annee"
                           class="form-control @error('annee') is-invalid @enderror"
                           value="{{ old('annee', $vehicule->annee) }}" min="1900" max="2099">
                    @error('annee')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Kilometrage</label>
                    <input type="number" name="kilometrage"
                           class="form-control @error('kilometrage') is-invalid @enderror"
                           value="{{ old('kilometrage', $vehicule->kilometrage) }}" min="0">
                    @error('kilometrage')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Carrosserie</label>
                    <select name="carrosserie"
                            class="form-select @error('carrosserie') is-invalid @enderror">
                        @foreach(['Berline','SUV','Break','Coupe','Monospace','Cabriolet','Utilitaire'] as $type)
                            <option value="{{ $type }}"
                                {{ old('carrosserie', $vehicule->carrosserie) == $type ? 'selected' : '' }}>
                                {{ $type }}
                            </option>
                        @endforeach
                    </select>
                    @error('carrosserie')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Energie</label>
                    <select name="energie"
                            class="form-select @error('energie') is-invalid @enderror">
                        @foreach(['Essence','Diesel','Hybride','Electrique','GPL'] as $type)
                            <option value="{{ $type }}"
                                {{ old('energie', $vehicule->energie) == $type ? 'selected' : '' }}>
                                {{ $type }}
                            </option>
                        @endforeach
                    </select>
                    @error('energie')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Boite de vitesses</label>
                    <select name="boite"
                            class="form-select @error('boite') is-invalid @enderror">
                        @foreach(['Manuelle','Automatique','Semi-automatique'] as $type)
                            <option value="{{ $type }}"
                                {{ old('boite', $vehicule->boite) == $type ? 'selected' : '' }}>
                                {{ $type }}
                            </option>
                        @endforeach
                    </select>
                    @error('boite')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="mt-4 d-flex gap-2">
                <button type="submit" class="btn btn-warning">
                    <i class="bi bi-check-lg me-1"></i>Mettre a jour
                </button>
                <a href="{{ route('vehicules.show', $vehicule) }}" class="btn btn-outline-secondary">Annuler</a>
            </div>
        </form>
    </div>
</div>
@endsection
