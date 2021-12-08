let formatter = new Intl.NumberFormat("en-US", {
    style: "currency",
    currency: "USD",
});

$(document).ready(function () {
    calcularInformacionCarrito();
});

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
            calcularInformacionCarrito();
        }
    );
}

function agregarCarrito(idPaquete, cantidad = 1) {
    $.post(
        "/reservacion/agregar",
        {
            idPaquete: idPaquete,
            cantidad: cantidad,
        },
        function (data) {
            alert(data);
        }
    );
}

function actualizarCarrito(idPaqueteReservacion) {
    let cantidad = obtenerNuevaCantidad(idPaqueteReservacion);
    $.post(
        "/reservacion/actualizar",
        {
            idPaqueteReservacion: idPaqueteReservacion,
            cantidad: cantidad,
        },
        function (data) {
            alert(data);
        }
    );
}

function obtenerNuevaCantidad(idPaqueteReservacion) {
    return $("#inumber-cantidad" + idPaqueteReservacion).val();
}

function calcularInformacionCarrito() {
    let numeroPaquetes = 0;
    let precioFinal = 0;
    let ahorroTotal = 0;
    $(".product").each(function (index) {
        cantidad = parseInt($(this).find(".input-number").val());
        precio = Number($(this).find("#precioPaquete").text());
        precioSinDescuento = Number($(this).find("#precioSinDescuento").text());
        precioGrupo = precio * cantidad;
        precioGrupoSinDescuento = precioSinDescuento * cantidad;
        ahorro = precioGrupoSinDescuento - precioGrupo;

        numeroPaquetes += cantidad;
        precioFinal += precioGrupo;
        ahorroTotal += ahorro;
    });
    actualizarInformacionCarrito(numeroPaquetes, precioFinal, ahorroTotal);
}

function actualizarInformacionCarrito(
    numeroPaquetes,
    precioFinal,
    ahorroTotal
) {
    $("#span-precio-final").text(formatter.format(precioFinal));
    $("#span-numero-paquetes").text(numeroPaquetes);
    $("#span-ahorro").text(formatter.format(ahorroTotal));
}
