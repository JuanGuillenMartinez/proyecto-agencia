let vuelo = 0;
let alo = 0;
let seg = 0;
let tras = 0;

$("#vueloId").on("change", function (e) {
    iniciarVariables();
});
$("#alojamientoId").on("change", function (e) {
    iniciarVariables();
});
$("#paquete-paq_fkseguro").on("change", function (e) {
    iniciarVariables();
});
$("#paquete-paq_fktraslado").on("change", function (e) {
    iniciarVariables();
});
function iniciarVariables() {
    vuelo = $("#vueloId").val();
    alo = $("#alojamientoId").val();
    seg = $("#paquete-paq_fkseguro").val();
    tras = $("#paquete-paq_fktraslado").val();
    console.log(vuelo);
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
}
