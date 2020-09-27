<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployerRequest extends FormRequest
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
            'descrip'=>'required|string',
            'date_debut' => 'required|date|after:tomorrow',
            'date_fin' => 'date',
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
    public function messages()
    {
        return [
            'cin.required' => 'Le CIN/Matricule est obligatoire',
            'prenom.required'=> 'Ce champ est obligatoire',
            'email.required'=> 'Ce champ est obligatoire',
            'salaire.required'=> 'Ce champ est obligatoire',
            'salaire_base.required'=> 'Ce champ est obligatoire',
            'fonction.required'=> 'Ce champ est obligatoire',
            'adresse.string'=>'ce champ est obligatoire',
            'tele.required'=>'ce champ est obligatoire',
            'date_fin.date'=>'Ce champ est obligatoire',
            'cin.unique' => 'Le CIN/Matricule doit être unique',
            'cin.string' => 'Le CIN/Matricule doit être un string',
            'nom_employer.required' => 'le nom est obligaatoire',
            'date_naissance.required' => 'la date de naissance est obligatoire',
            'Num_cnss.required'=>'le numero CNSS est obligatoire',
            'Num_cnss.unique'=>'le numero CNSS est deja existe',
            'Num_cnss.numeric'=>'le  CNSS est un numero',
            'descrip.required'=>"ce champs est obligatoire",
            'descrip.string'=>'entre just du text',
            'Num_Icmr.required'=>'le numero ICMR est obligatoire',
            'Num_Icmr.unique'=>'le numero ICMR est deja existe',
            'Num_Icmr.numeric'=>'le  ICMR est un numero',
            'rib.numeric' => 'Le RIB doit être un numéro',
            'rib.min' => 'Le RIB doit être au minimun 16 nombre',
            'rib.unique' => 'Le RIB est deja existe',
            'nom_banque.required' => 'On veut s\'avoir le nom de la  banque ',
            'date_embauche.required' => 'la date embauche est obligatoire',
            'date_embauche.after' => 'la date embauche doit etre apres demain',
            'nom_dep.required' => 'dans quelle departement on va ajouter l\'employer',
            'salaire_base.required' => 'Salaire de base est obligatoire',
            'salaire_base.numeric' => ' Le Salaire doit être un numéro',

        ];
    }
}
