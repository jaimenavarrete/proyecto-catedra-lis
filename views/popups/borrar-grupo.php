<!-- Ventana de borrar grupo de proyecto -->
<div class="overlay" id="overlay-borrar-grupo">
    <div class="popup">
        <a href="#" class="btn-cerrar-popup" id="btn-cerrar-popup" onclick="cerrarModal();"><i class="fa fa-times"></i></a>
        <h2>Borrar grupo de proyecto</h2>
        <p>¿Está seguro que desea borrar el grupo de proyecto actual?</p>
        <form action="" method="post" name="form_borrar_grupo" id="form_borrar_grupo" onsubmit="event.preventDefault(); borrarGrupo(); mostrarAlumnosGrupo(); cerrarModal();">
            <div class="contenedor-btn-popup">
                <input type="hidden" name="grupo_a_borrar" id="grupo_a_borrar" required>
                <input type="hidden" name="action" value="borrarGrupo" required>
                <button type="submit" class="btn">Borrar grupo</button>
                <a href="#" class="btn" onclick="cerrarModal();">Cancelar</a>
            </div>
        </form>
    </div>
</div>