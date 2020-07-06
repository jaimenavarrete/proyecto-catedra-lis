/// Evita que se reenvie la informacion del formulario
if (window.history.replaceState) { // verificamos disponibilidad
    window.history.replaceState(null, null, window.location.href);
}

// Creamos las variables que se utilizaran en los popups
var overlayQuitarAlumnoGrupo = document.getElementById('overlay-quitar-alumno-grupo'),
    overlayModificarAlumnoGrupo = document.getElementById('overlay-modificar-alumno-grupo'),
    btnCerrarPopup = document.getElementsByClassName("btn-cerrar-popup");

// Va recorriendo cada elemento que tenga la clase y le da la funcion de cerrar el popup
for(var i=0; i<btnCerrarPopup.length; i++) {
    btnCerrarPopup[i].addEventListener('click', function(){
        overlayQuitarAlumnoGrupo.classList.remove('overlay-active');
        overlayModificarAlumnoGrupo.classList.remove('overlay-active');
    });
}