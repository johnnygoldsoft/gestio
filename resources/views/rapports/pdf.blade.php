<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Rapport Mensuel</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            color: #333;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 20px;
            text-transform: uppercase;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th, td {
            border: 1px solid #bbb;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #3498db;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .footer {
            text-align: right;
            margin-top: 30px;
            font-style: italic;
        }
    </style>
</head>
<body>

    <h1>Rapport Mensuel - {{ \Carbon\Carbon::parse($rapport->date)->format('F Y') }}</h1>

    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Activité Groupe</th>
                <th>Remarque</th>
                <th>NB Présence</th>
                <th>Visite</th>
                <th>Kits</th>
                <th>Remarques faites</th>
                <th>Pers. visitées</th>
                <th>Nouv. Enreg.</th>
                <th>Départ</th>
                <th>Transfert</th>
                <th>Cas maladie</th>
                <th>Superviseur</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ \Carbon\Carbon::parse($rapport->date)->format('d/m/Y') }}</td>
                <td>{{ $rapport->activiteGroup }}</td>
                <td>{{ $rapport->remarque }}</td>
                <td>{{ $rapport->nbPres }}</td>
                <td>{{ $rapport->visite }}</td>
                <td>{{ $rapport->kits }}</td>
                <td>{{ $rapport->observationFait }}</td>
                <td>{{ $rapport->nbPersVisit }}</td>
                <td>{{ $rapport->nouvelEnreg }}</td>
                <td>{{ $rapport->depart }}</td>
                <td>{{ $rapport->transfert }}</td>
                <td>{{ $rapport->casMaladie }}</td>
                <td>{{ $rapport->superviseur }}</td>
            </tr>
        </tbody>
    </table>

    <div class="footer">
        Généré le {{ now()->format('d/m/Y') }}
    </div>

</body>
</html>
