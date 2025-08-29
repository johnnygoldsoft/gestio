<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
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
            'email' => 'required|email',
            'password' => 'required',
            //
        ];
    }

    public function messages(): array
{
    return [
        'date.required' => 'La date du rapport est obligatoire.',
        'date.date' => 'Le format de la date est invalide.',

        'activiteGroup.required' => "L'Activité Groupe est obligatoire.",
        'remarque.string' => 'La remarque doit être une chaîne de caractères.',
        
        'nbPres.required' => 'Le nombre de personnes présentes est requis.',
        'nbPres.integer' => 'Le nombre de personnes présentes doit être un nombre.',

        'visite.required' => 'Le nombre de visites est requis.',
        'visite.integer' => 'Le nombre de visites doit être un nombre.',

        'observationFait.string' => 'La remarque sur les faits doit être une chaîne de caractères.',

        'kits.integer' => 'Le nombre de kits doit être un nombre.',
        'nbPersVisit.integer' => 'Le nombre de personnes visitées par semaine doit être un nombre.',
        'nouvelEnreg.integer' => 'Le nombre de nouveaux enregistrements doit être un nombre.',
        'depart.integer' => 'Le nombre de départs doit être un nombre.',
        'transfert.integer' => 'Le nombre de transferts doit être un nombre.',
        'casMaladie.integer' => 'Le nombre de cas de maladie doit être un nombre.',
        
        'superviseur.string' => 'Le nom du superviseur doit être une chaîne de caractères.',
        'superviseur.max' => 'Le nom du superviseur ne peut pas dépasser 255 caractères.',
    ];
}

}
