$(document).ready(function () {
    $(".input-increment").click(function () {
        desactivarPago();
        numberInput = $(this).parent().find(".input-number");
        cantidad = parseInt(numberInput.val());
        numberInput.attr("value", ++cantidad);
        calcularInformacionCarrito();
        // numberInput.val(++cantidad);
    });
    $(".input-decrement").click(function () {
        desactivarPago();
        numberInput = $(this).parent().find(".input-number");
        cantidad = parseInt(numberInput.val());
        if (cantidad != 1) {
            numberInput.val(--cantidad);
            calcularInformacionCarrito();
        }
    });
});

function desactivarPago() {
    $("#btn-pagar-reservacion").attr("disabled", true);
}

// (function () {
//     window.inputNumber = function (el) {
//         var min = el.attr("min") || false;
//         var max = el.attr("max") || false;

//         var els = {};

//         els.dec = el.prev();
//         els.inc = el.next();

//         el.each(function () {
//             init($(this));
//         });

//         function init(el) {
//             els.dec.on("click", decrement);
//             els.inc.on("click", increment);

//             function decrement() {
//                 var value = el[0].value;
//                 value--;
//                 if (!min || value >= min) {
//                     el[0].value = value;
//                 }
//             }

//             function increment() {
//                 var value = el[0].value;
//                 value++;
//                 if (!max || value <= max) {
//                     el[0].value = value++;
//                 }
//             }
//         }
//     };
// })();

// inputNumber($(".input-number"));
