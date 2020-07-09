<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Interna</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="../css/normalize.css"/>
    <link rel="stylesheet" href="../css/styles.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&family=Montserrat:wght@300;400;700&display=swap" rel="stylesheet">
</head>
<body>
<header>
<div id="navegador">
<input type="checkbox" id="menu-bar">
<label for="menu-bar" class="fa fa-bars icon" style="font-size:36px"></label>
<a href="perfil.php"><img class="circular--squaremin" src="../img/user.png" /></a>
<a href="login.php" class="cerrar">Cerrar Sesión <i class="fa fa-sign-out icon"></i> </a>
    <nav class="menu">
        <ul>
            <div class="separador-links">
                <li><a href="../perfil.php">Mi perfil <i class="fa fa-user icon"></i></a></li>
                <li><a href="../gestion.php">Gestión <i class="fa fa-cog icon"></i></a></li>
                <li class="cerrar-m" ><a href="login.php">Cerrar Sesión <i class="fa fa-sign-out icon"></i> </a></li>
                </div>
        </ul>
    </nav>
</div>
</header>
<section class="contenido-g">
    <article>
<?php
include("cn.php");
/*Insertar información*/
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
 if(isset($_POST['nombre_carrera']) && isset($_POST['codigo_escuela'])){
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
  $insertar="INSERT INTO materia(Codigo_materia, Nombre_materia, Codigo_escuela) VALUES('$codigo_materia','$nombre_materia', '$codigo_escuela')";
  if($conexion->query($insertar)===true){
      echo 'La materia se ha registrado';
      header("Location: ../materias.php");
  }
  else{
      echo 'La materia ya existe';
  }
  
}

  /*Permite realizar insert a la tabla grupo*/
  if(isset($_POST['nombre']) && isset($_POST['tipo']) && isset($_POST['cod_mat']) && isset($_POST['cupos'])){
    $nombre=$_POST["nombre"];
    $tipo=$_POST["tipo"];
    $cupos=$_POST["cupos"];
    $codigo_mat=$_POST["cod_mat"];
    $insertar="INSERT INTO grupo (Codigo_grupo, Nombre_grupo, Tipo, Codigo_materia, cupos) VALUES('', '$nombre', '$tipo', '$codigo_mat', '$cupos')";
    if($conexion->query($insertar)===true){
        echo 'El grupo se ha registrado';
        header("Location: ../grupos_materia.php");
    }
    else{
        echo 'El grupo ya existe';
    }
    
  }

/*Eliminar informacion*/
/*Permite eliminar datos de la tabla materias*/
if(!empty($_REQUEST['id_materia'])){
if(!empty($_POST)){
  $codigo_mat=$_POST['codigo_mat'];
  $query_delete=mysqli_query($conexion,"DELETE FROM materia WHERE Codigo_materia='$codigo_mat'");
  if($query_delete){
    header("Location: ../materias.php");
  }else{
    echo "Error al eliminar";
  }
  }

/*Permite seleccionar la informacion que va ser eliminada de la tabla materias y mostrar un mensaje si el usuario desea eliminar o no la información*/
  $codigo_mat=$_REQUEST['id_materia'];
  $query=mysqli_query($conexion,"SELECT Nombre_materia FROM materia WHERE Codigo_materia='$codigo_mat'");
  $result=mysqli_num_rows($query);
  if($result > 0){
    while($mostrar = mysqli_fetch_array($query)){
      $nombre_mat=$mostrar['Nombre_materia'];
    }
    echo "<div class=\"formtab\">
    <h2>¿Está seguro de eliminar la siguiente materia?</h2>
    <form class=\"search-container\" method=\"POST\" action=\"\">
    <div class=\"select-container\">
    <h4 class=\"txt-msg\"> Nombre: ",$nombre_mat,"</h4>
    </div>
    <div class=\"select-container\">
    <input type=\"hidden\" name=\"codigo_mat\" value=\"$codigo_mat\">
    <a href=\"../materias.php\" class=\"btn-cancel\">Cancelar</a>
    <button type=\"submit\" value=\"Aceptar\" class=\"btn-ok\">Aceptar</button>
    <label for=\"btn-repo\" Aceptar</label>
    </div>
    </form>
    </div><br><br><br><br>";
  }
  else{
    header("Location: ../materias.php");
  }
}
/*Eliminar elementos desde el usuario Admin*/
if(!empty($_REQUEST['id_carrera'])){
/*Permite eliminar datos de la tabla carreras*/
if(!empty($_POST)){
  $codigo_car=$_POST['codigo_car'];
  $query_delete=mysqli_query($conexion,"DELETE FROM carrera WHERE Codigo_carrera='$codigo_car'");
  if($query_delete){
    header("Location: ../carreras.php");
  }else{
    echo "Error al eliminar";
  }
  }

/*Permite seleccionar la informacion que va ser eliminar de la tabla carreras y mostrar un mensaje si el usuario desea eliminar o no la información*/
  $codigo_car=$_REQUEST['id_carrera'];
  $query=mysqli_query($conexion,"SELECT Nombre_carrera FROM carrera WHERE Codigo_carrera='$codigo_car'");
  $result=mysqli_num_rows($query);
  if($result > 0){
    while($mostrar = mysqli_fetch_array($query)){
      $nombre_car=$mostrar['Nombre_carrera'];
    }
    echo "<div class=\"formtab\">
    <h2>¿Está seguro de eliminar la siguiente carrera?</h2>
    <form class=\"search-container\" method=\"POST\" action=\"\">
    <div class=\"select-container\">
    <h4 class=\"txt-msg\"> Nombre: ",$nombre_car,"</h4>
    </div>
    <div class=\"select-container\">
    <input type=\"hidden\" name=\"codigo_car\" value=\"$codigo_car\">
    <a href=\"../materias.php\" class=\"btn-cancel\">Cancelar</a>
    <button type=\"submit\" value=\"Aceptar\" class=\"btn-ok\">Aceptar</button>
    <label for=\"btn-repo\" Aceptar</label>
    </div>
    </form>
    </div><br><br><br><br>";
  }else{
    header("Location: ../carreras.php");
  }
}

if(!empty($_REQUEST['id_escuela'])){
  /*Permite eliminar datos de la tabla carreras*/
  if(!empty($_POST)){
    $codigo_esc=$_POST['codigo_esc'];
    $query_delete=mysqli_query($conexion,"DELETE FROM escuela WHERE Codigo_escuela='$codigo_esc'");
    if($query_delete){
      header("Location: ../escuelas.php");
    }else{
      echo "Error al eliminar";
    }
    }
  
  /*Permite seleccionar la informacion que va ser eliminar de la tabla escuelas y mostrar un mensaje si el usuario desea eliminar o no la información*/
    $codigo_esc=$_REQUEST['id_escuela'];
    $query=mysqli_query($conexion,"SELECT Nombre_escuela FROM escuela WHERE Codigo_escuela='$codigo_esc'");
    $result=mysqli_num_rows($query);
    if($result > 0){
      while($mostrar = mysqli_fetch_array($query)){
        $nombre_esc=$mostrar['Nombre_escuela'];
      }
      echo "<div class=\"formtab\">
      <h2>¿Está seguro de eliminar la siguiente escuela?</h2>
      <form class=\"search-container\" method=\"POST\" action=\"\">
      <div class=\"select-container\">
      <h4 class=\"txt-msg\"> Nombre: ",$nombre_esc,"</h4>
      </div>
      <div class=\"select-container\">
      <input type=\"hidden\" name=\"codigo_esc\" value=\"$codigo_esc\">
      <a href=\"../escuelas.php\" class=\"btn-cancel\">Cancelar</a>
      <button type=\"submit\" value=\"Aceptar\" class=\"btn-ok\">Aceptar</button>
      <label for=\"btn-repo\" Aceptar</label>
      </div>
      </form>
      </div><br><br><br><br>";
    }else{
      header("Location: ../escuelas.php");
    }
  }

  if(!empty($_REQUEST['id_empleado'])){
    /*Permite eliminar datos de la tabla carreras*/
    if(!empty($_POST)){
      $usuario_emp=$_POST['codigo_emp'];
      $query_delete=mysqli_query($conexion,"DELETE FROM empleado WHERE Usuario_empleado='$usuario_emp'");
      if($query_delete){
        header("Location: ../registro_interno.php");
      }else{
        echo "Error al eliminar";
      }
      }
    
    /*Permite seleccionar la informacion que va ser eliminar de la tabla empleado y mostrar un mensaje si el usuario desea eliminar o no la información*/
      $usuario_emp=$_REQUEST['id_empleado'];
      $query=mysqli_query($conexion,"SELECT Usuario_empleado, Nombres_empleado, Apellidos_empleado, Edad,Correo, Telefono, Nombre_rol, Activo, Hora_bloqueo FROM empleado INNER JOIN roles USING (Codigo_rol) WHERE Usuario_empleado='$usuario_emp'");
      $result=mysqli_num_rows($query);
      if($result > 0){
        while($mostrar = mysqli_fetch_array($query)){
          $nombre_emp=$mostrar['Nombres_empleado'];
          $apellido_emp=$mostrar['Apellidos_empleado'];
          $edad_emp=$mostrar['Edad'];
          $telefono_emp=$mostrar['Telefono'];
          $rol_emp=$mostrar['Nombre_rol'];
        }
        echo "<div class=\"formtab\">
        <h2>¿Está seguro de eliminar la siguiente empleado?</h2>
        <form class=\"search-container\" method=\"POST\" action=\"\">
        <div class=\"select-container\">
        <h4 class=\"txt-msg\"> Nombre: ",$nombre_emp,"</h4>
        <h4 class=\"txt-msg\"> Apellido: ",$apellido_emp,"</h4>
        <h4 class=\"txt-msg\"> Edad: ",$edad_emp,"</h4>
        <h4 class=\"txt-msg\"> Telefono: ",$telefono_emp,"</h4>
        <h4 class=\"txt-msg\"> Rol: ",$rol_emp,"</h4>
        </div>
        <div class=\"select-container\">
        <input type=\"hidden\" name=\"codigo_emp\" value=\"$usuario_emp\">
        <a href=\"../registro_interno.php\" class=\"btn-cancel\">Cancelar</a>
        <button type=\"submit\" value=\"Aceptar\" class=\"btn-ok\">Aceptar</button>
        <label for=\"btn-repo\" Aceptar</label>
        </div>
        </form>
        </div><br><br><br><br>";
      }else{
        header("Location: ../registro_interno.php");
      }
    }

    if(!empty($_REQUEST['id_estudiante'])){
      /*Permite eliminar datos de la tabla carreras*/
      if(!empty($_POST)){
        $usuario_emp=$_POST['codigo_est'];
        $query_delete=mysqli_query($conexion,"DELETE FROM estudiante WHERE Usuario_estudiante='$usuario_emp'");
        if($query_delete){
          header("Location: ../registro_interno.php");
        }else{
          echo "Error al eliminar";
        }
        }
      
      /*Permite seleccionar la informacion que va ser eliminar de la tabla estudiante y mostrar un mensaje si el usuario desea eliminar o no la información*/
        $usuario_emp=$_REQUEST['id_estudiante'];
        $query=mysqli_query($conexion,"SELECT Usuario_estudiante, Nombres_estudiante, Apellidos_estudiante, Edad,Correo, Telefono, Nombre_rol, Activo, Hora_bloqueo FROM estudiante INNER JOIN roles USING (Codigo_rol) WHERE Usuario_estudiante='$usuario_emp'");
        $result=mysqli_num_rows($query);
        if($result > 0){
          while($mostrar = mysqli_fetch_array($query)){
            $nombre_est=$mostrar['Nombres_estudiante'];
            $apellido_est=$mostrar['Apellidos_estudiante'];
            $edad_est=$mostrar['Edad'];
            $telefono_est=$mostrar['Telefono'];
            $rol_est=$mostrar['Nombre_rol'];
          }
          echo "<div class=\"formtab\">
          <h2>¿Está seguro de eliminar la siguiente empleado?</h2>
          <form class=\"search-container\" method=\"POST\" action=\"\">
          <div class=\"select-container\">
          <h4 class=\"txt-msg\"> Nombre: ",$nombre_est,"</h4>
          <h4 class=\"txt-msg\"> Apellido: ",$apellido_est,"</h4>
          <h4 class=\"txt-msg\"> Edad: ",$edad_est,"</h4>
          <h4 class=\"txt-msg\"> Telefono: ",$telefono_est,"</h4>
          <h4 class=\"txt-msg\"> Rol: ",$rol_est,"</h4>
          </div>
          <div class=\"select-container\">
          <input type=\"hidden\" name=\"codigo_est\" value=\"$usuario_emp\">
          <a href=\"../registro_interno.php\" class=\"btn-cancel\">Cancelar</a>
          <button type=\"submit\" value=\"Aceptar\" class=\"btn-ok\">Aceptar</button>
          <label for=\"btn-repo\" Aceptar</label>
          </div>
          </form>
          </div><br><br><br><br>";
        }else{
          header("Location: ../registro_interno.php");
        }
      }

      if(!empty($_REQUEST['id_grupo'])){
        /*Permite eliminar datos de la tabla grupo*/
        if(!empty($_POST)){
          $codigo_grupo=$_POST['codigo_grupo'];
          $query_delete=mysqli_query($conexion,"DELETE FROM grupo WHERE Codigo_grupo='$codigo_grupo'");
          if($query_delete){
            header("Location: ../escuelas.php");
          }else{
            echo "Error al eliminar";
          }
          }
        
        /*Permite seleccionar la informacion que va ser eliminar de la tabla grupo y mostrar un mensaje si el usuario desea eliminar o no la información*/
          $codigo_grupo=$_REQUEST['id_grupo'];
          $query=mysqli_query($conexion,"SELECT * FROM grupo WHERE Codigo_grupo='$codigo_grupo'");
          $result=mysqli_num_rows($query);
          if($result > 0){
            while($mostrar = mysqli_fetch_array($query)){
              $codigo_grupo=$mostrar['Codigo_grupo'];
              $nombre_grupo=$mostrar['Nombre_grupo'];
              $tipo=$mostrar['Tipo'];
              $codigo_materia=$mostrar['Codigo_materia'];
              $cupo=$mostrar['cupos'];
            }
            echo "<div class=\"formtab\">
            <h2>¿Está seguro de eliminar la siguiente escuela?</h2>
            <form class=\"search-container\" method=\"POST\" action=\"\">
            <div class=\"select-container\">
            <h4 class=\"txt-msg\"> Nombre: ",$nombre_grupo,"</h4>
            <h4 class=\"txt-msg\"> Codigo Materia: ",$codigo_materia,"</h4>
            <h4 class=\"txt-msg\"> Cupos: ",$cupo,"</h4>
            </div>
            <div class=\"select-container\">
            <input type=\"hidden\" name=\"codigo_grupo\" value=\"$codigo_grupo\">
            <a href=\"../grupos_materia.php\" class=\"btn-cancel\">Cancelar</a>
            <button type=\"submit\" value=\"Aceptar\" class=\"btn-ok\">Aceptar</button>
            <label for=\"btn-repo\" Aceptar</label>
            </div>
            </form>
            </div><br><br><br><br>";
          }else{
            header("Location: ../grupos_materia.php");
          }
        }

 /*Actualiza información*/
 /*Actualiza datos de la tabla escuela*/
 if(!empty($_REQUEST['id_esc'])){

   if(!empty($_POST)){
     $alert='';
      if(empty($_POST['nombre_esc'])){
        echo "Todos los campos son obligatorios.";
      }
      else{
        $codigo_esc=$_POST['codigo_esc'];
        $nombre_esc=$_POST['nombre_esc'];

        $query=mysqli_query($conexion,"SELECT * FROM escuela WHERE (Nombre_escuela='$nombre_esc' AND Codigo_escuela!='$codigo_esc')");
        $result=mysqli_fetch_array($query);
        if($result > 0){
          echo "<h4>Esta escuela ya se encuentra registrada.";
        }else{
            $query_update=mysqli_query($conexion,"UPDATE escuela SET  Nombre_escuela='$nombre_esc' WHERE Codigo_escuela ='$codigo_esc' ");
            if($query_update){
              echo "Usuario actualizado.";
              header("Location: ../escuelas.php");
            }
            else{
            echo "Error al actualizar la información.";
            }
          }
      }
   }

  $codigo_es=$_REQUEST['id_esc'];
  $query=mysqli_query($conexion,"SELECT * FROM escuela WHERE Codigo_escuela='$codigo_es'");
  $result=mysqli_num_rows($query);
  if($result > 0){
    while($mostrar = mysqli_fetch_array($query)){
      $codigo_esc=$mostrar['Codigo_escuela'];
      $nombre_esc=$mostrar['Nombre_escuela'];
    }
    echo "<div class=\"formtab\">
    <h2>Actualizar escuelas</h2>
    <div>
    <form action=\"\" method=\"POST\" class=\"search-container sc-downloader\">
    <div class=\"select-container\">
    <h4>Codigo escuela: <input type=\"text\" name=\"codigo_esc\" value=\"$codigo_esc\" readonly></h4>
      </div>
        <div class=\"select-container\">
            <h4>Nombre escuela: <input type=\"text\" name=\"nombre_esc\" value=\"$nombre_esc\" required></h4>
        </div>
    </div>

    <div class=\"btn-inscribir\">
        <input type=\"submit\" id=\"btn-repo\">
        <label for=\"btn-repo\" class=\"btn\">Actualizar escuela <i class=\"fa fa-plus icon\" id=\"i-pdf-2\"></i></label>
    </div>
    </form>
</div><br><br><br><br>";
  }
  else{
    header("Location: ../escuelas.php");
  }

 }

/*Actualiza datos de la tabla carrera*/
if(!empty($_REQUEST['id_ca'])){


  if(!empty($_POST)){
    $alert='';
     if(empty($_POST['nombre_ca']) || empty($_POST['codigo_es'])){
       echo "Todos los campos son obligatorios.";
     }
     else{
       $codigo_ca=$_POST['codigo_ca'];
       $nombre_ca=$_POST['nombre_ca'];
       $codigo_es=$_POST['codigo_es'];

       $query=mysqli_query($conexion,"SELECT * FROM carrera WHERE (Nombre_carrera='$nombre_ca'  AND Codigo_carrera != '$codigo_ca')");
       $result=mysqli_fetch_array($query);
       if($result > 0){
         echo "Esta escuela ya se encuentra registrada.";
       }else{
           $query_update=mysqli_query($conexion,"UPDATE carrera SET  Nombre_carrera='$nombre_ca', Codigo_escuela='$codigo_es' WHERE Codigo_carrera ='$codigo_ca'");
           if($query_update){
             echo "Usuario actualizado.";
             header("Location: ../carreras.php");
           }
           else{
           echo "Error al actualizar la información.";
           }
         }
     }
  }
 $codigo_ca=$_REQUEST['id_ca'];
 $query=mysqli_query($conexion,"SELECT * FROM carrera WHERE Codigo_carrera='$codigo_ca'");
 $result=mysqli_num_rows($query);
 if($result > 0){
   while($mostrar = mysqli_fetch_array($query)){
     $codigo_ca=$mostrar['Codigo_carrera'];
     $nombre_ca=$mostrar['Nombre_carrera'];
     $codigo_es=$mostrar['Codigo_escuela'];
     
   }
   echo "<div class=\"formtab\">
   <h2>Editar carera</h2>

   <div>
   <form  method=\"POST\" class=\"search-container sc-downloader\">
       <div class=\"select-container\">
      <h4>Codigo carrera: <input type=\"text\" name=\"codigo_ca\" value=\"$codigo_ca\" readonly></h4>
       </div>

       <div class=\"select-container\">
           <h4>Nombre carrera: <input type=\"text\" name=\"nombre_ca\" value=\"$nombre_ca\" required></h4>
       </div>
       <div class=\"select-container\">
           <h4>Codigo escuela:</h4>
           <select name=\"codigo_es\" class=\"select_grupos_lab\">";
           include("consultas.php");
           while($mostra=mysqli_fetch_array($resultado1)){;
          echo  "<option>";echo $mostra['Codigo_escuela'];"</option>";
              };
    echo
           "</select>
       </div>
   </div>

   <div class=\"btn-inscribir\">
       <input type=\"submit\" id=\"btn-repo\">
       <label for=\"btn-repo\" class=\"btn\">Actualizar materia <i class=\"fa fa-plus icon\" id=\"i-pdf-2\"></i></label>
   </div>
   </form>
</div><br><br><br><br>";
 }
 else{
   header("Location: ../carreras.php");
 }

}

/*Actualiza datos de la tabla materia*/
if(!empty($_REQUEST['id_ma'])){


  if(!empty($_POST)){
    $alert='';
     if(empty($_POST['nombre_ma']) || empty($_POST['codigo_es'])){
       echo "Todos los campos son obligatorios.";
     }
     else{
       $codigo_ma=$_POST['codigo_ma'];
       $nombre_ma=$_POST['nombre_ma'];
       $codigo_es=$_POST['codigo_es'];

       $query=mysqli_query($conexion,"SELECT * FROM materia WHERE (Nombre_materia='$nombre_ma'  AND Codigo_materia != '$codigo_ma')");
       $result=mysqli_fetch_array($query);
       if($result > 0){
         echo "Esta carrera ya se encuentra registrada.";
       }else{
           $query_update=mysqli_query($conexion,"UPDATE materia SET  Nombre_materia='$nombre_ma', Codigo_escuela='$codigo_es' WHERE Codigo_materia ='$codigo_ma'");
           if($query_update){
             echo "Usuario actualizado.";
             header("Location: ../materias.php");
           }
           else{
           echo "Error al actualizar la información.";
           }
         }
     }
  }
 $codigo_ma=$_REQUEST['id_ma'];
 $query=mysqli_query($conexion,"SELECT * FROM materia WHERE Codigo_materia='$codigo_ma'");
 $result=mysqli_num_rows($query);
 if($result > 0){
   while($mostrar = mysqli_fetch_array($query)){
     $codigo_ma=$mostrar['Codigo_materia'];
     $nombre_ma=$mostrar['Nombre_materia'];
     $codigo_es=$mostrar['Codigo_escuela'];
     
   }
   echo "<div class=\"formtab\">
   <h2>Editar materia</h2>

   <div>
   <form  method=\"POST\" class=\"search-container sc-downloader\">
       <div class=\"select-container\">
      <h4>Codigo carrera: <input type=\"text\" name=\"codigo_ma\" value=\"$codigo_ma\" readonly></h4>
       </div>

       <div class=\"select-container\">
           <h4>Nombre carrera: <input type=\"text\" name=\"nombre_ma\" value=\"$nombre_ma\" required></h4>
       </div>
       <div class=\"select-container\">
           <h4>Codigo escuela:</h4>
           <select name=\"codigo_es\" class=\"select_grupos_lab\">";
           include("consultas.php");
           while($mostra=mysqli_fetch_array($resultado1)){;
          echo  "<option>";echo $mostra['Codigo_escuela'];"</option>";
              };
    echo
           "</select>
       </div>
   </div>

   <div class=\"btn-inscribir\">
       <input type=\"submit\" id=\"btn-repo\">
       <label for=\"btn-repo\" class=\"btn\">Actualizar materia <i class=\"fa fa-plus icon\" id=\"i-pdf-2\"></i></label>
   </div>
   </form>
</div><br><br><br><br>";
 }
 else{
  header("Location: ../materias.php");
 }

}


/*Actualiza datos de la tabla grupo*/
if(!empty($_REQUEST['id_gr'])){


  if(!empty($_POST)){
    $alert='';
     if(empty($_POST['nombre_gr']) || empty($_POST['tipo']) && empty($_POST['cupo']) || empty($_POST['codigo_ma'])){
       echo "Todos los campos son obligatorios.";
     }
     else{
      $codigo_gr=$_POST['codigo_gr'];
       $nombre_gr=$_POST['nombre_gr'];
       $tipo=$_POST['tipo'];
       $codigo_materia=$_POST['codigo_ma'];
       $cupo=$_POST['cupo'];
       $query=mysqli_query($conexion,"SELECT * FROM grupo WHERE Codigo_grupo='$codigo_grupo'");
       $result=mysqli_fetch_array($query);
       if($result > 0){
         echo "El grupo ya se encuentra registrado.";
       }else{
           $query_update=mysqli_query($conexion,"UPDATE grupo SET  Nombre_grupo='$nombre_gr',Tipo='$tipo',Nombre_grupo='$nombre_gr', Codigo_materia='$codigo_materia',cupos='$cupo' WHERE Codigo_grupo ='$codigo_gr'");
           if($query_update){
             echo "Usuario actualizado.";
             header("Location: ../grupos_materia.php");
           }
           else{
           echo "Error al actualizar la información.";
           }
         }
     }
  }
 $codigo_gr=$_REQUEST['id_gr'];
 $query=mysqli_query($conexion,"SELECT * FROM grupo WHERE Codigo_grupo='$codigo_gr'");
 $result=mysqli_num_rows($query);
 if($result > 0){
   while($mostrar = mysqli_fetch_array($query)){
    $codigo_gr=$mostrar['Codigo_grupo'];
     $nombre_gr=$mostrar['Nombre_grupo'];
     $tipo=$mostrar['Tipo'];
     $codigo_escuela=$mostrar['Codigo_materia'];
     $cupo=$mostrar['cupos'];
   }
   echo "<div class=\"formtab\">
   <h2>Editar Grupo</h2>

   <div>
   <form  method=\"POST\" class=\"search-container sc-downloader\">
   <input type=\"hidden\" name=\"codigo_gr\" value=\"$codigo_gr\" requered>
       <div class=\"select-container\">
      <h4>Nombre grupo: <input type=\"text\" name=\"nombre_gr\" value=\"$nombre_gr\" requered></h4>
       </div>

       <div class=\"select-container\">
           <h4>Tipo: <input type=\"text\" name=\"tipo\" value=\"$tipo\" required></h4>
       </div>

       <div class=\"select-container\">
           <h4>Cupo: <input type=\"text\" name=\"cupo\" value=\"$cupo\" required></h4>
       </div>

       <div class=\"select-container\">
           <h4>Codigo materia:</h4>
           <select name=\"codigo_ma\" class=\"select_grupos_lab\">";
           include("consultas.php");
           while($mostra=mysqli_fetch_array($resultado3)){;
          echo  "<option>";echo $mostra['Codigo_materia'];"</option>";
              };
    echo
           "</select>
       </div>
   </div>

   <div class=\"btn-inscribir\">
       <input type=\"submit\" id=\"btn-repo\">
       <label for=\"btn-repo\" class=\"btn\">Actualizar grupo <i class=\"fa fa-plus icon\" id=\"i-pdf-2\"></i></label>
   </div>
   </form>
</div><br><br><br><br>";
 }
 else{
  header("Location: ../grupos_materia.php");
 }

}

/*Actualiza datos de la tabla empleado*/
if(!empty($_REQUEST['id_emp'])){


  if(!empty($_POST)){
    $alert='';
     if(empty($_POST['Edad']) || empty($_POST['Rol']) || empty($_POST['Correo']) || empty($_POST['Telefono'])){
       echo "Todos los campos son obligatorios.";
     }
     else{
       $usuario_emp=$_POST['Usuario'];
       $nombre_emp=$_POST['Nombre'];
       $nombre_emp=$_POST['Apellido'];
       $edad=$_POST['Edad'];
       $rol=$_POST['Rol'];
       $correo=$_POST['Correo'];
       $telefono=$_POST['Telefono'];
       $pass=['Passwd'];
       $passrep=['PasswdRep'];
       if($pass != $passrep){
        echo "Las contraseñas no coinciden";
      }else{
        $encriptada = password_hash($pass, PASSWORD_BCRYPT);

       $query=mysqli_query($conexion,"SELECT * FROM empleado WHERE (Correo='$correo' AND Usuario_empleado != '$usuario_emp') OR (Telefono='$telefono' AND Usuario_empleado != '$usuario_emp') ");
       $result=mysqli_fetch_array($query);
      }
       if($result > 0){
         echo "Este usuario ya se encuentra registrada.";
       }else{

        if(empty($_POST['Passwd']) && empty($_POST['PasswdRep'])){

          $query_update=mysqli_query($conexion,"UPDATE empleado SET  Edad='$edad', Correo='$correo', Telefono='$telefono', Codigo_rol='$rol' WHERE Usuario_empleado ='$usuario_emp'");

        }else{

          $query_update=mysqli_query($conexion,"UPDATE empleado SET Pass_empleado='$encriptada', Edad='$edad', Correo='$correo', Telefono='$telefono', Codigo_rol='$rol' WHERE Usuario_empleado ='$usuario_emp'");

        }
           if($query_update){
             echo "Usuario actualizado.";
             header("Location: ../registro_interno.php");
           }
           else{
           echo "Error al actualizar la información.";
           }
        }
     }
  }
 $usuario_emp=$_REQUEST['id_emp'];
 $query=mysqli_query($conexion,"SELECT * FROM empleado WHERE Usuario_empleado='$usuario_emp'");
 $result=mysqli_num_rows($query);
 if($result > 0){
   while($mostrar = mysqli_fetch_array($query)){
    $usuario_emp=$mostrar['Usuario_empleado'];
     $nombre_emp=$mostrar['Nombres_empleado'];
     $apellido_emp=$mostrar['Apellidos_empleado'];
     $edad=$mostrar['Edad'];
     $correo=$mostrar['Correo'];
     $telefono=$mostrar['Telefono'];
   }
   echo "<div class=\"formtab\">
   <h2>Actualizar datos de empleado</h2>

   <form class=\"form-horizontal\"  name=\"formulario\" method=\"POST\">
       <div class=\"input-container\">
           <i class=\"fa fa-user-circle-o icon icon-login-registro\"></i>
           <input class=\"input-field\" type=\"text\" name=\"Usuario\" placeholder=\"Usuario:\" value=\"$usuario_emp\" readonly>
       </div>
       <div class=\"input-container\">
           <i class=\"fa fa-address-card icon icon-login-registro\"></i>
           <input class=\"input-field\" type=\"text\" name=\"Nombre\" placeholder=\"Nombre:\" value=\"$nombre_emp\" required readonly>
       </div>
       <div class=\"input-container\">
           <i class=\"fa fa-address-card icon icon-login-registro\"></i>
           <input class=\"input-field\" type=\"text\" name=\"Apellido\" placeholder=\"Apellido:\" value=\"$apellido_emp\" required readonly>
       </div>
       <div class=\"input-container\">
           <i class=\"fa fa-birthday-cake icon icon-login-registro\"></i>
           <input class=\"input-field\" type=\"number\" name=\"Edad\" placeholder=\"Edad:\" min=\"0\" max=\"100\" value=\"$edad\" required>
       </div>
       <div class=\"input-container\">
           <i class=\"fa fa-certificate icon icon-login-registro\"></i>
           <select name=\"Rol\" class=\"input-field\">";
           include("consultas.php");
            while($mostrar=mysqli_fetch_array($resultado)){;
           echo "<option value=\"";echo $mostrar['Codigo_rol'];"";echo "\">"; echo $mostrar['Nombre_rol'];"</option>";
            }
       echo "</select>
       </div>
       <div class=\"input-container\">
           <i class=\"fa fa-envelope icon icon-login-registro\"></i>
           <input class=\"input-field\" type=\"text\" name=\"Correo\" placeholder=\"Email:\" value=\"$correo\" required>
       </div>
       <div class=\"input-container\">
           <i class=\"fa fa-phone icon icon-login-registro\"></i>
           <input class=\"input-field\" type=\"text\" name=\"Telefono\" placeholder=\"Numero de teléfono:\" value=\"$telefono\" required>
       </div>
       <div class=\"input-container\">
           <i class=\"fa fa-key icon icon-login-registro\"></i>
           <input class=\"input-field\" type=\"password\" name=\"Passwd\" placeholder=\"Ingrese su contraseña:\">
       </div>
       <div class=\"input-container\">
           <i class=\"fa fa-key icon icon-login-registro\"></i>
           <input class=\"input-field\" type=\"password\" name=\"PasswdRep\" placeholder=\"Repita su contraseña:\">
       </div>

       <button type=\"submit\" class=\"btn\" name=\"submit\" value=\"Actualizar\">Actualizar</button>
   </form>
   <div><br><br><br><br>";
 }
 else{
  header("Location: ../registro_interno.php");
 }

}


/*Actualiza datos de la tabla estudiante*/
if(!empty($_REQUEST['id_est'])){


  if(!empty($_POST)){
    $alert='';
     if(empty($_POST['Edad']) || empty($_POST['Correo']) || empty($_POST['Telefono'])){
       echo "Todos los campos son obligatorios.";
     }
     else{
       $usuario_est=$_POST['Usuario'];
       $nombre_est=$_POST['Nombre'];
       $nombre_est=$_POST['Apellido'];
       $edad=$_POST['Edad'];
       $correo=$_POST['Correo'];
       $telefono=$_POST['Telefono'];
       $pass=['Passwd'];
       $passrep=['PasswdRep'];
       if($pass != $passrep){
        echo "Las contraseñas no coinciden";
      }else{
        $encriptada = password_hash($pass, PASSWORD_BCRYPT);

       $query=mysqli_query($conexion,"SELECT * FROM estudiante WHERE (Correo='$correo' AND Usuario_estudiante != '$usuario_est') OR (Telefono='$telefono' AND Usuario_estudiante != '$usuario_est') ");
       $result=mysqli_fetch_array($query);
      }
       if($result > 0){
         echo "Este usuario ya se encuentra registrada.";
       }else{

        if(empty($_POST['Passwd']) && empty($_POST['PasswdRep'])){

          $query_update=mysqli_query($conexion,"UPDATE estudiante SET  Edad='$edad', Correo='$correo', Telefono='$telefono' WHERE Usuario_estudiante ='$usuario_est'");

        }else{

          $query_update=mysqli_query($conexion,"UPDATE estudiante SET Pass='$encriptada', Edad='$edad', Correo='$correo', Telefono='$telefono' WHERE Usuario_estudiante ='$usuario_est'");

        }
           if($query_update){
             echo "Usuario actualizado.";
             header("Location: ../registro_interno.php");
           }
           else{
           echo "Error al actualizar la información.";
           }
        }
     }
  }
 $usuario_est=$_REQUEST['id_est'];
 $query=mysqli_query($conexion,"SELECT * FROM estudiante WHERE Usuario_estudiante='$usuario_est'");
 $result=mysqli_num_rows($query);
 if($result > 0){
   while($mostrar = mysqli_fetch_array($query)){
    $usuario_est=$mostrar['Usuario_estudiante'];
     $nombre_est=$mostrar['Nombres_estudiante'];
     $apellido_est=$mostrar['Apellidos_estudiante'];
     $edad=$mostrar['Edad'];
     $correo=$mostrar['Correo'];
     $telefono=$mostrar['Telefono'];
   }
   echo "<div class=\"formtab\">
   <h2>Actualizar datos de empleado</h2>

   <form class=\"form-horizontal\"  name=\"formulario\" method=\"POST\">
       <div class=\"input-container\">
           <i class=\"fa fa-user-circle-o icon icon-login-registro\"></i>
           <input class=\"input-field\" type=\"text\" name=\"Usuario\" placeholder=\"Usuario:\" value=\"$usuario_est\" readonly>
       </div>
       <div class=\"input-container\">
           <i class=\"fa fa-address-card icon icon-login-registro\"></i>
           <input class=\"input-field\" type=\"text\" name=\"Nombre\" placeholder=\"Nombre:\" value=\"$nombre_est\" required readonly>
       </div>
       <div class=\"input-container\">
           <i class=\"fa fa-address-card icon icon-login-registro\"></i>
           <input class=\"input-field\" type=\"text\" name=\"Apellido\" placeholder=\"Apellido:\" value=\"$apellido_est\" required readonly>
       </div>
       <div class=\"input-container\">
           <i class=\"fa fa-birthday-cake icon icon-login-registro\"></i>
           <input class=\"input-field\" type=\"number\" name=\"Edad\" placeholder=\"Edad:\" min=\"0\" max=\"100\" value=\"$edad\" required>
       </div>
       <div class=\"input-container\">
           <i class=\"fa fa-envelope icon icon-login-registro\"></i>
           <input class=\"input-field\" type=\"text\" name=\"Correo\" placeholder=\"Email:\" value=\"$correo\" required>
       </div>
       <div class=\"input-container\">
           <i class=\"fa fa-phone icon icon-login-registro\"></i>
           <input class=\"input-field\" type=\"text\" name=\"Telefono\" placeholder=\"Numero de teléfono:\" value=\"$telefono\" required>
       </div>
       <div class=\"input-container\">
           <i class=\"fa fa-key icon icon-login-registro\"></i>
           <input class=\"input-field\" type=\"password\" name=\"Passwd\" placeholder=\"Ingrese su contraseña:\">
       </div>
       <div class=\"input-container\">
           <i class=\"fa fa-key icon icon-login-registro\"></i>
           <input class=\"input-field\" type=\"password\" name=\"PasswdRep\" placeholder=\"Repita su contraseña:\">
       </div>

       <button type=\"submit\" class=\"btn\" name=\"submit\" value=\"Actualizar\">Actualizar</button>
   </form>
   <div><br><br><br><br>";
 }
 else{
  header("Location: ../registro_interno.php");
 }

}




mysqli_close($conexion);
?> 
 </article>
</section>

<div id="creditos">
    <h5>Copyright © 2020-Universidad Don Bosco</h5>
</div>

</body>
</html>