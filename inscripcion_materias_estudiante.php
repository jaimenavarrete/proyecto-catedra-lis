<?php
include("database/conn.php");
session_start();
if(!isset($_SESSION['usuario']) || $_SESSION['rol'] != 1){
    header("Location:index.php");
}else{
    $usuario = $_SESSION['usuario'];
    $rol = $_SESSION['rol'];
    echo $rol;
}

/* El usuario del alumno */

$iduser=$usuario;

if(isset($_POST['submit']) && $_POST['grupo'] != '#' && $_POST['materia'] != '#') {
    $materia = $_POST['materia'];
    $grupo = $_POST['grupo'];

    /*Consulta para obtener el codigo de grupo que se va a inscribir*/
    $consulta1 = "SELECT Codigo_grupo FROM grupo WHERE Codigo_materia='$materia' AND Nombre_grupo='$grupo'";
    $resultado1 = mysqli_query($con, $consulta1);
    $row = mysqli_fetch_array($resultado1);

    $codigoGrupo = $row['Codigo_grupo'];

    echo '<br><br><br>' . $codigoGrupo;

    $registrar_materia="INSERT INTO inscripcion (Codigo_inscripcion, Usuario_estudiante, Codigo_grupo, Usuario_empleado) VALUES (NULL, '$iduser', '$codigoGrupo', NULL); ";
    $resultado2 = mysqli_query($con,$registrar_materia);
}
else {
    echo "Debe rellenar los campos necesarios";
}


require 'views/inscripcion_materias_estudiante.view.php';

?>