<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class StoreConfirmarInvitacionRequest extends FormRequest
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

        $tipoSiNo = [
            'required',
            Rule::in(['Si', 'No'])
        ];

        $nombre = 'required|string|alpha';
        $apellido = 'required|string|alpha';

        $transporte = [
            'required',
            Rule::in(['No','Ida','Vuelta','Ambos']),
            
        ];

        $pareja = [];
        $nombrePareja = [];
        $apellidoPareja = [];
        $correoPareja = [];
        $transportePareja = [];
        $tieneAlergiaPareja = [];


        if (request()->get('tienePareja') === "Si") {
            $pareja = [
                'required'
            ];
        }

        if (request()->get('pareja') === "Otro") {
            $nombrePareja = [
                'required',
                'string',
                'alpha'
            ];
            $apellidoPareja = [
                'required',
                'string',
                'alpha'
            ];
            $correoPareja = [
                'required',
                'string',
                'regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix'
            ];
            $transportePareja = $transporte;
            $tieneAlergiaPareja = $tipoSiNo;
        }

        return [
            'nombre' => $nombre,
            'apellido' => $apellido,
            'confirmado' => $tipoSiNo,
            'transporte' => $transporte,
            'tieneAlergia' => $tipoSiNo,
            'alergias' => 'array',
            'alergias.*' => 'distinct',
            'otros' => 'array',
            'otros.*' => 'distinct',
            'tienePareja' => $tipoSiNo,
            'pareja' => $pareja,
            'nombrePareja' => $nombrePareja,
            'apellidoPareja' => $apellidoPareja,
            'correoPareja' => $correoPareja,
            'transportePareja' => $transportePareja,
            'tieneAlergiaPareja' => $tieneAlergiaPareja,
            'alergiasPareja' => 'array',
            'alergiasPareja.*' => 'distinct',
            'otrosPareja' => 'array',
            'otrosPareja.*' => 'distinct',
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => trans("confirmarinvitacion.error.nombre.required", ["nombre" => "nombre"]),
            'nombre.alpha' => trans("confirmarinvitacion.error.nombre.alpha", ["nombre" => "nombre"]),
            'nombre.string' => trans("confirmarinvitacion.error.nombre.alpha", ["nombre" => "nombre"]),
            
            'apellido.required' => trans("confirmarinvitacion.error.nombre.required", ["nombre" => "apellido"]),
            'apellido.alpha' => trans("confirmarinvitacion.error.nombre.alpha",["nombre" => "apellido"]),
            'apellido.string' => trans("confirmarinvitacion.error.nombre.alpha", ["nombre" => "apellido"]),
            
            'confirmado.required' => trans("confirmarinvitacion.error.confirmado.required"),
            'confirmado.enum' => trans("confirmarinvitacion.error.confirmado.enum"),

            'transporte.required' => trans("confirmarinvitacion.error.transporte.required"),
            'transporte.enum' => trans("confirmarinvitacion.error.transporte.enum"),

            'tieneAlergia.required' => trans("confirmarinvitacion.error.tieneAlergia.required"),
            'tieneAlergia.enum' => trans("confirmarinvitacion.error.tieneAlergia.enum"),

            'alergias.array' => trans("confirmarinvitacion.error.alergias.array"), 
            'alergias.distinct' => trans("confirmarinvitacion.error.alergias.distinct"),

            'otros.array' => trans("confirmarinvitacion.error.alergias.array"), 
            'otros.distinct' => trans("confirmarinvitacion.error.alergias.distinct"),

            'tienePareja.required' => trans("confirmarinvitacion.error.tienePareja.required"),
            'tienePareja.enum' => trans("confirmarinvitacion.error.tienePareja.enum"),

            'pareja.required' => trans("confirmarinvitacion.error.pareja.required"),

            'nombrePareja.required' => trans("confirmarinvitacion.error.nombrePareja.required", ["nombre" => "nombre"]),
            'nombrePareja.alpha' => trans("confirmarinvitacion.error.nombrePareja.alpha", ["nombre" => "nombre"]),
            'nombrePareja.string' => trans("confirmarinvitacion.error.nombrePareja.alpha", ["nombre" => "nombre"]),

            'apellidoPareja.required' => trans("confirmarinvitacion.error.nombrePareja.required", ["nombre" => "apellido"]),
            'apellidoPareja.alpha' => trans("confirmarinvitacion.error.nombrePareja.alpha",["nombre" => "apellido"]),
            'apellidoPareja.string' => trans("confirmarinvitacion.error.nombrePareja.alpha", ["nombre" => "apellido"]),

            'correoPareja.required' => trans("confirmarinvitacion.error.correoPareja.required"),
            'correoPareja.string' => trans("confirmarinvitacion.error.correoPareja.regex"),
            'correoPareja.regex' => trans("confirmarinvitacion.error.correoPareja.regex"),

            'transportePareja.required' => trans("confirmarinvitacion.error.transportePareja.required"),
            'transportePareja.enum' => trans("confirmarinvitacion.error.transportePareja.enum"),

            'tieneAlergiaPareja.required' => trans("confirmarinvitacion.error.tieneAlergiaPareja.required"),
            'tieneAlergiaPareja.enum' => trans("confirmarinvitacion.error.tieneAlergiaPareja.enum"),

            'alergiasPareja.array' => trans("confirmarinvitacion.error.alergiasPareja.array"), 
            'alergias.distinct' => trans("confirmarinvitacion.error.alergiasPareja.distinct"),

            'otrosPareja.array' => trans("confirmarinvitacion.error.alergiasPareja.array"), 
            'otrosPareja.distinct' => trans("confirmarinvitacion.error.alergiasPareja.distinct"),

        ];
    }

}
