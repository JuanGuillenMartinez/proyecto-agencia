function agregarCarrito(idPaquete) {
    $.post(
        "/reservacion/agregarCarrito",
        {
            idPaquete: idPaquete
        },
        function (data) {
            $("#paquete-paq_subtotal").val(data);
        }
    );
    alert("Hola" + id);
}