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

    'error' => [
        "usuariosSeleccionados" => [
            // "email" => "El correo electrónico no está bien formado (ejemplo: test@gmail.com)",
            "required" => "Debes indicar al menos un usuario a eliminar",
            "array" => "Debes indicar al menos un usuario a eliminar"
            // "unique" => "Este correo electrónico está siendo utilizado por otro usuario"
        ],
        "alergiaUser" => [
            "required" => "Debes indicar la alergia de la cual vas a eliminar los usuarios"
        ]
    ],
    'exito' => 'Se han eliminado los registros seleccionados con exito',
    'exitoAlergia' => 'Se ha eliminado la alergia ":alergia" con exito',
    'exitoUsuarioAlergia' => 'Se han eliminado correctamente los usuarios de la alergia ":alergia"'

];
