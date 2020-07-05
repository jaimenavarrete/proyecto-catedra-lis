<?php
if(isset($_POST['submit'])){

  $server = "localhost";
  $user = "root";
  $passwd = "abc123";
  $db = "proyectolis";
  //Variable que almacena la cadena de conexión a la base de datos
  $conexion = new mysqli($server, $user, $passwd, $db);
  $usuario = isset($_POST['Usuario']) ? $_POST['Usuario'] : 0;
  $contra = isset($_POST['Passwd']) ? $_POST['Passwd'] : 0;
  if($conexion->connect_error){
    die("Error de conexión a la base de datos: " . $conexion->connect_error);
  }else{
    //Consulta de tipo INSERT para ingresar registro de nuevo usuario
    Session_start();
    $query="SELECT Usuario_estudiante, Pass, Activo, Hora_bloqueo FROM estudiante WHERE Usuario_estudiante='$usuario'";
    $resultado = $conexion->query($query);
    if($resultado->num_rows > 0){ //Si la consulta devuelve resultados
      while($row = $resultado->fetch_assoc()) {
      if($row["Activo"] == 0){ //Si el usuario ingresado se encuentra inactivo no lo deja pasar
        echo "Su cuenta se encuentra bloqueada desde las " . $row["Hora_bloqueo"] . " intente más tarde <br>";
        echo "<a href=login.php>Volver a la página anterior inicio</a>";
      }else{
        $verificar_password = password_verify($contra, $row["Pass"]); //Verificación del hash de la contraseña
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
                date_default_timezone_set('America/El_Salvador');
                $fecha = Date('h:i:s');
                //Query que actualiza el estado de la cuenta de usuario de ACTIVO a INACTIVO (1 -> 0)
                $desactivar = "UPDATE estudiante SET Activo='0' WHERE Usuario_estudiante='$usuario'";
                $Hora_Bloqueo = "UPDATE estudiante SET Hora_bloqueo='$fecha' WHERE Usuario_estudiante='$usuario'";
                if($conexion->query($desactivar)===TRUE && $conexion->query($Hora_Bloqueo)===TRUE){
                  echo "SU CUENTA HA SIDO BLOQUEADA PORQUE HA SUPERADO EL LÍMITE DE INTENTOS FALLIDOS <br>";
                  //AQUI DEBE IR EL CODIGO DE ENVIO DE CORREO
                  echo "<a href=login.php>Volver al inicio</a>";
                }
              }else{
                  echo "Contraseña incorrecta <br>";
              }
                echo "<a href=login.php>Intentar de nuevo</a>";
                break;
            case 1 : //1 --> El hash de las contraseñas si coinciden
                echo "Inicio de sesión exitoso <br>";
                echo "<a href=login.php>Cerrar sesión</a>";
                break;
            }
          }
      }
    }else{ //Si el query presenta un error
            echo "El usuario ingresado no existe <br>";
            echo "<a href=login.php>Intentar de nuevo</a>";
          }
      }
  $conexion->close();
}else{
  echo "No se pudo iniciar sesión";
}
?>
