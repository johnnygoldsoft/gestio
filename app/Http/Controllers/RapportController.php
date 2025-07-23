<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRapportRequest;
use App\Models\Rapport;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RapportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $rapports = Rapport::paginate(10);
        return view('rapports.index', compact('rapports'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('rapports.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRapportRequest $request)
{
    // Extraire la date complète
    $date = Carbon::parse($request->date);

    // Vérifie s’il existe déjà un rapport pour ce mois et cette année
    $exists = Rapport::where('mois', $date->month)
                     ->where('annee', $date->year)
                     ->exists();

    if ($exists) {
        return back()->withErrors([
            'date' => 'Un rapport existe déjà pour ce mois et cette année.',
        ])->withInput();
    }

    // Création du rapport
    Rapport::create([
        'date' => $request->date,
        'mois' => $date->month,
        'annee' => $date->year,
        'activiteGene' => $request->activiteGene,
        'remarque' => $request->remarque,
        'nbPres' => $request->nbPres,
        'visite' => $request->visite,
        'remarqueFait' => $request->remarqueFait,
        'kits' => $request->kits,
        'nbPersVisitSem' => $request->nbPersVisitSem,
        'nouvelEnreg' => $request->nouvelEnreg,
        'depart' => $request->depart,
        'transfert' => $request->transfert,
        'casMaladie' => $request->casMaladie,
        'superviseur' => $request->superviseur,
    ]);

    return redirect()->route('rapports.index')->with('success', 'Rapport enregistré avec succès.');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return view('rapports.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rapport $rapport)
    {
        //
        return view('rapports.edit', compact('rapport'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreRapportRequest $request, Rapport $rapport) // ou UpdateRapportRequest
{
    $rapport->update($request->validated());

    return redirect()->route('rapports.index')->with('success', 'Rapport mis à jour avec succès.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rapport $rapport)
{
    $rapport->delete();

    return redirect()->route('rapports.index')->with('success', 'Rapport supprimé avec succès.');
}


public function generatePdf($id)
{
    $rapport = Rapport::findOrFail($id);

    $pdf = Pdf::loadView('rapports.pdf', compact('rapport'));

    return $pdf->download("rapport_{$rapport->id}.pdf");
}


}
