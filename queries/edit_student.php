<?php
// Agregar la base de datos
include ("../database/conn.php");

if($_POST['action'] == 'quitarAlumno') {
    $alumno = $_POST['alumno_a_quitar'];
    // Consultas utilizadas
    $stmt = "UPDATE estudiante SET Grupo_proyecto='0'
             WHERE Usuario_estudiante='$alumno'";
    $query = mysqli_query($con, $stmt);

    echo 'OK';
}
elseif($_POST['action'] == 'modificarAlumno') {
    $alumno = $_POST['alumno_a_modificar'];
    $grupo = $_POST['grupo_a_modificar'];

    // Consultas utilizadas
    $stmt = "UPDATE estudiante SET Grupo_proyecto='$grupo'
             WHERE Usuario_estudiante='$alumno'";
    $query = mysqli_query($con, $stmt);

    echo 'OK';
}
elseif($_POST['action'] == 'borrarGrupo') {
    $grupo = $_POST['grupo_a_borrar'];

    // Consultas utilizadas
    $stmt = "UPDATE estudiante SET Grupo_proyecto='0'
             WHERE Grupo_proyecto='$grupo'";
    $query = mysqli_query($con, $stmt);

    $stmt = "DELETE FROM grupo_proyecto
             WHERE Codigo_grupo_proyecto='$grupo'";
    $query = mysqli_query($con, $stmt);

    echo 'OK';
}

?>