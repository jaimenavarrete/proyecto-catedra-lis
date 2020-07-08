<?php
include("cn.php");
/*Permite llamar los diferentes inputs y section option a una variable para poder realizar insert a la tabla empleado*/
 if(isset($_POST['submit'])){
    $Usuario = isset($_POST['Usuario']) ? $_POST['Usuario'] : 0;
    $Nombre = isset($_POST['Nombre']) ? $_POST['Nombre'] : 0;
    $Apellido = isset($_POST['Apellido']) ? $_POST['Apellido'] : 0;
    $Edad = isset($_POST['Edad']) ? $_POST['Edad'] : 0;
    $Rol = isset($_POST['Rol']) ? $_POST['Rol'] : 0;
    $Correo = isset($_POST['Correo']) ? $_POST['Correo'] : 0;
    $Telefono = isset($_POST['Telefono']) ? $_POST['Telefono'] : 0;
    $contra = isset($_POST['Passwd']) ? $_POST['Passwd'] : 0;
    $contraRep = isset($_POST['PasswdRep']) ? $_POST['PasswdRep'] : 0;
    if($contra != $contraRep){
      echo "Las contraseñas no coinciden <br>";
    }else{
      $encriptada = password_hash($contra, PASSWORD_BCRYPT);
      $query="INSERT INTO empleado (Usuario_empleado, Pass_empleado, Nombres_empleado, Apellidos_empleado, Edad, Correo, Telefono, Codigo_rol, Activo)
      VALUES ('$Usuario', '$encriptada', '$Nombre', '$Apellido', '$Edad', '$Correo', '$Telefono', '$Rol', '1')";
      if($conexion->query($query) === TRUE){
        echo "Usuario registrado con éxito";
        header("Location: ../registro_interno.php"); //Si el query se realiza con éxito
      }else{ //Si el query presenta un error
        echo "Error al ingresar los datos";
      }
    }
  }


 /*Permire realizar insert a la tabla escuela*/
 if(isset($_POST['codigo_escuela']) && isset($_POST['nombre_escuela'])){
  $codigo_escuela=$_POST["codigo_escuela"];
  $nombre_escuela=$_POST["nombre_escuela"];
  $insertar="INSERT INTO escuela(Codigo_escuela, Nombre_escuela) VALUES('$codigo_escuela', '$nombre_escuela')";
  if($conexion->query($insertar)===true){
      echo 'La escuela se ha registrado';
      header("Location: ../escuelas.php");
  }
  else{
      echo 'La escuela ya existe';
  }
  
}

 /*Permite realizar insert a la tabla carrera*/
 if(isset($_POST['codigo_carrera']) && isset($_POST['nombre_carrera']) && isset($_POST['codigo_escuela'])){
  $codigo_carrera=$_POST["codigo_carrera"];
  $nombre_carrera=$_POST["nombre_carrera"];
  $codigo_escuela=$_POST["codigo_escuela"];
  $insertar="INSERT INTO carrera(Codigo_carrera, Nombre_carrera, Codigo_escuela) VALUES('$codigo_carrera', '$nombre_carrera', '$codigo_escuela')";
  if($conexion->query($insertar)===true){
      echo 'La carrera se ha registrado';
      header("Location: ../carreras.php");
  }
  else{
      echo 'La carrera ya existe';
  }
  
}
/*Permite realizar insert a la tabla materia*/
if(isset($_POST['codigo_materia']) && isset($_POST['nombre_materia']) && isset($_POST['codigo_escuela'])){
  $codigo_materia=$_POST["codigo_materia"];
  $nombre_materia=$_POST["nombre_materia"];
  $codigo_escuela=$_POST["codigo_escuela"];
  $insertar="INSERT INTO materia(Codigo_materia, Nombre_materia, Codigo_escuela) VALUES('$codigo_materia', '$nombre_materia', '$codigo_escuela')";
  if($conexion->query($insertar)===true){
      echo 'La materia se ha registrado';
      header("Location: ../materias.php");
  }
  else{
      echo 'La materia ya existe';
  }
  
}


mysqli_close($conexion);
?>