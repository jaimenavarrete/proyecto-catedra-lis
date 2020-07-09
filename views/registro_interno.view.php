<?php include("consultas/consultas.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Interno</title>
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
                <li><a href="reportes.php">Reportes <i class="fa fa-book icon"></i></a></li>
                <li><a href="gestion.php">Gestión <i class="fa fa-cog icon"></i></a></li>
                <li class="cerrar-m" ><a href="login.php">Cerrar Sesión <i class="fa fa-sign-out icon"></i> </a></li>
                </div>
        </ul>
    </nav>
</div>
</header>
<section class="contenido">
    <article>
        <h1>REGISTRO INTERNO</h1>
        <div class="formtab">
            <h2>Datos de registro</h2>

            <form action="consultas/datos.php" class="form-horizontal"  name="formulario" method="POST">
                <div class="input-container">
                    <i class="fa fa-user-circle-o icon icon-login-registro"></i>
                    <input class="input-field" type="text" name="Usuario" placeholder="Usuario:" required>
                </div>
                <div class="input-container">
                    <i class="fa fa-address-card icon icon-login-registro"></i>
                    <input class="input-field" type="text" name="Nombre" placeholder="Nombre:" required>
                </div>
                <div class="input-container">
                    <i class="fa fa-address-card icon icon-login-registro"></i>
                    <input class="input-field" type="text" name="Apellido" placeholder="Apellido:" required>
                </div>
                <div class="input-container">
                    <i class="fa fa-birthday-cake icon icon-login-registro"></i>
                    <input class="input-field" type="number" name="Edad" placeholder="Edad:" min="0" max="100" required>
                </div>
                <div class="input-container">
                    <i class="fa fa-certificate icon icon-login-registro"></i>
                    <select name="Rol" class="input-field">
                    <?php while($mostrar=mysqli_fetch_array($resultado)){ 
                    ?>
                    <option value="<?php echo $mostrar['Codigo_rol'] ?>"><?php echo $mostrar['Nombre_rol'] ?></option>
                    <?php 
                    }
                    ?>
                    </select>
                </div>
                <div class="input-container">
                    <i class="fa fa-envelope icon icon-login-registro"></i>
                    <input class="input-field" type="text" name="Correo" placeholder="Email:" required>
                </div>
                <div class="input-container">
                    <i class="fa fa-phone icon icon-login-registro"></i>
                    <input class="input-field" type="text" name="Telefono" placeholder="Numero de teléfono:" required>
                </div>
                <div class="input-container">
                    <i class="fa fa-key icon icon-login-registro"></i>
                    <input class="input-field" type="password" name="Passwd" placeholder="Ingrese su contraseña:" required>
                </div>
                <div class="input-container">
                    <i class="fa fa-key icon icon-login-registro"></i>
                    <input class="input-field" type="password" name="PasswdRep" placeholder="Repita su contraseña:" required>
                </div>

                <button type="submit" class="btn" name="submit" value="Ingresar">Registrar</button>
            </form>
            <div>
        </div>
    </article>
    <div class="formtab">
            <h2>Empleados registrados</h2>
            <div class="bar-scroll">
            <table class="tablas">
                <thead>
                    <tr>
                        <th>Usuario</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Edad</th>
                        <th>Correo</th>
                        <th>Telefono</th>
                        <th>Rol</th>
                        <th>Activo</th>
                        <th>Hora de bloqueo</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tr>
                <?php while($mostrar=mysqli_fetch_array($resultado4)){ 
                ?>
                    <td><?php echo $mostrar['Usuario_empleado'] ?></td>
                    <td><?php echo $mostrar['Nombres_empleado'] ?></td>
                    <td><?php echo $mostrar['Apellidos_empleado'] ?></td>
                    <td><?php echo $mostrar['Edad'] ?></td>
                    <td><?php echo $mostrar['Correo'] ?></td>
                    <td><?php echo $mostrar['Telefono'] ?></td>
                    <td><?php echo $mostrar['Nombre_rol'] ?></td>
                    <td><?php echo $mostrar['Activo'] ?></td>
                    <td><?php echo $mostrar['Hora_bloqueo'] ?></td>
                    <td><a href="consultas/datos.php?id_emp=<?php echo $mostrar['Usuario_empleado'];?>"><i class="fa fa-pencil icon icon-modify"></i></a><a href="consultas/datos.php?id_empleado=<?php echo $mostrar['Usuario_empleado'];?>"><i class="fa fa-trash icon icon-delete"></i></a></td>
                </tr> 
                <?php 
                }
                ?>
            </table>
        </div>
        </div>

        <div class="formtab">
            <h2>Alumnos registrados</h2>
            <div class="bar-scroll">
            <table class="tablas">
                <thead>
                    <tr>
                        <th>Usuario</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Nombre</th>
                        <th>Edad</th>
                        <th>Correo</th>
                        <th>Rol</th>
                        <th>Activo</th>
                        <th>Hora de bloqueo</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tr>
                <?php while($mostrar=mysqli_fetch_array($resultado5)){ 
                ?>
                    <td><?php echo $mostrar['Usuario_estudiante'] ?></td>
                    <td><?php echo $mostrar['Nombres_estudiante'] ?></td>
                    <td><?php echo $mostrar['Apellidos_estudiante'] ?></td>
                    <td><?php echo $mostrar['Edad'] ?></td>
                    <td><?php echo $mostrar['Correo'] ?></td>
                    <td><?php echo $mostrar['Telefono'] ?></td>
                    <td><?php echo $mostrar['Nombre_rol'] ?></td>
                    <td><?php echo $mostrar['Activo'] ?></td>
                    <td><?php echo $mostrar['Hora_bloqueo'] ?></td>
                    <td><a href="consultas/datos.php?id_est=<?php echo $mostrar['Usuario_estudiante'];?>"><i class="fa fa-pencil icon icon-modify"></i></a><a href="consultas/datos.php?id_estudiante=<?php echo $mostrar['Usuario_estudiante'];?>"><i class="fa fa-trash icon icon-delete"></i></a></td>
                </tr> 
                <?php 
                }
                ?>
            </table>
        </div>
        </div>
</section>


<div id="creditos">
    <h5>Copyright © 2020-Universidad Don Bosco</h5>
</div>

</body>
</html>