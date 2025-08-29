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
    'activiteGroup',
    'remarque',
    'nbPres',
    'visite',
    'observationFait',
    'kits',
    'nouvelEnreg',
    'depart',
    'transfert',
    'vaccination',
    'casMaladie',
    'commentMaladie',
    'superviseur',
];
}
