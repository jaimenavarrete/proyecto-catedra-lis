/// Evita que se reenvie la informacion del formulario
// if (window.history.replaceState) { // verificamos disponibilidad
//     window.history.replaceState(null, null, window.location.href);
// }

function cerrarModal() {
    $('#overlay-quitar-alumno-grupo').removeClass('overlay-active');
}