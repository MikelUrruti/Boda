<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DestroyUserAlergiaRequest extends FormRequest
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

    public function rules()
    {
        return [
            'usuariosSeleccionados' => 'required|array',
            'alergia' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'usuariosSeleccionados.required' => trans("destroy.error.usuariosSeleccionados.required"),
            'usuariosSeleccionados.array' => trans("destroy.error.usuariosSeleccionados.array"),
            'alergia.required' => trans("destroy.error.alergiaUser.required")
        ];
    }
}
