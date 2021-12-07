function validarReservacion(estatus = 4, idReservacion) {
    $.post(
        "/reservacion/pagado",
        {
            estatus: estatus,
            idReservacion: idReservacion,
        },
        function (data) {
            alert(data);
            window.location.reload();
        }
    );
}

function eliminarPaqueteCarrito(idPaqueteReservacion) {
    $.post(
        "/reservacion/eliminar",
        {
            idPaqueteReservacion: idPaqueteReservacion,
        },
        function (data) {
            $("#div-carrito").html(data);
        }
    );
}

function agregarCarrito(idPaquete, cantidad = 1) {
    $.post(
        "/reservacion/agregar",
        {
            idPaquete: idPaquete,
            cantidad: cantidad
        },
        function (data) {
            alert(data);
        }
    );
}

function actualizarCarrito(idPaqueteReservacion) {
    let cantidad = obtenerNuevaCantidad(idPaqueteReservacion);
    console.log(cantidad);
    $.post(
        "/reservacion/actualizar",
        {
            idPaqueteReservacion: idPaqueteReservacion,
            cantidad: cantidad
        },
        function (data) {
            alert(data);
        }
    );
}

function obtenerNuevaCantidad(idPaqueteReservacion) {
    return $("#inumber-cantidad"+idPaqueteReservacion).val();
}