<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployerUpdaateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [
            "cin" => 'required|string|unique:employers',
            'nom_employer' => 'required|string|max:20,min:6',
            'prenom' => 'required|string|max:20',
            'email' => 'required|email|max:100',
            'date_naissance' => 'required|date',
            'situationFami' => 'required|string',
            'sexe' => 'required|string',
            'Num_cnss' => 'required|numeric|unique:employers',
            'nbr_enfant' => 'numeric',
            'Num_Icmr' => 'required|numeric|unique:employers',
            'salaire' => 'required|numeric',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'fonction' => 'required|string',
            'date_debut' => 'required|date|after:tomorrow',
            'date_fin' => 'date|after:date_debut',
            'salaire_base' => 'required|numeric',
            'nom_dep' => 'required|string',
            'nom_banque' => 'required|string',
            'rib' => 'numeric|min:16|unique:banques',
            'tele' => ["required", "regex:/^(0|\+212)[1-9]([-.]?[0-9]{2}){4}$/"],
            'adresse' => 'string',
            'date_embauche' => 'required|date|after:tomorrow',
            'type' => 'required|string',
        ];
    }
}
