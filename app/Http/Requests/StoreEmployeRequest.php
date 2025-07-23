<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeRequest extends FormRequest
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
            //
            'date' => 'required|date',
        'activiteGene' => 'required|string',
        'remarque' => 'nullable|string',
        'nbPres' => 'required|integer',
        'visite' => 'required|integer',
        'remarqueFait' => 'nullable|string',
        'kits' => 'nullable|integer',
        'nbPersVisitSem' => 'nullable|integer',
        'nouvelEnreg' => 'nullable|integer',
        'depart' => 'nullable|integer',
        'transfert' => 'nullable|integer',
        'casMaladie' => 'nullable|integer',
        'superviseur' => 'nullable|string',
        ];
    }
}
