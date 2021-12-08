$(document).ready(function () {
    obtenerCantidadCarrito();
});

function obtenerCantidadCarrito() {
    $.get("/reservacion/cantidad", function (data) {
        $("#label-cantidad-carrito").text(data);
    });
}

// $("#label-cantidad-carrito").click(function() {
//     alert("Hola");
// });
