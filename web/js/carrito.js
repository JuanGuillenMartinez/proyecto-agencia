let formatter = new Intl.NumberFormat("en-US", {
    style: "currency",
    currency: "USD",
});

$(document).ready(function () {
    calcularInformacionCarrito();
    limitarCaracteres(".product-name", 72);
});

function limitarCaracteres(clase, cantidad) {
    $(clase).each(function (index) {
        textoLimitar = $(this).text();
        console.log(textoLimitar.length)
        if (textoLimitar.length > cantidad) {
            var str = textoLimitar;
            var res = str.substring(0, cantidad);
            var final = res + "...";
            $(this).text(final);
        }
    });
}

function validarReservacion(estatus = 4, idReservacion) {
    $.post(
        "/reservacion/pagado",
        {
            estatus: estatus,
            idReservacion: idReservacion,
        },
        function (data) {
            alertify.message(data);
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
            alertify.message("Producto eliminado correctamente");
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
            obtenerCantidadCarrito();
            alertify.message(data);
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
            $("#btn-pagar-reservacion").attr("disabled", false);
            calcularInformacionCarrito();
            alertify.message(data);
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
    actualizarInformacionIcon(numeroPaquetes);
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

function actualizarInformacionIcon(cantidad) {
    $("#label-cantidad-carrito").text(cantidad);
}
