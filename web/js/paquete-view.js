function mostrarCarrito(idPersona) {
    $.post(
        "/reservacion/obtenerReservacion",
        {
            idPersona: idPersona
        },
        function (data) {
            alert(data);
        }
    );
}

function agregarCarrito(id) {
    $.post(
        "/paquete/subtotal",
        {
            vuelo: vuelo,
            alo: alo,
            seg: seg,
            tras: tras,
        },
        function (data) {
            $("#paquete-paq_subtotal").val(data);
        }
    );
    alert("Hola" + id);
}