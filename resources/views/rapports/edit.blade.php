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
                <label for="activiteGroup" class="form-label">Activité de Groupe</label>
                <textarea name="activiteGroup" id="activiteGroup" class="form-control">{{ old('activiteGroup', $rapport->activiteGroup) }}</textarea>
                @error('activiteGroup') <small class="text-danger">{{ $message }}</small> @enderror
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
                <label for="observationFait" class="form-label">Remarques faites</label>
                <input type="text" name="observationFait" class="form-control" value="{{ old('observationFait', $rapport->observationFait) }}">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3">
                <label for="kits" class="form-label">Kits</label>
                <input type="number" name="kits" class="form-control" value="{{ old('kits', $rapport->kits) }}">
            </div>

            <div class="col-md-3">
                <label for="nbPersVisit" class="form-label">Personnes Visitées</label>
                <input type="number" name="nbPersVisit" class="form-control" value="{{ old('nbPersVisit', $rapport->nbPersVisit) }}">
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
                <label for="vaccination" class="form-label">Vaccinations</label>
                <input type="number" name="vaccination" class="form-control" value="{{ old('vaccination', $rapport->vaccination) }}">
            </div>

            <div class="col-md-6">
                <label for="casMaladie" class="form-label">Maladie</label>
                <input type="number" name="casMaladie" class="form-control" value="{{ old('casMaladie', $rapport->casMaladie) }}">
            </div>
            <div class="col-md-6">
                <label for="commentMaladie" class="form-label">Commentaire maladie</label>
                <input type="text" name="commentMaladie" id="commentMaladie" class="form-control" value="{{ old('commentMaladie', $rapport->commentMaladie) }}">
                @error('commentMaladie') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
        <a href="{{ route('rapports.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
