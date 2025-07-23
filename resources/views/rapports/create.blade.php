
@extends('layouts.template')

@section('content')

<h1 class="app-page-title">Espace ajout de rapport</h1>
			    <hr class="mb-4">
                <div class="row g-4 settings-section">
	                <div class="col-12 col-md-4">
		                <h3 class="section-title">Ajout</h3>
		                <div class="section-intro">Ajouter Ici un nouveau rapport</a></div>
	                </div>  
	                
					<div class="col-12 col-md-8">
		                <div class="app-card app-card-settings shadow-sm p-4">
						    
						    <div class="app-card-body">
    <form class="settings-form" method="POST" action="{{ route('rapports.store') }}">

        @csrf
        @method('POST')


        @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif


        {{-- Date --}}
        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" class="form-control" id="date" name="date" required>
        </div>

        {{-- Activité générale et Remarque --}}
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="activiteGene" class="form-label">Activité Générale</label>
                <textarea class="form-control" id="activiteGene" name="activiteGene" rows="3" required></textarea>
            </div>
            <div class="col-md-6 mb-3">
                <label for="remarque" class="form-label">Remarque</label>
                <textarea class="form-control" id="remarque" name="remarque" rows="3"></textarea>
            </div>
        </div>

        {{-- Présents et Visite --}}
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="nbPres" class="form-label">Nombre de Présents</label>
                <input type="number" class="form-control" id="nbPres" name="nbPres" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="visite" class="form-label">Visites</label>
                <input type="number" class="form-control" id="visite" name="visite" required>
            </div>
        </div>

        {{-- Remarque Fait --}}
        <div class="mb-3">
            <label for="remarqueFait" class="form-label">Remarque Fait</label>
            <textarea class="form-control" id="remarqueFait" name="remarqueFait" rows="3"></textarea>
        </div>

        {{-- Kits et Personnes Visitées Semaine --}}
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="kits" class="form-label">Kits Distribués</label>
                <input type="number" class="form-control" id="kits" name="kits">
            </div>
            <div class="col-md-6 mb-3">
                <label for="nbPersVisitSem" class="form-label">Personnes Visitées (Semaine)</label>
                <input type="number" class="form-control" id="nbPersVisitSem" name="nbPersVisitSem">
            </div>
        </div>

        {{-- Nouveaux enregistrements et Départs --}}
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="nouvelEnreg" class="form-label">Nouveaux Enregistrements</label>
                <input type="number" class="form-control" id="nouvelEnreg" name="nouvelEnreg">
            </div>
            <div class="col-md-6 mb-3">
                <label for="depart" class="form-label">Départs</label>
                <input type="number" class="form-control" id="depart" name="depart">
            </div>
        </div>

        {{-- Transfert et Cas de maladie --}}
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="transfert" class="form-label">Transferts</label>
                <input type="number" class="form-control" id="transfert" name="transfert">
            </div>
            <div class="col-md-6 mb-3">
                <label for="casMaladie" class="form-label">Cas de Maladie</label>
                <input type="number" class="form-control" id="casMaladie" name="casMaladie">
            </div>
        </div>

        {{-- Superviseur --}}
        <div class="mb-3">
            <label for="superviseur" class="form-label">Nom du Superviseur</label>
            <input type="text" class="form-control" id="superviseur" name="superviseur">
        </div>

        <button type="submit" class="btn app-btn-primary">Enregistrer</button>
    </form>
</div>

						</div><!--//app-card-->
	                </div>
                </div><!--//row-->
                <hr class="my-4">

@endsection