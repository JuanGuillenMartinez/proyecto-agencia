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
function modal(id) {
    $.get("/paquete/modal",{ id: id })
    .done(function (d) {
        bootbox.dialog({
            title: "modal",
            size: "md",
            message: d,
        });
    }).fail(function (f){
        console.log(f.responseText);
    });
}
