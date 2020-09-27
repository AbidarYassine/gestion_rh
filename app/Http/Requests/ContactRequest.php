<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
        // 'id_employer', 'nom', 'email', 'subject', 'id_societe',
        return [
            'nom' => 'required|string|min:6',
            'email' => 'required|email',
            'subject' => 'required|string|min:20|max:255'
        ];
    }
    public function messages()
    {
        return [
            'nom.required' => 'ce champs est obligatoire',
            'nom.string' => 'nom incorrect',
            'email.required' => 'ce champs est obligatoire',
            'email.email' => 'entre un valide email',
            'subject.required' => 'ce champs est obligatoire',
            'subject.string' => 'subject incorrect',
            'subject.max'=>'vous avez depasse le nombre de caractere autoriser '
        ];
    }
}
