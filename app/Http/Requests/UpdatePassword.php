<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePassword extends FormRequest
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
            'password' => 'required|string|min:8|confirmed',
        ];
    }
    public function messages()
    {
        return [
            'password.required' => 'Nouveau mot de passe  est obligatoire',
            'password.confirmed' => 'Entre le meme mot de passe',
            'password.min' => 'mot de pass doit etre plus de 8 caractere',
        ];
    }
}
