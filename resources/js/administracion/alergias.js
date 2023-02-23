$(function() {

    $(".alergiaSeleccionada").on("click",(event) => {

        console.log($(event.target).parent());

        $("#alergiaSeleccionadaInput").val(event.target.value);

        // $(event.target).parent().trigger("submit");

        $("#filtros").trigger("submit");

        // var url = window.location.href;    
        
        // url += "?alergiaSeleccionada = " + $(this).attr("value");

        // window.location.href = url;

    });

});