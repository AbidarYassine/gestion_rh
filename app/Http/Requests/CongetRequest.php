<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CongetRequest extends FormRequest
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
            'date_debut' => 'required|date|after:tomorrow',
        ];
    }
    public function messages()
    {
      return [
          'date_debut.required'=>'champs Obligatoire',
          'date_debut.after'=>'La date doit etre apres demain',
      ];
    }
}
