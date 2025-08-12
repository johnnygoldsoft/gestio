

@extends('layouts.template')

@section('content')


			    <div class="row g-3 mb-4 align-items-center justify-content-between">
				    <div class="col-auto">
			            <h1 class="app-page-title mb-0">Liste des Rapports</h1>
				    </div>
				    <div class="col-auto">
					     <div class="page-utilities">
						    <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
							    <div class="col-auto">
								    <form class="table-search-form row gx-1 align-items-center">
					                    <div class="col-auto">
					                        <input type="text" id="search-orders" name="searchorders" class="form-control search-orders" placeholder="Recherche">
					                    </div>
					                    <div class="col-auto">
					                        <button type="submit" class="btn app-btn-secondary">Recherche</button>
					                    </div>
					                </form>
					                
							    </div><!--//col-->
							    <div class="col-auto">
								    
								    <select class="form-select w-auto" >
										  <option selected value="option-1">Tous</option>
										  <option value="option-2">Ce mois</option>
										  <option value="option-3">Cette Années</option>
										  
									</select>
							    </div>
							    <div class="col-auto">						    
								    <a class="btn app-btn-secondary" href="{{ route('rapports.create') }}">
									    <i class="fa fa-folder"> </i>
									     AJOUTER RAPPORTS
									</a>
							    </div>
						    </div>


							


					    </div>
				    </div>
			    </div>


				@if (Session::get('success'))
							<div class="alert alert-success">
								{{ Session::get('success') }}
							</div>
							
							@endif
			   
			    
			   
				
				<div class="tab-content" id="orders-table-tab-content">
			        <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
					    <div class="app-card app-card-orders-table shadow-sm mb-5">
						    <div class="app-card-body">
							    <div class="table-responsive">
							        <table class="table app-table-hover mb-0 text-left">
										<thead>
    <tr>
        <th class="cell">ID</th>
        <th class="cell">Date</th>
        <th class="cell">Activité Générale</th>
        <th class="cell">Remarque</th>
        <th class="cell">Présents</th>
        <th class="cell">Visites</th>
        <th class="cell">Remarques faites</th>
        <th class="cell">Kits</th>
        <th class="cell">Visites Semaine</th>
        <th class="cell">Nouveaux Enregs</th>
        <th class="cell">Départs</th>
        <th class="cell">Transferts</th>
        <th class="cell">Maladies</th>
        <th class="cell">Superviseur</th>
        <th class="cell">Actions</th>
    </tr>
</thead>

										<tbody>

                                        @forelse ($rapports as $rapport)
<tr>
    <td class="cell">{{ $rapport->id }}</td>
    <td class="cell">{{ \Carbon\Carbon::parse($rapport->date)->format('d/m/Y') }}</td>
    <td class="cell">{{ $rapport->activiteGene }}</td>
    <td class="cell">{{ $rapport->remarque }}</td>
    <td class="cell">{{ $rapport->nbPres }}</td>
    <td class="cell">{{ $rapport->visite }}</td>
    <td class="cell">{{ $rapport->remarqueFait }}</td>
    <td class="cell">{{ $rapport->kits }}</td>
    <td class="cell">{{ $rapport->nbPersVisitSem }}</td>
    <td class="cell">{{ $rapport->nouvelEnreg }}</td>
    <td class="cell">{{ $rapport->depart }}</td>
    <td class="cell">{{ $rapport->transfert }}</td>
    <td class="cell">{{ $rapport->casMaladie }}</td>
    <td class="cell">{{ $rapport->superviseur }}</td>
    <td class="cell">
        <button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#rapportModal{{ $rapport->id }}">
    Voir
</button>

        <a href="{{ route('rapports.edit', $rapport->id) }}" class="btn btn-sm btn-warning">Modifier</a>
		<a href="{{ route('rapports.pdf', $rapport->id) }}" class="btn btn-sm btn-success">
    <i class="fa fa-file-pdf"></i> Télécharger PDF
</a>

        <form action="{{ route('rapports.destroy', $rapport->id) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Supprimer ce rapport ?')">Supprimer</button>
        </form>
    </td>
</tr>

<!-- Modal -->
<div class="modal fade" id="rapportModal{{ $rapport->id }}" tabindex="-1" aria-labelledby="rapportModalLabel{{ $rapport->id }}" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="rapportModalLabel{{ $rapport->id }}">Détail du Rapport #{{ $rapport->id }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>
      <div class="modal-body">
        <ul class="list-group">
          <li class="list-group-item"><strong>Date :</strong> {{ $rapport->date }}</li>
          <li class="list-group-item"><strong>Activité Générale :</strong> {{ $rapport->activiteGene }}</li>
          <li class="list-group-item"><strong>Remarque :</strong> {{ $rapport->remarque }}</li>
          <li class="list-group-item"><strong>Présences :</strong> {{ $rapport->nbPres }}</li>
          <li class="list-group-item"><strong>Visite :</strong> {{ $rapport->visite }}</li>
          <li class="list-group-item"><strong>Remarques faites :</strong> {{ $rapport->remarqueFait }}</li>
          <li class="list-group-item"><strong>Kits :</strong> {{ $rapport->kits }}</li>
          <li class="list-group-item"><strong>Nb personnes visitées :</strong> {{ $rapport->nbPersVisitSem }}</li>
          <li class="list-group-item"><strong>Nouveaux enregistrés :</strong> {{ $rapport->nouvelEnreg }}</li>
          <li class="list-group-item"><strong>Départs :</strong> {{ $rapport->depart }}</li>
          <li class="list-group-item"><strong>Transferts :</strong> {{ $rapport->transfert }}</li>
          <li class="list-group-item"><strong>Cas maladie :</strong> {{ $rapport->casMaladie }}</li>
          <li class="list-group-item"><strong>Superviseur :</strong> {{ $rapport->superviseur }}</li>
        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>

@empty
<tr>
    <td colspan="15" class="text-center">Aucun rapport trouvé.</td>
</tr>
@endforelse


											
		
										</tbody>
									</table>

									

						        </div><!--//table-responsive-->
						       
						    </div><!--//app-card-body-->		
						</div><!--//app-card-->
						<nav class="app-pagination">
							<div class="d-flex justify-content-center mt-3">
    {{ $rapports->links() }}
</div>
						</nav><!--//app-pagination-->
						
			        </div><!--//tab-pane-->
			        
			        
			        
				

@endsection