@extends('layouts.template')


@section('content')

<h1 class="app-page-title">Tableau de bord </h1>
			    
			    
			    <div class="row g-2 mb-4">
				    <div class="col-6 col-lg-6">
					    <div class="app-card app-card-stat shadow-sm h-100">
						    <div class="app-card-body p-3 p-lg-4">
							    <h4 class="stats-type mb-1">Total Rapport</h4>
							    <div class="stats-figure">{{ $totalRapports }}</div>
                                <div class="stats-meta text-success">
                                    <i class="fa fa-folder"> </i>
                                </div>
							    
						    </div><!--//app-card-body-->
						    <a class="app-card-link-mask" href="#"></a>
					    </div><!--//app-card-->
				    </div><!--//col-->
				    
				    <div class="col-6 col-lg-6">
					    <div class="app-card app-card-stat shadow-sm h-100">
						    <div class="app-card-body p-3 p-lg-4">
							    <h4 class="stats-type mb-1">Pour cette annees</h4>
							    <div class="stats-figure">{{ 10 }}</div>
                                <div class="stats-meta text-success">
                                    <i class="fa fa-folder"> </i>
                                </div>
							    
						    </div><!--//app-card-body-->
						    <a class="app-card-link-mask" href="#"></a>
					    </div><!--//app-card-->
				    </div><!--//col-->
			    </div><!--//row-->
			    

@endsection