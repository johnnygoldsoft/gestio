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
            'activiteGroup' => 'required|string',
            'remarque' => 'nullable|string',
            'nbPres' => 'nullable|integer',
            'visite' => 'nullable|integer',
            'observationFait' => 'nullable|string',
            'kits' => 'nullable|integer',
            'nbPersVisit' => 'nullable|integer',
            'nouvelEnreg' => 'nullable|integer',
            'depart' => 'nullable|integer',
            'transfert' => 'nullable|integer',
            'vaccination' => 'nullable|integer',
            'casMaladie' => 'nullable|integer',
            'commentMaladie' => 'required|string',
            'superviseur' => 'required|string',
        ];
    }

    public function messages(): array
{
    return [
        'date.unique' => 'Un autre rapport avec cette date existe déjà.',
        'date.required' => 'La date est obligatoire.',
        'date.date' => 'Le format de la date est invalide.',

        'activiteGroup.required' => 'L\'Activité Groupe est obligatoire.',
        'activiteGroup.string' => 'L\'Activité Groupe doit être une chaîne de caractères.',

        'remarque.string' => 'La remarque doit être une chaîne de caractères.',
        'observationFait.string' => 'La remarque sur les faits doit être une chaîne de caractères.',

        'nbPres.integer' => 'Le nombre de présences doit être un entier.',
        'visite.integer' => 'Le nombre de visites doit être un entier.',
        'kits.integer' => 'Le nombre de kits doit être un entier.',
        'nouvelEnreg.integer' => 'Le nombre de nouveaux enregistrements doit être un entier.',
        'depart.integer' => 'Le nombre de départs doit être un entier.',
        'transfert.integer' => 'Le nombre de transferts doit être un entier.',
        'vaccination.integer' => 'Le nombre de vaccination doit être un entier.',
        'casMaladie.integer' => 'Le nombre de cas de maladie doit être un entier.',

        'commentMaladie.required' => 'Le commentaire est obligatoire.',
        'commentMaladie.string' => 'Le commentaire doit être une chaîne de caractères.',

        'superviseur.required' => 'Le nom du superviseur est obligatoire.',
        'superviseur.string' => 'Le nom du superviseur doit être une chaîne de caractères.',
    ];
}



}
