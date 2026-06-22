@extends('base')

@section('titre', 'Ajouter un vehicule')

@section('contenu')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="mb-0"><i class="bi bi-plus-circle me-2"></i>Nouveau vehicule</h2>
    <a href="{{ route('vehicules.index') }}" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left me-1"></i>Retour
    </a>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('vehicules.store') }}" method="POST">
            @csrf
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Immatriculation</label>
                    <input type="text" name="immatriculation"
                           class="form-control @error('immatriculation') is-invalid @enderror"
                           value="{{ old('immatriculation') }}" placeholder="AB-123-CD">
                    @error('immatriculation')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Marque</label>
                    <input type="text" name="marque"
                           class="form-control @error('marque') is-invalid @enderror"
                           value="{{ old('marque') }}" placeholder="Renault">
                    @error('marque')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Modele</label>
                    <input type="text" name="modele"
                           class="form-control @error('modele') is-invalid @enderror"
                           value="{{ old('modele') }}" placeholder="Clio">
                    @error('modele')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Couleur</label>
                    <input type="text" name="couleur"
                           class="form-control @error('couleur') is-invalid @enderror"
                           value="{{ old('couleur') }}" placeholder="Rouge">
                    @error('couleur')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Annee</label>
                    <input type="number" name="annee"
                           class="form-control @error('annee') is-invalid @enderror"
                           value="{{ old('annee') }}" placeholder="2020" min="1900" max="2099">
                    @error('annee')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Kilometrage</label>
                    <input type="number" name="kilometrage"
                           class="form-control @error('kilometrage') is-invalid @enderror"
                           value="{{ old('kilometrage') }}" placeholder="45000" min="0">
                    @error('kilometrage')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Carrosserie</label>
                    <select name="carrosserie"
                            class="form-select @error('carrosserie') is-invalid @enderror">
                        <option value="">-- Choisir --</option>
                        @foreach(['Berline','SUV','Break','Coupe','Monospace','Cabriolet','Utilitaire'] as $type)
                            <option value="{{ $type }}" {{ old('carrosserie') == $type ? 'selected' : '' }}>
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
                        <option value="">-- Choisir --</option>
                        @foreach(['Essence','Diesel','Hybride','Electrique','GPL'] as $type)
                            <option value="{{ $type }}" {{ old('energie') == $type ? 'selected' : '' }}>
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
                        <option value="">-- Choisir --</option>
                        @foreach(['Manuelle','Automatique','Semi-automatique'] as $type)
                            <option value="{{ $type }}" {{ old('boite') == $type ? 'selected' : '' }}>
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
                <button type="submit" class="btn btn-dark">
                    <i class="bi bi-check-lg me-1"></i>Enregistrer
                </button>
                <a href="{{ route('vehicules.index') }}" class="btn btn-outline-secondary">Annuler</a>
            </div>
        </form>
    </div>
</div>
@endsection
