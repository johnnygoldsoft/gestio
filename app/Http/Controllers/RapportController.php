<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRapportRequest;
use App\Http\Requests\UpdateRapportRequest;
use App\Models\Rapport;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RapportController extends Controller
{
    public function __construct()
    {
        // Force Carbon à utiliser le français partout
        Carbon::setLocale('fr');
    }

    // public function index()
    // {
    //     $rapports = Rapport::orderBy('date', 'desc')->paginate(20);

    //     // Groupement par mois/année (ex: "août 2025")
    //     $grouped = $rapports->getCollection()->groupBy(function ($item) {
    //         return Carbon::parse($item->date)->translatedFormat('F Y');
    //     });

    //     return view('rapports.index', [
    //         'grouped' => $grouped,
    //         'rapports' => $rapports
    //     ]);
    // }


//     public function index(Request $request)
// {
//     // On commence par préparer la requête
//     $query = Rapport::orderBy('date', 'desc');

//     // Si un mot-clé est saisi, on filtre
//     if ($request->filled('search')) {
//         $search = $request->search;
//         $query->where(function ($q) use ($search) {
//             $q->where('activiteGene', 'like', "%{$search}%")
//               ->orWhere('remarque', 'like', "%{$search}%")
//               ->orWhere('remarqueFait', 'like', "%{$search}%")
//               ->orWhere('superviseur', 'like', "%{$search}%")
//               ->orWhereDate('date', $search);
//         });
//     }

//     // On exécute la requête avec pagination
//     $rapports = $query->paginate(20);

//     // Groupement par mois/année
//     $grouped = $rapports->getCollection()->groupBy(function ($item) {
//         return \Carbon\Carbon::parse($item->date)->translatedFormat('F Y');
//     });

//     return view('rapports.index', [
//         'grouped' => $grouped,
//         'rapports' => $rapports
//     ]);
// }


public function index(Request $request)
{
    $query = Rapport::orderBy('date', 'desc');

    // 🔍 Filtre recherche texte
    if ($request->filled('search')) {
        $search = $request->search;
        $query->where(function ($q) use ($search) {
            $q->where('activiteGene', 'like', "%{$search}%")
              ->orWhere('remarque', 'like', "%{$search}%")
              ->orWhere('remarqueFait', 'like', "%{$search}%");
        });
    }

    // 📅 Filtre période
    if ($request->periode == 'mois') {
        $query->whereMonth('date', now()->month)
              ->whereYear('date', now()->year);
    }
    if ($request->periode == 'annee') {
        $query->whereYear('date', now()->year);
    }

    $rapports = $query->paginate(20)->appends($request->query());

    $grouped = $rapports->getCollection()->groupBy(function ($item) {
        return Carbon::parse($item->date)->translatedFormat('F Y');
    });

    return view('rapports.index', compact('grouped', 'rapports'));
}




    public function create()
    {
        return view('rapports.create');
    }

    public function store(StoreRapportRequest $request)
    {
        $date = Carbon::parse($request->date);

        // Empêcher deux rapports le même jour
        if (Rapport::whereDate('date', $request->date)->exists()) {
            return back()->withErrors([
                'date' => 'Un rapport existe déjà pour ce jour.',
            ])->withInput();
        }

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

    public function show(string $id)
    {
        return view('rapports.show');
    }

    public function edit(Rapport $rapport)
    {
        return view('rapports.edit', compact('rapport'));
    }

    public function update(UpdateRapportRequest $request, Rapport $rapport)
    {
        $rapport->update($request->validated());

        return redirect()->route('rapports.index')->with('success', 'Rapport mis à jour avec succès.');
    }

    public function destroy(Rapport $rapport)
    {
        $rapport->delete();

        return redirect()->route('rapports.index')->with('success', 'Rapport supprimé avec succès.');
    }

    public function generatePdf($id)
    {
        $rapport = Rapport::findOrFail($id);

        $pdf = Pdf::loadView('rapports.pdf', compact('rapport'))
                  ->setPaper('a4', 'landscape');

        return $pdf->download('rapport-' . Carbon::parse($rapport->date)->format('Y-m') . '.pdf');
    }

    public function imprimerParMois($mois, $annee)
    {
        $rapports = Rapport::where('mois', $mois)
                            ->where('annee', $annee)
                            ->orderBy('date', 'asc')
                            ->get();

        // Nom du mois en français
        $nomMois = Carbon::createFromDate($annee, $mois, 1)->translatedFormat('F');

        return view('rapports.impression-par-mois', compact('rapports', 'mois', 'annee', 'nomMois'));
    }
}
