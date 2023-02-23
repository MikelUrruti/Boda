$(function() {


    var imagenFondo = $("#imagenFondo");

    var containerTexto = $("#containerTexto");

    var containerOpciones = $("#containerOpciones");

    var contador = 0;
    
    var texto = $("#texto");

    // var textosDisponibles = [
    //     "Qué ganas tenemos de que vengas! 😊",
    //     "No obstante, Necesitamos que introduzcas tus datos antes de que vengas a la boda",
    //     "También podrás consultar la información relevante acerca de la misma"
    // ];

    var textosDisponibles = translations.menuprincipal.textosBienvenida;

    containerOpciones.hide();

    texto.hide();

    texto.text(textosDisponibles[contador]);

    if (!afterLogin) {
        containerTexto.hide();
        imagenFondo.css("background-image","url('imagenes/fondoMenuPrincipal.jpeg')");
        imagenFondo.fadeIn(1500);
        containerOpciones.show();
        return;
    }

    var modificarTextoAnimado = window.setInterval(() => {

        texto.fadeIn(1500).delay(1500).fadeOut(1500, function () {

            if (contador == textosDisponibles.length-1) {

                texto.stop(true,true);

                clearInterval(modificarTextoAnimado);

                imagenFondo.hide();

                imagenFondo.css("background-image","url('imagenes/fondoMenuPrincipal.jpeg')");

                imagenFondo.fadeIn(1500);

                containerTexto.hide();

                containerOpciones.fadeIn(2000);

            } else {

                contador++;
                
            }
            
            texto.text(textosDisponibles[contador]);

        });

    }, 30);


});