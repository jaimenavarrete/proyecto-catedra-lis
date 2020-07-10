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


$iduser=$usuario;

$consulta1="SELECT * FROM materia";
$resultado1=mysqli_query($con,$consulta1);

/* Consulta para mostrar grupos de teoria */

$consulta2="SELECT * FROM grupo WHERE Tipo='0'";
$resultado2=mysqli_query($con,$consulta2);



if(empty($_POST['grupo']) || empty($_POST['materias'])){
    echo "campos necesarios";
}else{
    $grupos=$_POST['grupo'];

$registrar_materia="INSERT INTO inscripcion (Codigo_inscripcion, Usuario_estudiante, Codigo_grupo, Usuario_empleado) VALUES (NULL, '$iduser', '$grupos', NULL); ";
$resultado3=mysqli_query($con,$registrar_materia);
}



require 'views/inscripcion_materias_estudiante.view.php';

?>