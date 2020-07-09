<?php
include("database/conn.php");
$iduser="CG152751";/* esta parte solo es de ejemplo se modificara despues por $_SESSION['id_usuario'] que tomara el valor de la ventana de login*/ 

$consulta=mysqli_query($con,"SELECT * FROM empleado WHERE Usuario_empleado='$iduser'");
$result=mysqli_fetch_array($consulta);
?>