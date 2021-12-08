$(document).ready(function () {
    clase = ".lbl-descripcion";
    limite = 50;
    limitarCaracteres(clase, limite);
});

function limitarCaracteres(clase, cantidad) {
    $(clase).each(function (index) {
        textoLimitar = $(this).text();
        var str = textoLimitar;
        var res = str.substring(0, cantidad);
        var final = res + "...";
        $(this).text(final);
        console.log(final);
    });
}
