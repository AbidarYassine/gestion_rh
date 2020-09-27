<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddUserRequest extends FormRequest
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
            'name' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'rais_social' => 'required|unique:users',
            'tele' => ["required", "regex:/^(0|\+212)[1-9]([-.]?[0-9]{2}){4}$/"],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'le champ nom est obligatoire',
            'name.unique' => 'nom deja existe',
            'password.min'=>'le nombre de caractere minumun pour le mot de passe est 8',
            'password.confirmed'=>'erreur de confirmation de mot de passe',
            'email.required' => 'email est obligatoire',
            'email.unique' => 'email déja existe',
            'rais_social.required' => 'Le champ raison social est obligatoire',
            'rais_social.unique' => 'Le champ raison social deja existe',
            'tele.required' => 'Telephone est obligatoire',
            'tele.regex' => 'format de telephone est  incorrect',
        ];
    }
}
