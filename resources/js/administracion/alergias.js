$(function() {

    $(".alergiaSeleccionada").on("click",(event) => {

        console.log($(event.target).parent());

        $("#alergiaSeleccionadaInput").val(event.target.value);

        // $(event.target).parent().trigger("submit");

        // var input = $("<input>")
        //        .attr("type", "hidden")
        //        .attr("name", "alergias").val();
        // $('#filtros').append(input);

        $("#filtros").trigger("submit");

    });
    

});