<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'nombre' => 'required|regex:/^[\pL\s\-]+$/u',
            'apellido' => 'required|regex:/^[\pL\s\-]+$/u',
            'correo' => 'required|email|max:255|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix|unique:users,correo',
        ];
    }

    public function messages()
    {
        return [
            'correo.required' => trans("anadir.error.required",["parametro" => "correo electrónico"]),
            'correo.email' => trans("anadir.error.correo.email"),
            'correo.regex' => trans("anadir.error.correo.email"),
            'correo.unique' => trans("anadir.error.correo.unique"),
            'nombre.required' => trans("anadir.error.required",["parametro" => "nombre"]),
            'apellido.required' => trans("anadir.error.required",["parametro" => "apellido"]),
            'nombre.regex' => trans("anadir.error.nombre.alpha",["parametro" => "nombre"]),
            'apellido.regex' => trans("anadir.error.nombre.alpha",["parametro" => "apellido"]),
        ];
    }
}
