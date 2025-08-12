

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


                                


                                    
					                
							    
							    <form method="GET" action="{{ route('rapports.index') }}" class="row gx-2 align-items-center">
    <div class="col-auto">
        <input type="text" name="search" class="form-control" placeholder="Recherche"
               value="{{ request('search') }}">
    </div>

    <div class="col-auto">
        <select name="periode" class="form-select w-auto" onchange="this.form.submit()">
            <option value="">Tous</option>
            <option value="mois" {{ request('periode') == 'mois' ? 'selected' : '' }}>Ce mois</option>
            <option value="annee" {{ request('periode') == 'annee' ? 'selected' : '' }}>Cette année</option>
        </select>
    </div>

    <div class="col-auto">
        <button type="submit" class="btn btn-primary">Filtrer</button>
    </div>

    @if(request()->has('search') || request()->has('periode'))
        <div class="col-auto">
            <a href="{{ route('rapports.index') }}" class="btn btn-outline-secondary">Réinitialiser</a>
        </div>
    @endif
</form>

</div><!--//col-->

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
    @forelse ($grouped as $mois => $rapportsDuMois)
       

        <tr>
    <td colspan="15" class="fw-bold bg-light text-primary">
        {{ strtoupper($mois) }}
        <a href="{{ route('rapports.imprimerParMois', ['mois' => $rapportsDuMois->first()->mois, 'annee' => $rapportsDuMois->first()->annee]) }}"
           class="btn btn-sm btn-outline-primary float-end" target="_blank">
            <i class="fa fa-print"></i> Imprimer
        </a>
    </td>
</tr>


        @foreach ($rapportsDuMois as $rapport)
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
                    <button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#rapportModal{{ $rapport->id }}">Voir</button>
                    <a href="{{ route('rapports.edit', $rapport->id) }}" class="btn btn-sm btn-warning">Modifier</a>
                    <!-- <a href="{{ route('rapports.pdf', $rapport->id) }}" class="btn btn-sm btn-success">
                        <i class="fa fa-file-pdf"></i>
                    </a> -->
                    <form action="{{ route('rapports.destroy', $rapport->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Supprimer ce rapport ?')">Supprimer</button>
                    </form>
                </td>
            </tr>

            {{-- Modal --}}
            @include('rapports.partials.modal', ['rapport' => $rapport])
        @endforeach
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