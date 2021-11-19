function agregarCarrito(cantidad = 1, idPaquete) {
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
            alert(data);
            window.location.reload();
        }
    );
}