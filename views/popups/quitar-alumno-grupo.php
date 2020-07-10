<!-- Ventana de quitar alumno del grupo de proyecto -->
<div class="overlay" id="overlay-quitar-alumno-grupo">
    <div class="popup">
        <a href="#" class="btn-cerrar-popup" id="btn-cerrar-popup" onclick="cerrarModal();"><i class="fa fa-times"></i></a>
        <h2>Quitar alumno del grupo</h2>
        <p>¿Está seguro que desea quitar al alumno, del grupo de proyecto actual?</p>
        <form action="" method="post" name="form_quitar_alumno_grupo" id="form_quitar_alumno_grupo" onsubmit="event.preventDefault(); quitarAlumno(); mostrarAlumnosGrupo(); cerrarModal();">
            <div class="contenedor-btn-popup">
                <input type="hidden" name="alumno_a_quitar" id="alumno_a_quitar" required>
                <input type="hidden" name="action" value="quitarAlumno" required>
                
                <a href="#" class="btn" onclick="cerrarModal();">Cancelar</a>
            </div>
        </form>
    </div>
</div>