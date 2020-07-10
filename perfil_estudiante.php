<?php
include("database/conn.php");
session_start();
/*
if(!isset($_SESSION['id_usuario'])){
    header("Location:index.php");
}*/

$iduser="CF176243";/* esta parte solo es de ejemplo se modificara despues por $_SESSION['id_usuario'] que tomara el valor de la ventana de login*/ 

$consulta="SELECT Usuario_estudiante,Pass,Nombres_estudiante,Apellidos_estudiante,
Edad,Correo,Telefono FROM estudiante WHERE Usuario_estudiante='$iduser'";
$resultado=$con->query($consulta);
$row=$resultado->fetch_assoc();

$consulta1="SELECT Usuario_estudiante, Nombre_grupo, Codigo_materia, Nombre_materia  FROM grupo INNER JOIN inscripcion 
USING (Codigo_grupo) INNER JOIN materia USING (Codigo_materia) WHERE Usuario_estudiante='$iduser'";
$resultado1=mysqli_query($con,$consulta1);
require 'views/perfil_estudiante.view.php';


?>