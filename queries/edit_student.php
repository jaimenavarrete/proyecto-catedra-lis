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

?>