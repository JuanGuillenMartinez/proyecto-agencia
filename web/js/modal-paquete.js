$("#btn-close").click(function () {
    if ($("#modal-text").hasClass("cont_modal_active")) {
        $("#modal-text").removeClass("cont_modal_active");
        // setTimeout(function () {
        //    $("#btn-close").css("top", "15%");
        // }, 700);
    } else {
        $("#modal-text").addClass("cont_modal_active");
        // setTimeout(function () {
        //     $("#btn-close").css("top", "50%");
        // }, 700);
    }
});
