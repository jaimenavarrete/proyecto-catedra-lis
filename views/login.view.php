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
<body id="freg">
<section class="frm-l">
    <article>
        <form action="login.php" class="form-horizontal" name="formulario" class="frm-usu" method="post">
            <div>
                <h2>Inicio de sesión</h2>
            </div>
            <div class="input-container">
                <i class="fa fa-user-circle-o icon icon-login-registro"></i>
                <input class="input-field" type="text" name="Usuario" placeholder="Usuario:" required>
            </div>
            <div class="input-container">
                <i class="fa fa-key icon icon-login-registro"></i>
                <input class="input-field" type="password" name="Passwd" placeholder="Ingrese su contraseña:" required>
            </div>
            <input type="submit" class="btn" value="Iniciar Sesión" name="submit">
            <div class="form-options">
                <h4>¿Aun no tienes cuenta?</h4>
                <a href="registro.php">Regístrate</a>
            </div>
        </form>
    </article>
</section>
</body>
</html>
