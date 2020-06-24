<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="css/styles.css"/>
    <link rel="stylesheet" href="css/normalize.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&family=Montserrat:wght@300;400;700&display=swap" rel="stylesheet">
</head>
<body id="freg">
    <section>
        <article>
            <form action="" class="form-horizontal" name="formr">
                <div>
                    <h2>Registro</h2>
                </div>
            
                <div class="input-container">
                    <i class="fa fa-user-circle-o icon"></i>
                    <input class="input-field" type="text" name="input" placeholder="Usuario:" required>
                </div>
                <div class="input-container">
                    <i class="fa fa-address-card icon"></i>
                    <input class="input-field" type="text" name="input" placeholder="Nombre:" required>
                </div>
                <div class="input-container">
                    <i class="fa fa-address-card icon"></i>
                    <input class="input-field" type="text" name="input" placeholder="Apellido:" required>
                </div>
                <div class="input-container">
                    <i class="fa fa-birthday-cake icon"></i>
                    <input class="input-field" type="date" name="fechan" placeholder="dd/mm/yyyy" required>
                </div>
                <div class="input-container">
                    <i class="fa fa-envelope icon"></i>
                    <input class="input-field" type="text" name="email" placeholder="Email:" required>
                </div>
                <div class="input-container">
                    <i class="fa fa-phone icon"></i>
                    <input class="input-field" type="text" name="tel" placeholder="Numero de teléfono:" required>
                </div>
                <div class="input-container">
                    <i class="fa fa-key icon"></i>
                    <input class="input-field" type="password" name="pass" placeholder="Ingrese su contraseña:" required>
                </div>
                <div class="input-container">
                    <i class="fa fa-key icon"></i>
                    <input class="input-field" type="password" name="pass_rep" placeholder="Repita su contraseña:" required>
                </div>

                <input type="submit" class="btn">

                <div class="form-options">
                    <h4>¿Ya tienes cuenta?</h4>
                    <a href="login.php">Inicia Sesión</a>
                </div>
            </form>
        </article>
    </section>
</body>
</html>