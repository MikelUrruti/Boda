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

    'registrar' => 'Agregar',
    'seleccionarOpcion' => 'Selecciona una opción...',
    'titulo' => 'Agregar usuario a alergia',
    'tituloFormulario' => 'Agregar usuario a alergia',
    'nombre' => 'Usuario',
    'alergia' => 'Alergia',
    'volver' => 'Volver atrás',
    'error' => [
        "usuario" => [
            "required" => "Debes indicar el usuario a agregar a la alergia"
        ],
        "alergia" => [
            "required" => "Debes indicar la alergia",
        ],
        "unique" => "El usuario indicado ya ha sido agregado previamente a la alergia"
    ],
    'exito' => 'Usuario agregado a alergia con exito'

];
