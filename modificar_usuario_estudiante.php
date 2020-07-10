<?php
include("database/conn.php");
session_start();
if(!isset($_SESSION['usuario']) || $_SESSION['rol'] != 1){
    header("Location:index.php");
}else{
    $usuario = $_SESSION['usuario'];
    $rol = $_SESSION['rol'];
    echo $rol;
}

$id_usuario=$usuario;

        


$consulta="SELECT Usuario_estudiante,Pass,Nombres_estudiante,Apellidos_estudiante,
Edad,Correo,Telefono FROM estudiante WHERE Usuario_estudiante='$id_usuario'";
$resultado=$con->query($consulta);
$row=$resultado->fetch_assoc();

/*  Modificar campos de la tablas */
if(!empty($_POST)){

if(empty($_POST['cumple']) || empty($_POST['email']) || empty($_POST['telefono'])){
    echo "Todos los campos son obligatorios";
}else{
    $usuario_carnet=$_POST['usuario'];
    $años_alumno=$_POST['cumple'];
    $email_alumno=$_POST['email'];
    $telefono_alumno=$_POST['telefono'];
    $pas_alumno=$_POST['password'];
    $pas_alumno_confir=$_POST['password_rep'];

    if($pas_alumno != $pas_alumno_confir){
        echo "La contraseña no coinciden";
    }else{
        $pass_encriptada=password_hash($pas_alumno,PASSWORD_BCRYPT);
        $validar_repeticion="SELECT * FROM estudiante WHERE (Correo='$email_alumno' AND Usuario_estudiante != '$usuario_carnet') OR (Telefono='$telefono_alumno' AND Usuario_estudiante != '$usuario_carnet')";
        $resultado1=mysqli_query($con,$validar_repeticion);
        
    }
    if($resultado1=false){
        echo "Este usuario ya se encuentra registrado <br>";
    }else{
        if(empty($_POST['password']) && empty($_POST['password_rep'])){
            $modificar="UPDATE estudiante SET Edad='$años_alumno', Correo='$email_alumno', Telefono='$telefono_alumno' WHERE Usuario_estudiante='$usuario_carnet'";
            $resultado1=mysqli_query($con,$modificar);
        }else{
            $query_update=mysqli_query($con,"UPDATE estudiante SET Pass='$pass_encriptada', Edad='$años_alumno', Correo='$email_alumno', Telefono='$telefono_alumno' WHERE Usuario_estudiante ='$usuario_carnet'");
        }
        
    }if($query_update =true){
        echo "Informacion actualizada";
       header("Location:perfil_estudiante.php");
        
    }else{
        
        echo "Error al actualizar la informacion";
        header("Location:perfil_estudiante.php");
    }
    }

}

require 'views/modificar_usuario_estudiante.view.php';

?>