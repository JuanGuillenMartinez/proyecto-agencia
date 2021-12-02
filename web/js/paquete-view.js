function agregarCarrito(idPaquete) {
    $.post(
        "/reservacion/agregar",
        {
            idPaquete: idPaquete
        },
        function (data) {
            alert(data);
        }
    );
}
function eliminarPaqueteCarrito(idPaqueteReservacion) {
    $.post(
        "/reservacion/eliminar",
        {
            idPaqueteReservacion: idPaqueteReservacion
        },
        function (data) {
            $("#div-carrito").html(data);
        }
    );
}