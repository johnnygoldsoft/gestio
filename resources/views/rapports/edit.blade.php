@extends('layouts.template')

@section('content')
<div class="container">
    <h1 class="mb-4">Modifier le Rapport</h1>

    <form action="{{ route('rapports.update', $rapport->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="date" class="form-label">Date</label>
                <input type="date" name="date" id="date" class="form-control" value="{{ old('date', $rapport->date) }}">
                @error('date') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="col-md-6">
                <label for="superviseur" class="form-label">Superviseur</label>
                <input type="text" name="superviseur" id="superviseur" class="form-control" value="{{ old('superviseur', $rapport->superviseur) }}">
                @error('superviseur') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="activiteGene" class="form-label">Activité Générale</label>
                <textarea name="activiteGene" id="activiteGene" class="form-control">{{ old('activiteGene', $rapport->activiteGene) }}</textarea>
                @error('activiteGene') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="col-md-6">
                <label for="remarque" class="form-label">Remarque</label>
                <textarea name="remarque" id="remarque" class="form-control">{{ old('remarque', $rapport->remarque) }}</textarea>
                @error('remarque') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-4">
                <label for="nbPres" class="form-label">Nombre Présents</label>
                <input type="number" name="nbPres" class="form-control" value="{{ old('nbPres', $rapport->nbPres) }}">
            </div>

            <div class="col-md-4">
                <label for="visite" class="form-label">Visites</label>
                <input type="number" name="visite" class="form-control" value="{{ old('visite', $rapport->visite) }}">
            </div>

            <div class="col-md-4">
                <label for="remarqueFait" class="form-label">Remarques faites</label>
                <input type="text" name="remarqueFait" class="form-control" value="{{ old('remarqueFait', $rapport->remarqueFait) }}">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3">
                <label for="kits" class="form-label">Kits</label>
                <input type="number" name="kits" class="form-control" value="{{ old('kits', $rapport->kits) }}">
            </div>

            <div class="col-md-3">
                <label for="nbPersVisitSem" class="form-label">Personnes Visitées (Semaine)</label>
                <input type="number" name="nbPersVisitSem" class="form-control" value="{{ old('nbPersVisitSem', $rapport->nbPersVisitSem) }}">
            </div>

            <div class="col-md-3">
                <label for="nouvelEnreg" class="form-label">Nouveaux Enregistrés</label>
                <input type="number" name="nouvelEnreg" class="form-control" value="{{ old('nouvelEnreg', $rapport->nouvelEnreg) }}">
            </div>

            <div class="col-md-3">
                <label for="depart" class="form-label">Départs</label>
                <input type="number" name="depart" class="form-control" value="{{ old('depart', $rapport->depart) }}">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="transfert" class="form-label">Transferts</label>
                <input type="number" name="transfert" class="form-control" value="{{ old('transfert', $rapport->transfert) }}">
            </div>

            <div class="col-md-6">
                <label for="casMaladie" class="form-label">Cas de Maladie</label>
                <input type="number" name="casMaladie" class="form-control" value="{{ old('casMaladie', $rapport->casMaladie) }}">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
        <a href="{{ route('rapports.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
