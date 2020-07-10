<?php
include("cn.php");
session_start();

if(!isset($_SESSION['usuario']) || $_SESSION['rol'] != 2){
    header("Location:index.php");
}else{
    $usuario = $_SESSION['usuario'];
    $rol = $_SESSION['rol'];
}

if($rol == 1){
    $consulta="SELECT Usuario_estudiante,Pass,Nombres_estudiante,Apellidos_estudiante,
    Edad,Correo,Telefono FROM estudiante WHERE Usuario_estudiante='$usuario'";    
}else{
    $consulta="SELECT Usuario_empleado,Pass_empleado,Nombres_empleado,Apellidos_empleado,
    Edad,Correo,Telefono FROM empleado WHERE Usuario_empleado='$usuario'";
}

$resultado=$conexion->query($consulta);
$row=$resultado->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="css/normalize.css"/>
    <link rel="stylesheet" href="css/styles.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&family=Montserrat:wght@300;400;700&display=swap" rel="stylesheet">
</head>
<body>
<?php require_once('headers/headers.php'); ?>
<section class="contenido">
    <article>
            <h1 id="fuente">PERFIL PERSONAL</h1>
            <div class="formtab seccion-perfil">
                <form action="modificar_usuario.php">
                    <div>
                        <img class="circular--squaremax" src="img/user.png" />
                    </div>

                    <div class="btn-modificar-perfil">
                        <input type="submit" id="btn-repo">
                        <label for="btn-repo" class="btn">Modificar perfil<i class="fa fa-pencil icon" style="font-size:24px"></i></label>
                    </div>
                </form>
            </div>
            <div class="formtab">
                <h2>Datos personales</h2>
                <table class="tabla-datos-perfil">
                    <?php
                        require_once('queries/llenar_grupos.php');
                    ?>
                </table>
            </div>
            
    </article>
</section>

<div id="creditos">
    <h5>Copyright © 2020-Universidad Don Bosco</h5>
</div>
</body>
</html>