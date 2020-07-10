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

/* Consulta para mostrar grupos de lab */


$registrar_materia="INSERT inscrpcion Usuario_estudiante='$iduser',Codigo_grupo='grupo', Usuario_empleado=''";

require 'views/inscripcion_materias_estudiante.view.php';

?>