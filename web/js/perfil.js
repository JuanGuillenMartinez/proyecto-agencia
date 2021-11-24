function actualizarUsuario(id) {
    correo=$("#correo").val();
    telefono=$("#telefono").val();
    direccion=$("#direccion").val();
    fecha=$("#nacimiento").val();
    console.log(id);
    $.post(
        "/persona/actualizar",
        {
            id : id,
            per_correo : correo,
            per_telefono : telefono,
            per_direccion : direccion,
            per_nacimiento : fecha,

        },
        function (data) {
            alert(data);
            window.location.reload();
        }
    );
}