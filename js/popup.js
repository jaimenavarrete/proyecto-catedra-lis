/// Evita que se reenvie la informacion del formulario
// if (window.history.replaceState) { // verificamos disponibilidad
//     window.history.replaceState(null, null, window.location.href);
// }

// Funcion para el boton de quitar alumno del grupo
$('.btn-popup-quitar-grupo').click(function(e) {
    e.preventDefault();
    var usuarioAlumno = $(this).attr('user');
    $('#overlay-quitar-alumno-grupo').addClass('overlay-active');
});

function cerrarModal() {
    $('#overlay-quitar-alumno-grupo').removeClass('overlay-active');
}