<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during authentication for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */

    'registrar' => 'Registrar usuario',
    'titulo' => 'Agregar usuarios',
    'tituloFormulario' => 'Datos del usuario',
    'correo' => 'Correo electrónico',
    'tipo' => 'Tipo de usuario',
    'nombre' => 'Nombre',
    'apellido' => 'Apellido',
    'volver' => 'Volver atrás',
    'error' => [
        "required" => "El :parametro es obligatorio",
        "correo" => [
            "email" => "El correo electrónico no está bien formado (ejemplo: test@gmail.com)",
            "unique" => "Este correo electrónico está siendo utilizado por otro usuario"
        ],
        "nombre" => [
            "alpha" => "El :parametro solo debe estar formado por letras"
        ],
    ],
    'exito' => 'Usuario registrado con exito'

];
