<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GeneroRequest extends FormRequest
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
            'descricao'         => 'required|min:3|max:10',
        ];

        return[
            'min'      => 'Campo deve ter no mínimo :min caracteres',
            'max'      => 'Campo deve ter no maximo :max caracteres',
            'required' => 'Este campo é requirido'
        ];
    }
}
