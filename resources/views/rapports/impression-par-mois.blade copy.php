<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Rapports – {{ strtoupper($nomMois) }} {{ $annee }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        @media print {
            @page {
                size: A4 landscape;
                margin: 5mm; /* réduit les marges */
            }

            .no-print {
                display: none;
            }

            body {
                font-size: 12px;
            }

            table {
                width: 100%;
                table-layout: fixed;
            }

            th, td {
                word-wrap: break-word;
                padding: 2px;
                border: 1px solid #dee2e6;
                vertical-align: top;
            }
        }

        th, td {
            font-size: 12px;
            white-space: normal;
        }

        .text-large {
            font-size: 13px;
            font-weight: 500;
        }
    </style>
</head>
<body>
    <br>
<div class="container-fluid mt-3">
    


    <div class="rapport-header" style="margin-bottom: 20px;">
        <div style="text-align: center; margin-bottom: 20px;">
    <img src="{{ asset('images/logo.jpg') }}" alt="Logo" style="height: 80px;">
    <h2 style="margin-top: 10px;">RAPPORT MENSUEL D'ACTIVITÉ</h2>
</div>
    <!-- <h2 style="text-align: center; font-size: 24px;">RAPPORT MENSUEL D'ACTIVITÉ</h2> -->
    <p style="text-align: center;">Centre De Developpement des Enfants et Jeunes - Survie TG0101</p>
    <p style="text-align: center;">Mois : {{ strtoupper($nomMois) }} | Année : {{ $annee }}</p>
    </div>

    {{-- Tu peux aussi ajouter un encadré d’introduction --}}
    <div style="margin-bottom: 20px; font-size: 16px;">
        <strong>Résumé :</strong>
        <p>
            Ce rapport regroupe l’ensemble des activités réalisées dans le mois sélectionné.
            Il couvre les présences, les visites, les nouveaux enregistrements, ainsi que les transferts et autres cas importants.
        </p>
    </div>


    @if ($rapports->isEmpty())
        <div class="alert alert-info">Aucun rapport trouvé pour ce mois.</div>
    @else
        <table class="table table-bordered">
            <thead class="table-dark text-center align-middle">
                <tr>
                    <th>ID</th>
                    <th>Date</th>
                    <th class="text-large">Activité groupe</th>
                    <th class="text-large">Remarque</th>
                    <th>Présents</th>
                    <th>Visites</th>
                    <th class="text-large">Observation faite</th>
                    <th>Kits</th>
                    <th>transition</th>
                    <th>Nouv. Enregs</th>
                    <th>Départs</th>
                    <th>Transferts</th>
                    <th>Cas Maladies</th>
                    <th>Superviseur</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rapports as $rapport)
                    <tr>
                        <td>{{ $rapport->id }}</td>
                        <td>{{ \Carbon\Carbon::parse($rapport->date)->format('d/m/Y') }}</td>
                        <td class="text-large">{{ $rapport->activiteGroup }}</td>
                        <td class="text-large">{{ $rapport->remarque }}</td>
                        <td>{{ $rapport->nbPres }}</td>
                        <td>{{ $rapport->visite }}</td>
                        <td class="text-large">{{ $rapport->observationFait }}</td>
                        <td>{{ $rapport->kits }}</td>
                        <td>{{ $rapport->nbPersVisit }}</td>
                        <td>{{ $rapport->nouvelEnreg }}</td>
                        <td>{{ $rapport->depart }}</td>
                        <td>{{ $rapport->transfert }}</td>
                        <td>{{ $rapport->casMaladie }}</td>
                        <td>{{ $rapport->superviseur }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
        <tr class="table-light fw-bold text-end">
            <td colspan="4" class="text-center">TOTAL</td>
            <td>{{ $rapports->sum('nbPres') }}</td>
            <td>{{ $rapports->sum('visite') }}</td>
            <td></td>
            <td>{{ $rapports->sum('kits') }}</td>
            <td>{{ $rapports->sum('nbPersVisit') }}</td>
            <td>{{ $rapports->sum('nouvelEnreg') }}</td>
            <td>{{ $rapports->sum('depart') }}</td>
            <td>{{ $rapports->sum('transfert') }}</td>
            <td>{{ $rapports->sum('casMaladie') }}</td>
            <td></td>
        </tr>
    </tfoot>
        </table>
    @endif


    <div class="d-flex justify-content-between align-items-center no-print mb-3">
        <h5>Rapports Survie TG0101 – {{ strtoupper($nomMois) }} {{ $annee }}</h5>
        <button onclick="window.print()" class="btn btn-success">Imprimer</button>
    </div>

    <br>

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
<br>

</div>
</body>
</html>
