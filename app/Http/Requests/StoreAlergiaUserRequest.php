<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreAlergiaUserRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {

        return [
            'alergia' => ['required',
            Rule::unique('alergiasusuarios','idAlergia')->where('idUsuario',$this->usuario)
        ],
            'usuario' => ['required',
            Rule::unique('alergiasusuarios','idAlergia')->where('idUsuario',$this->usuario)
        ]
        ];
    }

    public function messages()
    {
        return [
            'usuario.required' => trans("anadirUsuarioAlergia.error.usuario.required"),
            'usuario.unique' => trans("anadirUsuarioAlergia.error.unique"),
            'alergia.required' => trans("anadirUsuarioAlergia.error.alergia.required"),
            'alergia.unique' => trans("anadirUsuarioAlergia.error.unique"),
        ];
    }
}
