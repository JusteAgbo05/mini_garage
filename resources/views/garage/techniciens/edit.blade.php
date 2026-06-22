@extends('base')

@section('titre', 'Modifier ' . $technicien->prenom . ' ' . $technicien->nom)

@section('contenu')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="mb-0"><i class="bi bi-pencil me-2"></i>Modifier le technicien</h2>
    <a href="{{ route('techniciens.index') }}" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left me-1"></i>Retour
    </a>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('techniciens.update', $technicien) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Nom</label>
                    <input type="text" name="nom"
                           class="form-control @error('nom') is-invalid @enderror"
                           value="{{ old('nom', $technicien->nom) }}">
                    @error('nom')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Prenom</label>
                    <input type="text" name="prenom"
                           class="form-control @error('prenom') is-invalid @enderror"
                           value="{{ old('prenom', $technicien->prenom) }}">
                    @error('prenom')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12">
                    <label class="form-label fw-semibold">Specialite</label>
                    <select name="specialite"
                            class="form-select @error('specialite') is-invalid @enderror">
                        @foreach([
                            'Mecanique generale',
                            'Electricite automobile',
                            'Carrosserie',
                            'Climatisation',
                            'Transmission',
                            'Diagnostic electronique',
                            'Pneumatiques',
                            'Suspension et direction'
                        ] as $specialite)
                            <option value="{{ $specialite }}"
                                {{ old('specialite', $technicien->specialite) == $specialite ? 'selected' : '' }}>
                                {{ $specialite }}
                            </option>
                        @endforeach
                    </select>
                    @error('specialite')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mt-4 d-flex gap-2">
                <button type="submit" class="btn btn-warning">
                    <i class="bi bi-check-lg me-1"></i>Mettre a jour
                </button>
                <a href="{{ route('techniciens.show', $technicien) }}"
                   class="btn btn-outline-secondary">Annuler</a>
            </div>
        </form>
    </div>
</div>
@endsection
