<?php
include("database/conn.php");
session_start();
if(!isset($_SESSION['usuario']) || $_SESSION['rol'] != 3){
    header("Location:index.php");
}else{
    $usuario = $_SESSION['usuario'];
    $rol = $_SESSION['rol'];
    echo $rol;
}
if($rol == 1){
    $consulta="SELECT Usuario_estudiante,Pass,Nombres_estudiante,Apellidos_estudiante,
    Edad,Correo,Telefono FROM estudiante WHERE Usuario_estudiante='$usuario'";    
}else{
    $consulta="SELECT Usuario_empleado,Pass_empleado,Nombres_empleado,Apellidos_empleado,
    Edad,Correo,Telefono FROM empleado WHERE Usuario_empleado='$usuario'";
}

$resultado=$con->query($consulta);
$row=$resultado->fetch_assoc();

?>
?>