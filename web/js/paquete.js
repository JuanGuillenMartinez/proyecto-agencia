let vuelo = 0;
let alo = 0;
let seg = 0;
let tras = 0;

$("#paquete-paq_fkvuelo").on("change", function (e) {
    iniciarVariables();
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
});
$("#paquete-paq_fkalojamiento").on("change", function (e) {
    iniciarVariables();
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
});
$("#paquete-paq_fkseguro").on("change", function (e) {
    iniciarVariables();
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
});
$("#paquete-paq_fktraslado").on("change", function (e) {
    iniciarVariables();
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
});
function iniciarVariables() {
    vuelo = $("#paquete-paq_fkvuelo").val();
    alo = $("#paquete-paq_fkalojamiento").val();
    seg = $("#paquete-paq_fkseguro").val();
    tras = $("#paquete-paq_fktraslado").val();
}
