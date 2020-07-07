<?php
include("cn.php");
$id_usuario=$_POST["idusuario"];

$consulta="SELECT Usuario_estudiante,Pass,Nombres_estudiante,Apellidos_estudiante,
Edad,Correo,Telefono FROM estudiante WHERE Usuario_estudiante='$id_usuario'";
$resultado=$conexion->query($consulta);
$row=$resultado->fetch_assoc();

/*  Modificar campos de la tablas */

if(isset($_POST['btn_actualizar'])){
        
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="css/normalize.css"/>
    <link rel="stylesheet" href="css/styles.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&family=Montserrat:wght@300;400;700&display=swap" rel="stylesheet">
</head>
<body>
<header>
<div id="navegador">
<input type="checkbox" id="menu-bar">
<label for="menu-bar" class="fa fa-bars icon" style="font-size:36px"></label>
<a href="perfil.php"><img class="circular--squaremin" src="img/user.png" /></a>
<a href="login.php" class="cerrar">Cerrar Sesión <i class="fa fa-sign-out icon"></i> </a>
    <nav class="menu">
        <ul>
            <div class="separador-links">
                <li><a href="perfil.php">Mi perfil<i class="fa fa-user icon"></i></a></li>
                <li><a href="grupos.php">Grupos<i class="fa fa-users icon"></i></a></li>
                <li><a href="inscripcion_materias.php">Inscripción <i class="fa fa-pencil-square-o icon"></i></a></li>
                <li><a href="reportes.php">Reportes <i class="fa fa-book icon"></i></a></li>
                <li class="cerrar-m" ><a href="login.php">Cerrar Sesión <i class="fa fa-sign-out icon"></i> </a></li>
                </div>
        </ul>
    </nav>
</div>
</header>
<section class="contenido">
    <article>
        <h1>MODIFICAR USUARIO</h1>
        <div class="formtab seccion-perfil">
                <form action="ingresar-datos.php">
                    <div>
                        <img class="circular--squaremax" src="img/user.png" />
                    </div>
                </form>
            </div>
        <div class="formtab">
            <h2>Nuevos datos del usuario</h2>

            <form action="modificar_usuario.php" class="form-horizontal" name="formulario" id="salario" method="post">
                    <input class="input-field" type="hidden" id="usuario" name="usuario" placeholder="Usuario:" value="<?php echo utf8_decode($row['Usuario_estudiante']); ?>" >
                
                <div class="input-container">
                    <i class="fa fa-address-card icon icon-login-registro"></i>
                    <input class="input-field" type="text" id="nombre" name="nombre" placeholder="Nombre:" value="<?php echo utf8_decode($row['Nombres_estudiante']); ?>" required readonly>
                </div>
                <div class="input-container">
                    <i class="fa fa-address-card icon icon-login-registro"></i>
                    <input class="input-field" type="text" id="apellido" name="apellido" placeholder="Apellido:" value="<?php echo utf8_decode($row['Apellidos_estudiante']); ?>"  required readonly>
                </div>
                <div class="input-container">
                    <i class="fa fa-birthday-cake icon icon-login-registro"></i>
                    <input class="input-field" type="text" id="cumple" name="cumple" placeholder="Edad" value="<?php echo utf8_decode($row['Edad']); ?>" required>
                </div>
                <div class="input-container">
                    <i class="fa fa-envelope icon icon-login-registro"></i>
                    <input class="input-field" type="text"id="email" name="email" placeholder="Email:" value="<?php echo utf8_decode($row['Correo']); ?>" required>
                </div>
                <div class="input-container">
                    <i class="fa fa-phone icon icon-login-registro"></i>
                    <input class="input-field" type="text" id="telefono" name="telefono" placeholder="Numero de teléfono:" value="<?php echo utf8_decode($row['Telefono']); ?>" required>
                </div>
                <div class="input-container">
                    <i class="fa fa-key icon icon-login-registro"></i>
                    <input class="input-field" type="password" id="password" name="password" placeholder="Ingrese su contraseña:"  >
                </div>
                <div class="input-container">
                    <i class="fa fa-key icon icon-login-registro"></i>
                    <input class="input-field" type="password" id="password_rep" name="password_rep" placeholder="Repita su contraseña:" >
                </div>

                <button type="submit" class="btn" value="Ingresar" name="btn_actualizar">Actualizar datos</button>
            </form>
        </div>
    </article>
</section>

<div id="creditos">
    <h5>Copyright © 2020-Universidad Don Bosco</h5>
</div>

</body>
</html>