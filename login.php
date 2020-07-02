<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Iniciar Sesión</title>
  </head>
  <body>
    <?php
      if(!isset($_POST['Enviar'])):
        date_default_timezone_set('America/El_Salvador');
        $fecha = Date('Y-m-d h:i:s');
        echo $fecha;
     ?> <!--Declaración de formulario-->
     <form class="login" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
       <label>Ingrese su usuario:</label>
       <input type="text" name="usuario" required><br>
       <label>Ingrese su contraseña:</label>
       <input type="password" name="passwd" required><br>
       <input type="submit" name="Enviar" value="Iniciar Sesión"><br>
       <a href="registro.php">¿Aún no tienes cuenta de usuario?</a>
     </form>
     <?php
      else:
        //Variables de conexion a la base de datos
        $server = "localhost";
        $user = "root";
        $passwd = "abc123";
        $db = "prueba";
        //Variable que almacena la cadena de conexión a la base de datos
        $conexion = new mysqli($server, $user, $passwd, $db);
        $usuario = isset($_POST['usuario']) ? $_POST['usuario'] : 0;
        $contra = isset($_POST['passwd']) ? $_POST['passwd'] : 0;
        if($conexion->connect_error){
          die("Error de conexión a la base de datos: " . $conexion->connect_error);
        }
        //Consulta de tipo INSERT para ingresar registro de nuevo usuario
        Session_start();
        $query="SELECT Usuario, Password FROM usuarios WHERE Usuario='$usuario'";
        $resultado = $conexion->query($query);
        if($resultado->num_rows > 0){
          while($row = $resultado->fetch_assoc()) {
            $verificar_password = password_verify($contra, $row["Password"]);
            switch($verificar_password){ //Valores booleanos en condicional
              case 0 : //0 --> El hash de las contraseñas no coinciden
              if(!isset($_SESSION['cont'])){ //Variable de sesion para contar cantidad de intentos fallidos
                $_SESSION['cont'] = 1;
              }else{
                $_SESSION['cont'] = $_SESSION['cont'] + 1;
              }
              if($_SESSION['cont'] >= 3){ //Si la variable sesión llega 3 intentos, la cuenta se bloquea y se destruye la sesión
                //Consulta de tipo UPDATE
                session_destroy();
                echo "SU CUENTA HA SIDO BLOQUEADA PORQUE HA SUPERADO EL LÍMITE DE INTENTOS FALLIDOS <br>";
              }else{
                echo "Contraseña incorrecta <br>" . $_SESSION['cont'];
              }
              echo "<a href=\"{$_SERVER['PHP_SELF']}\">Intentar de nuevo</a>";
              break;
              case 1 : //1 --> El hash de las contraseñas si coinciden
              echo "Inicio de sesión exitoso <br>";
              echo "<a href=\"{$_SERVER['PHP_SELF']}\">Cerrar sesión</a>";
              break;
          }
        }
        }else{ //Si el query presenta un error
          echo "El usuario ingresado no existe <br>";
          echo "<a href=\"{$_SERVER['PHP_SELF']}\">Intentar de nuevo</a>";
        }
        $conexion->close();
      endif;
      ?>
  </body>
</html>
