<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PresenceRequest extends FormRequest
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
            'heur_entre'=>['required','regex:/^((?:[01]\d|2[0-3]):[0-5]\d$)/'],
            'heur_sortit'=>['required','regex:/^((?:[01]\d|2[0-3]):[0-5]\d$)/'],
            'note'=>'string',
            'date_pointe'=>'required|date_format:yy-m-d',
            'id_emp'=>'numeric'
        ];
    }
    public function messages(){
        return[
            'heur_entre.required'=>'ce champs est obligatoire',
            'heur_entre.regex'=>'entre valid heure',
            'heur_sortit.required'=>'ce champs est obligatoire',
            'heur_sortit.regex'=>'entre valid heure'
        ];
        
    }
}
