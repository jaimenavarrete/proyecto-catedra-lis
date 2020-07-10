<!-- Ventana de modificar al alumno del grupo de proyecto -->
<div class="overlay" id="overlay-modificar-alumno-grupo">
    <div class="popup">
        <a href="#" class="btn-cerrar-popup" id="btn-cerrar-popup" onclick="cerrarModal();"><i class="fa fa-times"></i></a>
        <h2>Modificar grupo del alumno</h2>
        <form action="" method="post" name="form_modificar_alumno_grupo" id="form_modificar_alumno_grupo" onsubmit="event.preventDefault(); modificarAlumno(); mostrarAlumnosGrupo(); cerrarModal();">
            <select name="grupo_a_modificar" id="grupo_a_modificar">
                <?php echo mostrarGruposTabla($query3); ?>
            </select>
            
            <p>¿Está seguro que desea cambiar el grupo del alumno?</p>
            
            <div class="contenedor-btn-popup">
                <input type="hidden" name="alumno_a_modificar" id="alumno_a_modificar" required>
                <input type="hidden" name="action" value="modificarAlumno" required>

                
                <a href="#" class="btn" onclick="cerrarModal();">Cancelar</a>
            </div>
        </form>
    </div>
</div>