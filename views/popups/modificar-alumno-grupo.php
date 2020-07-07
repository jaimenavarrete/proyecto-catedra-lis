<!-- Ventana de modificar al alumno del grupo de proyecto -->
<div class="overlay" id="overlay-modificar-alumno-grupo">
        <div class="popup">
            <a href="#" class="btn-cerrar-popup" id="btn-cerrar-popup" onclick="cerrarModal();"><i class="fa fa-times"></i></a>
            <h2>Modificar grupo del alumno</h2>
            <p>¿Está seguro que desea cambiar al alumno, del grupo de proyecto?</p>
            <form action="" method="post" name="form-quitar-alumno-grupo" id="form-quitar-alumno-grupo" onsubmit="event.preventDefault(); sendQuitarAlumno();">
                <div class="contenedor-btn-popup">
                    <input type="hidden" name="alumno-a-quitar" id="alumno-a-quitar" required>
                    <input type="hidden" name="grupo-a-quitar" id="grupo-a-quitar" required>
                    <input type="hidden" name="action" value="quitarAlumno" required>
                    <!-- <input type="submit" id="quitar-alumno-grupo">
                    <label for="quitar-alumno-grupo" class="btn">Quitar alumno</label> -->
                    <button type="submit" class="btn">Quitar alumno</button>
                    <a href="#" class="btn" onclick="cerrarModal();">Cancelar</a>
                </div>
            </form>
        </div>
</div>