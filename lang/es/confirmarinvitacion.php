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

    'tituloFormulario' => 'Confirma tu invitación',
    'titulo' => 'Confirmar invitación',
    'confirmarDatos' => 'Confirmar datos',
    'pareja' => '¿Quien es tu pareja?',
    // 'transporte' => '¿Requieres transporte de Bilbao a Galdakao?',
    'transporte' => 'Estamos valorando la opción de poner un autobús con salida desde Bilbao
    ¿Necesitas transporte?',
    // 'tieneAlergia' => '¿Tienes algun tipo de alergia, enfermedad... a considerar?',

    // 'tieneAlergia' => '¿Alergias o intolerancias? Si tienes alergia a algún alimento dínoslo por favor, 
    // no queremos que te conviertas en pez globo el día de la boda (ni ningún otro 
    // día). También puedes hacernos saber si eres vegetarian@, vegan@, reptilian@, 
    // etc, para preparar un menú a tu medida.',
    'tieneAlergia' => '¿Alergias o intolerancias?',
    

    'tienePareja' => '¿Tienes pareja?',
    'misDatos' => 'Mis datos',
    'datosPareja' => 'Datos de mi pareja',
    'otraPareja' => 'Agregar otra pareja',
    // 'otraAlergia' => 'Agregar otra alergia y/o enfermedad',
    'otraAlergia' => 'Agregar otra alergia y/o intolerancia',
    // 'indicaAlergias' => 'Indica tus alergias y/o enfermedades',
    // 'indicaAlergias' => 'Indica tus alergias y/o intolerancias',
    'indicaAlergias' => 'Indica tus alergias y/o intolerancias. También puedes hacernos saber si eres vegatarian@, pescetarian@, vegan@, etc. Tendremos en cuenta tus necesidades',
    'indicaAlergiasPareja' => 'Indica las alergias y/o intolerancias de tu pareja. 
    También puedes hacernos saber si tu pareja es vegatarian@, pescetarian@, vegan@, etc. 
    Tendremos en cuenta sus necesidades',
    'seleccionarOpcion' => 'Selecciona una opción...',
    'nombrePareja' => 'Nombre de tu pareja',
    'apellidoPareja' => 'Apellido de tu pareja',
    'correoPareja' => 'Correo electrónico de tu pareja',
    // 'transportePareja' => 'Tu pareja requiere transporte de Bilbao a Galdakao?',
    'transportePareja' => 'Estamos valorando la opción de poner un autobús con salida desde Bilbao
    ¿Tu pareja necesita transporte?',
    'anadirAlergia' => 'Añadir alergia',
    'eliminarAlergia' => 'Eliminar alergia',
    'confirmado' => '¿Asistirás a la boda?',
    'recordatorio' => 'En caso de tener pareja, no olvides rellenar sus datos',
    // 'rellenarPareja' => 'Rellenar ',
    'opcionesTransporte' => [

        'no' => 'No',
        'ida' => 'Solo ida',
        'vuelta' => 'Solo vuelta',
        'ambos' => 'Ida y vuelta' 

    ],
    'error' => [
        'nombre' => [
            'required' => 'Debes introducir tu :nombre en el formulario',
            'alpha' => 'Tu :nombre solo debe estar formado por letras'
        ],
        'confirmado' => [
            'required' => 'Debes indicar si vas a asistir a la boda o no',
            'enum'  => 'Debes seleccionar uno de los valores existentes en la lista de la asistencia a la boda'
        ],
        'transporte' => [
            'required' => 'Debes indicar si requieres de un medio de transporte',
            'enum' => 'Debes seleccionar uno de los valores existentes en la lista de transporte'
        ],
        'tieneAlergia' => [
            'required' => 'Debes indicar si tienes algun tipo de alergia/intolerancia...',
            'enum' => 'Debes seleccionar uno de los valores existentes en la lista que indica si tienes una alergia o no'
        ],
        'alergias' => [
            'distinct' => 'Tus alergias/intolerancias seleccionadas deben ser distintas',
            'array' => 'Tus alergias/intolerancias deben ser recogidas mediante una lista'
        ],
        'tienePareja' => [
            'required' => 'Debes indicar si tienes pareja o no',
            'enum' => 'Debes seleccionar unode los valores existentes en la lista a la hora de indicar si tienes pareja'
        ],
        'pareja' => [
            'required' => 'Debes indicar quien es tu pareja'
        ],
        'nombrePareja' => [
            'required' => 'Debes introducir el :nombre  de tu pareja en el formulario',
            'alpha' => 'El :nombre de tu pareja solo debe estar formado por letras'
        ],
        'correoPareja' => [
            'required' => 'Debes introducir el correo electrónico de tu pareja en el formulario',
            'regex' => 'El formato del correo de tu pareja es incorrecto'
        ],
        'transportePareja' => [
            'required' => 'Debes indicar si tu pareja requiere de un medio de transporte',
            'enum' => 'Debes seleccionar uno de los valores existentes en la lista de transporte de tu pareja'
        ],
        'tieneAlergiaPareja' => [
            'required' => 'Debes indicar si tu pareja tiene algun tipo de alergia/intolerancia...',
            'enum' => 'Debes seleccionar uno de los valores existentes en la lista que indica si tu pareja tiene una alergia o no'
        ],
        'alergiasPareja' => [
            'distinct' => 'Las alergias/intolerancias de tu pareja que hayan sido seleccionadas deben ser distintas',
            'array' => 'Las alergias/intolerancias de tu pareja deben ser recogidas mediante una lista'
        ]
        
    ]
];
