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

$iduser= $usuario;

$consulta="SELECT Usuario_estudiante,Pass,Nombres_estudiante,Apellidos_estudiante,
Edad,Correo,Telefono FROM estudiante WHERE Usuario_estudiante='$iduser'";
$resultado=$con->query($consulta);
$row=$resultado->fetch_assoc();

$consulta1="SELECT Usuario_estudiante, Nombre_grupo, Codigo_materia, Nombre_materia  FROM grupo INNER JOIN inscripcion 
USING (Codigo_grupo) INNER JOIN materia USING (Codigo_materia) WHERE Usuario_estudiante='$iduser'";
$resultado1=mysqli_query($con,$consulta1);
require 'views/perfil_estudiante.view.php';


?>