$(function() {

    var body = $("#fondoInicio");

    var contador = 0;

    var imagenesDisponibles = ["fondoInicio1.jpeg","fondoInicio2.jpeg","fondoInicio3.jpeg"];

    body.hide();

    body.css("background-image","url('imagenes/"+imagenesDisponibles[contador]+"')");

    var modificarFondoAnimado = function(tiempoFadeIn, tiempoFadeOut) {

        body.fadeIn(tiempoFadeIn, function () { console.log("fadein") }).fadeOut(tiempoFadeOut, function () { 
            
            if (contador == imagenesDisponibles.length-1) {
                contador = 0;
            } else {
                contador++;
            }

            body.css("background-image","url('imagenes/"+imagenesDisponibles[contador]+"')");
        
            console.log(contador)

        });


    }

    modificarFondoAnimado(2000,2000);

    window.setInterval(() => modificarFondoAnimado(2000,2000), 2000);

});