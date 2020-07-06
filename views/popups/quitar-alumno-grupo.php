<!-- Ventana de quitar alumno del grupo de proyecto -->
<?php if(isset($_POST['quitar-alumno'])) : ?>
    <div class="overlay overlay-active" id="overlay-quitar-alumno-grupo">
<?php else : ?>
    <div class="overlay" id="overlay-quitar-alumno-grupo">
<?php endif ?>
    <div class="popup">
        <a href="#" class="btn-cerrar-popup" id="btn-cerrar-popup"><i class="fa fa-times"></i></a>
        <h2>Quitar del grupo</h2>
        <p>¿Está seguro que desea quitar al alumno <?php echo $_POST['carnet']; ?>, del grupo de proyecto?</p>
        <form action="">
            <div class="contenedor-btn-popup">
                <input type="submit" id="quitar-alumno-grupo">
                <label for="quitar-alumno-grupo" class="btn">Quitar alumno</label>
                <a href="#" class="btn btn-cerrar-popup">Cancelar</a>
            </div>
        </form>
    </div>
</div>