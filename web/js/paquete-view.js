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