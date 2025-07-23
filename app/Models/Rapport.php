<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rapport extends Model
{
    use HasFactory;
    protected $fillable = [
    'date',
    'mois',
    'annee',
    'activiteGene',
    'remarque',
    'nbPres',
    'visite',
    'remarqueFait',
    'kits',
    'nbPersVisitSem',
    'nouvelEnreg',
    'depart',
    'transfert',
    'casMaladie',
    'superviseur',
];
}
