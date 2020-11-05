<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CadastroRequest extends FormRequest
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
            'nome' => 'required',
            'biografia' => 'required',
            'cidade' => 'required',
        ];
        
    }

    public function messages()
    {
		return [
			'required' => 'Este campo é obrigatório!',
			'numeric' => 'Este campo é obrigatório o uso de números!',
		];
    }
}
