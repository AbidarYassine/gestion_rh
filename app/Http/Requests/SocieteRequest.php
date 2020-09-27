<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SocieteRequest extends FormRequest
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
            'site_internet' => 'string|max:255|nullable',
            'email' => 'required|string|email|max:255|unique:societes',
            'nom_societe'=>'required|string|min:3',
            'GSM'=>'required|string',
            'ville'=>'required|string',
            'pays'=>'required|string',
            'adresse'=>'required|string',
            'code_postall'=>'string|min:5|nullable',
            'devise'=>'required|String|min:2|max:10',
            'description'=>'required|string|min:20|max:500',
        ];
    }
    public function messages(){
        return [
            'email.required'=>'email est obligatoire',
            'email.string'=>'email invalid',
            'email.email'=>'email invalid',
            'email.unique'=>'email deja utiliser',
            'nom_societe.required'=>'ce champs est obligatoire',
            'nom_societe.min'=>' le nom societe invalid',
            'ville.required'=>'ville est obligatoire',
            'pays.required'=>'pays est obligatoire',
            'devise.required'=>'ce champs est obligatoire',
            'adresse.required'=>'ce champs est obligatoire',
            'description.required'=>'ce champs est obligatoire',
            'GSM.required'=>'ce champs est obligatoire',
        ];
    }

}
