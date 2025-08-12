<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRapportRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'date' => [
            'required',
            'date',
            Rule::unique('rapports', 'date')->ignore($this->rapport),
        ],
            'activiteGene' => 'required|string',
            'remarque' => 'nullable|string',
            'nbPres' => 'nullable|integer',
            'visite' => 'nullable|integer',
            'remarqueFait' => 'nullable|string',
            'kits' => 'nullable|integer',
            'nbPersVisitSem' => 'nullable|integer',
            'nouvelEnreg' => 'nullable|integer',
            'depart' => 'nullable|integer',
            'transfert' => 'nullable|integer',
            'casMaladie' => 'nullable|integer',
            'superviseur' => 'required|string',
        ];
    }

    public function messages(): array
{
    return [
        'date.unique' => 'Un autre rapport avec cette date existe déjà.',
        'date.required' => 'La date est obligatoire.',
        'date.date' => 'Le format de la date est invalide.',

        'activiteGene.required' => 'L\'activité générale est obligatoire.',
        'activiteGene.string' => 'L\'activité générale doit être une chaîne de caractères.',

        'remarque.string' => 'La remarque doit être une chaîne de caractères.',
        'remarqueFait.string' => 'La remarque sur les faits doit être une chaîne de caractères.',

        'nbPres.integer' => 'Le nombre de présences doit être un entier.',
        'visite.integer' => 'Le nombre de visites doit être un entier.',
        'kits.integer' => 'Le nombre de kits doit être un entier.',
        'nbPersVisitSem.integer' => 'Le nombre de personnes visitées cette semaine doit être un entier.',
        'nouvelEnreg.integer' => 'Le nombre de nouveaux enregistrements doit être un entier.',
        'depart.integer' => 'Le nombre de départs doit être un entier.',
        'transfert.integer' => 'Le nombre de transferts doit être un entier.',
        'casMaladie.integer' => 'Le nombre de cas de maladie doit être un entier.',

        'superviseur.required' => 'Le nom du superviseur est obligatoire.',
        'superviseur.string' => 'Le nom du superviseur doit être une chaîne de caractères.',
    ];
}



}
