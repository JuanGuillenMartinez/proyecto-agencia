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
