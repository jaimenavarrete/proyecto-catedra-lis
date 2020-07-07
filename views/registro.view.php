<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="css/normalize.css"/>
    <link rel="stylesheet" href="css/styles.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&family=Montserrat:wght@300;400;700&display=swap" rel="stylesheet">
</head>
<body id="freg">
<section class="frm-r">
    <article>
        <form action="RegistroEstudiantes.php" class="form-horizontal" name="formr" method="post">
            <div>
                <h2>Registro</h2>
            </div>

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
            <input type="submit" class="btn" name="submit">
            <div class="form-options">
                <h4>¿Ya tienes cuenta?</h4>
                <a href="login.php">Inicia Sesión</a>
            </div>
        </form>
    </article>
</section>
</body>
</html>
