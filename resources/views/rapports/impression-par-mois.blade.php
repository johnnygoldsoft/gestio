<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Rapports – {{ strtoupper($nomMois) }} {{ $annee }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        @media print {

            .row { margin-bottom: 5px !important; }
            img { max-height: 60px; }
            @page {
                size: A4 landscape;
                margin: 5mm;
            }
            .no-print { display: none; }
            body { font-size: 12px;  }
            table { width: 100%; table-layout: auto; border-collapse: collapse; }
            th, td {
                border: 1px solid #dee2e6;
                padding: 2px;
                vertical-align: top;
                word-wrap: break-word;
            }
        }
        th, td { font-size: 12px; }
        .text-large { font-size: 13px; font-weight: 500; }
    </style>
</head>
<body>

<div class="container-fluid mt-3">

    {{-- En-tête compact --}}
<div class="row align-items-center mb-3">
    <div class="col-2 text-center">
        <img src="{{ asset('assets/images/logo.jpg') }}" alt="Logo" style="height: 60px;">
    </div>
    <div class="col-7 text-center">
        <h4 class="mb-1"><strong><u>RAPPORT MENSUEL D'ACTIVITE</u></strong></h4>
        <p class="mb-0">Centre De Développement des Enfants et Jeunes - Survie TG0101</p>
        <small>Mois : {{ strtoupper($nomMois) }} | Année : {{ $annee }}</small>
    </div>
    <div class="col-3 text-end no-print">
        <button onclick="window.print()" class="btn btn-success btn-sm">Imprimer</button>
    </div>
</div>

{{-- Résumé compact --}}
<div class="row mb-3">
    <div class="col">
        <strong>Résumé :</strong>
        <span style="font-size: 13px;">
            Ce rapport regroupe l’ensemble des activités réalisées dans le mois sélectionné :
            présences, visites, nouveaux enregistrements, transferts et autres cas importants.
        </span>
    </div>
</div>


    {{-- Tableau --}}
    @if ($rapports->isEmpty())
        <div class="alert alert-info">Aucun rapport trouvé pour ce mois.</div>
    @else
        <table class="table table-bordered">
            <thead class="table-dark text-center align-middle">
                <tr>
                    
                    <th>Date</th>
                    <th class="text-large">Activité de Groupe</th>
                    <th class="text-large">Remarque faite </th>
                    <th>Présences</th>
                    <th>Visites</th>
                    <th class="text-large">Observation faite</th>
                    <th>Kits</th>
                    <th>Nouv. Enregs</th>
                    <th>Départs</th>
                    <th>Transferts</th>
                    <th>Vaccinations</th>
                    <th>Maladies</th>
                    <th>Commentaire Maladies</th>
                    <th>Superviseur</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rapports as $rapport)
                    <tr>
                        
                        <td>{{ \Carbon\Carbon::parse($rapport->date)->format('d/m/Y') }}</td>
                        <td class="text-large">{{ $rapport->activiteGroup }}</td>
                        <td class="text-large">{{ $rapport->remarque }}</td>
                        <td>{{ $rapport->nbPres }}</td>
                        <td>{{ $rapport->visite }}</td>
                        <td class="text-large">{{ $rapport->observationFait }}</td>
                        <td>{{ $rapport->kits }}</td>
                        
                        <td>{{ $rapport->nouvelEnreg }}</td>
                        <td>{{ $rapport->depart }}</td>
                        <td>{{ $rapport->transfert }}</td>
                        <td>{{ $rapport->vaccination }}</td>
                        <td>{{ $rapport->casMaladie }}</td>
                        <td>{{ $rapport->commentMaladie }}</td>
                        <td>{{ $rapport->superviseur }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr class="table-light fw-bold text-end">
                    <td colspan="3" class="text-center">TOTAL</td>
                    <td>{{ $rapports->sum('nbPres') }}</td>
                    <td>{{ $rapports->sum('visite') }}</td>
                    <td></td>
                    <td>{{ $rapports->sum('kits') }}</td>
                    <td>{{ $rapports->sum('nouvelEnreg') }}</td>
                    <td>{{ $rapports->sum('depart') }}</td>
                    <td>{{ $rapports->sum('transfert') }}</td>
                    <td>{{ $rapports->sum('vaccination') }}</td>
                    <td>{{ $rapports->sum('casMaladie') }}</td>
                    <td></td>
                    <td></td>
                </tr>
            </tfoot>
        </table>
    @endif

    {{-- Bouton impression --}}
    <div class="d-flex justify-content-between align-items-center no-print mb-3">
        <h5>Rapports Survie TG0101 – {{ strtoupper($nomMois) }} {{ $annee }}</h5>
    </div>

    {{-- Signatures --}}
    <table style="width: 100%; margin-top: 40px; text-align: center;">
    <tr>
        <td>
            <h4>Président CPC</h4><br><br><br>
            ________________________<br>
        </td>
        <td>
            <H4>Coordinateur</H4><br><br><br>
            ________________________<br>
        </td>
        <td>
            <H4>Animatrice survie</H4><br><br><br>
            ________________________<br>
        </td>
    </tr>
</table>

</div>
</body>
</html>
