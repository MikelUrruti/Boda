$(function() {

    // $("#parejaRow").hide();

    $("#botonEnviar").on(
        "click",
        () => {

            if ($("#tienePareja").attr("disabled")) {
                $("#tienePareja").removeAttr("disabled");
                $("#parejaSelect").removeAttr("disabled");
            }

            $(".alergiaSelect, .alergiaSelectPareja").each(function() {

                // console.log($(this).val())

                if ($(this).val() === "Otro") {
                    $(this).remove();
                }

            });

            $(".cajaOtro").each(function() {

                // console.log($(this).val())

                if (!$(this).val()) {
                    $(this).remove();
                }

            });

            console.log($("#confirmarinvitacionForm").serializeArray());

            $("#confirmarinvitacionForm").trigger("submit");

        }
    )

    $("#datosParejaBtn, #datosParejaBtnRecordado").on(
        "click",
        function(event) {

            event.preventDefault();

            $("#misDatos").addClass("d-none");
            $("#datosParejaTab").removeClass("d-none");

            cambiarTab($("#datosParejaBtn"),$("#misDatosBtn"));

        }
    )

    $("#misDatosBtn").on(
        "click",
        () => {
            $("#misDatos").removeClass("d-none");
            $("#datosParejaTab").addClass("d-none");

            cambiarTab($("#misDatosBtn"),$("#datosParejaBtn"));

        }
    )

    $("#parejaSelect").on(
        "click",
        function (event) {

            if ($(this).val() === "") {
                $("#datosPareja").addClass("d-none");
                return;
            }

            // $("#datosOtro").removeClass("d-none");
            $("#datosPareja").removeClass("d-none");

            var deshabilitar = true;

            if ($(this).val() === "Otro") {
                deshabilitar = false;
                $("#correoParejaRow").removeClass("d-none");
                $("#transporteParejaRow").removeClass("d-none");
                $("#tieneAlergiaParejaRow").removeClass("d-none");
                // $("#alergiaRowPareja").removeClass("d-none");
                $("#datosPareja input[name='nombrePareja']").val("")
                $("#datosPareja input[name='apellidoPareja']").val("");
                console.log($("option:selected",this))
            } else {
                $("#correoParejaRow").addClass("d-none");
                $("#transporteParejaRow").addClass("d-none");
                $("#tieneAlergiaParejaRow").addClass("d-none");
                $("#alergiaRowPareja").addClass("d-none");
                $("#datosPareja input[name='nombrePareja']").val($("#parejaSelect option:selected").attr("nombre"));
                $("#datosPareja input[name='apellidoPareja']").val($("#parejaSelect option:selected").attr("apellido"));

            }

            $("#datosPareja input").prop("disabled",deshabilitar)
            // $("#datosPareja select").prop("disabled",deshabilitar)


            // $("#datosPareja").addClass("d-none");
        }
    )

    $("#tienePareja").on(
        "change",
        () => { 
            if ($("#tienePareja").val() === "Si") {
                $("#parejaRow").removeClass("d-none");
                // $("#datosPareja").removeClass("d-none");
            } else {
                $("#parejaRow").addClass("d-none");
                $("#datosPareja").addClass("d-none");
            }
        }
    );

    $("#tieneAlergia").on(
        "change",
        () => { 
            $("#tieneAlergia").val() === "Si" ? $("#alergiaRow").removeClass("d-none") : $("#alergiaRow").addClass("d-none") 
        }
    );

    $("#tieneAlergiaPareja").on(
        "change",
        () => { 
            $("#tieneAlergiaPareja").val() === "Si" ? $("#alergiaRowPareja").removeClass("d-none") : $("#alergiaRowPareja").addClass("d-none") 
        }
    );

    $("#anadirAlergiaBtn").on(
        "click",
        function (event) { 
            // $("#rowAlergia").clone();
            event.preventDefault();

            var filaClonada =$("#rowAlergia").clone(true, true);

            filaClonada.removeAttr("id");

            console.log(filaClonada.find("select"))

            filaClonada.find("select").attr("name","alergias[]");
            filaClonada.find("input").attr("name","otros[]");

            filaClonada.removeClass("d-none").prependTo("#rowAlergias");
        }
    )

    $("#anadirAlergiaBtnPareja").on(
        "click",
        function (event) { 
            // $("#rowAlergia").clone();
            event.preventDefault();

            var filaClonada =$("#rowAlergiaPareja").clone(true, true);

            filaClonada.removeAttr("id");

            console.log(filaClonada.find("select"))

            filaClonada.find("select").attr("name","alergiasPareja[]");
            filaClonada.find("input").attr("name","otrosPareja[]");

            filaClonada.removeClass("d-none").prependTo("#rowAlergiasPareja");
        }
    )

    $(".eliminarAlergiaBtn").on(
        "click",
        function (event) { 
            // $("#rowAlergia").clone();
            event.preventDefault();
            $(this).parent().remove();
        }
    )

    $(".alergiaSelect").on(
        "change",
        function (event) { 
            // $("#rowAlergia").clone();
            event.preventDefault();
            console.log("prueba")
            if ($(this).val() === "Otro") {
                $(this).parent().children("input[name='otros[]']").removeClass("d-none");
            } else {
                $(this).parent().children("input[name='otros[]']").addClass("d-none");
            }

        }
    )

    $(".alergiaSelectPareja").on(
        "change",
        function (event) { 
            // $("#rowAlergia").clone();
            event.preventDefault();
            console.log("prueba")
            if ($(this).val() === "Otro") {
                $(this).parent().children("input[name='otrosPareja[]']").removeClass("d-none");
            } else {
                $(this).parent().children("input[name='otrosPareja[]']").addClass("d-none");
            }

        }
    )

    $("#confirmado").on(
        "change",
        function () { 
            if ($("#confirmado").val() === "Si") {
                $("#datosConfirmado").removeClass("d-none");
            } else {
                $("#datosConfirmado").addClass("d-none");
            }
        }
    )

});

function cambiarTab(tabpulsado,tabquitar) {
    tabpulsado.removeClass("text-light")
    tabpulsado.removeClass("bg-dark")
    tabquitar.removeClass("text-dark")
    tabquitar.removeClass("bg-light")
    tabquitar.addClass("text-light")
    tabquitar.addClass("bg-dark")
    
    tabpulsado.addClass("text-dark")
    tabpulsado.addClass("bg-light")
}