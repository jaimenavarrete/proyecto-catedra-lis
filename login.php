<?php
if(isset($_POST['submit'])){

  $server = "localhost";
  $user = "root";
  $passwd = "";
  $db = "proyectolis";
  //Variable que almacena la cadena de conexión a la base de datos
  $conexion = new mysqli($server, $user, $passwd, $db);
  date_default_timezone_set('America/El_Salvador');
  $fecha = Date('H:i:s');
  $usuario = isset($_POST['Usuario']) ? $_POST['Usuario'] : 0;
  $contra = isset($_POST['Passwd']) ? $_POST['Passwd'] : 0;

  if($conexion->connect_error){
    die("Error de conexión a la base de datos: " . $conexion->connect_error);
  }else{
    //Consulta de tipo INSERT para ingresar registro de nuevo usuario
    Session_start();
    //Queries para validar si la información ingresada corresponde a un estudiante
    $query_estudiante="SELECT Usuario_estudiante, Pass, Nombres_estudiante, Correo, Codigo_rol, Activo, Hora_bloqueo FROM estudiante WHERE Usuario_estudiante='$usuario'";
    $resultado_estudiante = $conexion->query($query_estudiante);

    //Queries para validar si la información ingresada corresponde a un empleado
    $query_empleado="SELECT Usuario_empleado, Pass_empleado, Nombres_empleado, Correo, Codigo_rol, Activo, Hora_bloqueo FROM empleado WHERE Usuario_empleado='$usuario'";
    $resultado_empleado = $conexion->query($query_empleado);
    if($resultado_estudiante->num_rows > 0){ //Si la consulta devuelve resultados
      while($row = $resultado_estudiante->fetch_assoc()){
      if($row["Activo"] == 0){ //Si el usuario ingresado se encuentra inactivo no lo deja pasar
                    $horabd= new DateTime($row["Hora_bloqueo"]); //Convertimos la hora almacenada en la base de datos a formato DateTime
                    $horasystem= new DateTime($fecha); //Convertimos la hora del sistema a formato DateTime
                    $diferencia = $horabd->diff($horasystem); //Diferencia de hora de bloqueo con hora actual
                    $totalMinutos=($diferencia->d * 24 * 60) + ($diferencia->h * 60) + $diferencia->i;//Calculo de minutos aparte para crear condición de reactivación
                    if($totalMinutos>=60){ //Si los minutos son igual o mayor a 60, entonces ya pasó una hora y debe reactivarse el usuario
                      $reactivar = "UPDATE empleado SET Activo='1',Hora_bloqueo=NULL WHERE Usuario_empleado='$usuario'"; //Consulta para reactivar el usuario
                      $conexion->query($reactivar); //Se reactiva el usuario
                    }else{
                      echo "Su cuenta se encuentra bloqueada desde las " . $row["Hora_bloqueo"] . " intente más tarde <br>";
                      echo $diferencia->format('Tiempo transcurrido: %H horas %i minutos %s segundos ').PHP_EOL;echo "<br>";
                      require_once('consultas/Notificaciones.php');
                      NotificacionIntentos($row["Correo"], $row["Nombres_estudiante"], $fecha);
                    }
      }else{



        $row["Pass"] = password_hash($row["Pass"], PASSWORD_DEFAULT);
        $verificar_password = password_verify($contra, $row["Pass"]); //Verificación del hash de la contraseña



        echo $verificar_password;
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
                //Query que actualiza el estado de la cuenta de usuario de ACTIVO a INACTIVO (1 -> 0)
                $desactivar = "UPDATE estudiante SET Activo='0' WHERE Usuario_estudiante='$usuario'";
                $Hora_Bloqueo = "UPDATE estudiante SET Hora_bloqueo='$fecha' WHERE Usuario_estudiante='$usuario'";
                if($conexion->query($desactivar)===TRUE && $conexion->query($Hora_Bloqueo)===TRUE){
                  echo "SU CUENTA HA SIDO BLOQUEADA A LAS " . $fecha . " PORQUE HA SUPERADO EL LÍMITE DE INTENTOS FALLIDOS PERMITIDOS<br>";
                  require_once('consultas/Notificaciones.php'); //Se invoca script donde está la función que notifica del bloqueo
                  //Se envía por correo notificación de bloqueo. Pasando por parámetro el correo, nombre de estudiante y hora de bloqueo a la función.
                  NotificacionBloqueo($row["Correo"], $row["Nombres_estudiante"], $fecha);
                }
              }else{
                  echo "Contraseña incorrecta <br>";
              }
                break;
            case 1 : //1 --> El hash de las contraseñas si coinciden
                $_SESSION["usuario"] = $row["Usuario_estudiante"];
                $_SESSION["rol"] = $row["Codigo_rol"];
                // header("Location: perfil_estudiante.php");
                // header("Location: perfil_estudiante.php");
                header("Location: perfil.php");
                break;
            }//Fin switch de verificar contraseña
          }//Fin else de NO bloqueo
      }//Fin while resultado_estudiante
    }elseif($resultado_empleado->num_rows > 0){
      while($row = $resultado_empleado->fetch_assoc()){
        if($row["Activo"] == 0){ //Si el usuario ingresado se encuentra inactivo no lo deja pasar
                    $horabd= new DateTime($row["Hora_bloqueo"]); //Convertimos la hora almacenada en la base de datos a formato DateTime
                    $horasystem= new DateTime($fecha); //Convertimos la hora del sistema a formato DateTime
                    $diferencia = $horabd->diff($horasystem); //Diferencia de hora de bloqueo con hora actual
                    $totalMinutos=($diferencia->d * 24 * 60) + ($diferencia->h * 60) + $diferencia->i;//Calculo de minutos aparte para crear condición de reactivación
                    if($totalMinutos>=60){ //Si los minutos son igual o mayor a 60, entonces ya pasó una hora y debe reactivarse el usuario
                      $reactivar = "UPDATE empleado SET Activo='1',Hora_bloqueo=NULL WHERE Usuario_empleado='$usuario'"; //Consulta para reactivar el usuario
                      $conexion->query($reactivar); //Se reactiva el usuario
                    }else{
                      echo "Su cuenta se encuentra bloqueada desde las " . $row["Hora_bloqueo"] . " intente dentro de una hora <br>";
                      echo $diferencia->format('Tiempo transcurrido: %H horas %i minutos %s segundos ').PHP_EOL;echo "<br>";
                      require_once('consultas/Notificaciones.php');
                      NotificacionIntentos($row["Correo"], $row["Nombres_empleado"], $fecha);
                    }
        }else{



          $row["Pass_empleado"] = password_hash($row["Pass_empleado"], PASSWORD_DEFAULT);
          $verificar_password = password_verify($contra, $row["Pass_empleado"]); //Verificación del hash de la contraseña



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
                  //Query que actualiza el estado de la cuenta de usuario de ACTIVO a INACTIVO (1 -> 0)
                  $desactivar = "UPDATE empleado SET Activo='0' WHERE Usuario_empleado='$usuario'";
                  $Hora_Bloqueo = "UPDATE empleado SET Hora_bloqueo='$fecha' WHERE Usuario_empleado='$usuario'";
                  if($conexion->query($desactivar)===TRUE && $conexion->query($Hora_Bloqueo)===TRUE){
                    echo "SU CUENTA HA SIDO BLOQUEADA A LAS " . $fecha . " PORQUE HA SUPERADO EL LÍMITE DE INTENTOS FALLIDOS PERMITIDOS<br>";
                    require_once('consultas/Notificaciones.php'); //Se invoca script donde está la función que notifica del bloqueo
                    //Se envía por correo notificación de bloqueo. Pasando por parámetro el correo, nombre de estudiante y hora de bloqueo.
                    NotificacionBloqueo($row["Correo"], $row["Nombres_empleado"], $fecha);
                    echo "<a href=login.php>Volver al inicio</a>";
                  }
                }else{
                    echo "Contraseña incorrecta <br>";
                }
                  break;
              case 1 : //1 --> El hash de las contraseñas si coinciden
                  $_SESSION["usuario"] = $row["Usuario_empleado"];
                  if($row["Codigo_rol"] == 3){//Valida si el usuario es docente o administrador
                    $_SESSION["rol"] = $row["Codigo_rol"];
                    // header("Location: perfil_administrador.php");
                    header("Location: perfil.php");
                  }elseif($row["Codigo_rol"] == 2){
                    $_SESSION["rol"] = $row["Codigo_rol"];
                    header("Location: crear_grupos.php");
                  }
                  break;
              }//Fin switch de verificar contraseña
            }//Fin else NO bloqueo
      }//Fin while resultado_empleado
    }else{
            echo "El usuario ingresado no existe <br>";
          }
  }
  $conexion->close();
}/*else{
  echo "No se pudo iniciar sesión";
}*/
require 'views/login.view.php';
?>
