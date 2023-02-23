<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAlergiaRequest extends FormRequest
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
            'nombre' => 'required|unique:alergias,nombre'
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => trans("anadirAlergia.error.nombre.required"),
            'nombre.unique' => trans("anadirAlergia.error.nombre.unique"),
        ];
    }
}
