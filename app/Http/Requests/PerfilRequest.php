<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PerfilRequest extends FormRequest
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
            'imagem'         => 'mimes:jpeg,jpg,bmp,png|required|max:2040',
            'postagem'         => 'required',
        ];

        return[
            'mimes'   => 'A imagem dever apenas do formato JPEG, JPG, BMP ou PNG',
            'max'      => 'O tamanho maximo do arquivo :max',
            'required'    => 'Campo obrigatório'
        ];
    }
}
