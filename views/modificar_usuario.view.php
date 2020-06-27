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
<div id="navegador">
    <nav>
        <ul>
            <div class="separador-links">
                <li><a href="perfil.php" class="imagen"><img class="circular--squaremin" src="img/user.png" /></a></li>
                <li><a href="perfil.php">Mi perfil<i class="fa fa-user icon"></i></a></li>
                <li><a href="grupos.php">Grupos<i class="fa fa-users icon"></i></a></li>
                <li><a href="inscripcion_materias.php">Inscripción <i class="fa fa-pencil-square-o icon"></i></a></li>
                <li><a href="reportes.php">Reportes <i class="fa fa-book icon"></i></a></li>
            </div>
            <div class="separador-links">
                <li><a href="login.php">Cerrar Sesión <i class="fa fa-sign-out icon"></i> </a></li>
            </div>
        </ul>
    </nav>
</div>
<section>
    <article>
        <h1>MODIFICAR USUARIO</h1>
        <div class="formtab">
            <h2>Nuevos datos del usuario</h2>

            <form action="" class="form-horizontal" name="formulario" id="salario" method="post">
                <div class="input-container">
                    <i class="fa fa-user-circle-o icon icon-login-registro"></i>
                    <input class="input-field" type="text" name="input" placeholder="Usuario:" required>
                </div>
                <div class="input-container">
                    <i class="fa fa-address-card icon icon-login-registro"></i>
                    <input class="input-field" type="text" name="input" placeholder="Nombre:" required>
                </div>
                <div class="input-container">
                    <i class="fa fa-address-card icon icon-login-registro"></i>
                    <input class="input-field" type="text" name="input" placeholder="Apellido:" required>
                </div>
                <div class="input-container">
                    <i class="fa fa-birthday-cake icon icon-login-registro"></i>
                    <input class="input-field" type="date" name="fechan" placeholder="dd/mm/yyyy" required>
                </div>
                <div class="input-container">
                    <i class="fa fa-envelope icon icon-login-registro"></i>
                    <input class="input-field" type="text" name="email" placeholder="Email:" required>
                </div>
                <div class="input-container">
                    <i class="fa fa-phone icon icon-login-registro"></i>
                    <input class="input-field" type="text" name="tel" placeholder="Numero de teléfono:" required>
                </div>
                <div class="input-container">
                    <i class="fa fa-key icon icon-login-registro"></i>
                    <input class="input-field" type="password" name="pass" placeholder="Ingrese su contraseña:" required>
                </div>
                <div class="input-container">
                    <i class="fa fa-key icon icon-login-registro"></i>
                    <input class="input-field" type="password" name="pass_rep" placeholder="Repita su contraseña:" required>
                </div>

                <button type="submit" class="btn" value="Ingresar">Actualizar datos</button>
            </form>
        </div>
    </article>
</section>

<div id="creditos">
    <h5>Copyright © 2020-Universidad Don Bosco</h5>
</div>

</body>
</html>