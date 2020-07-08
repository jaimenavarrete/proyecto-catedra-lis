
<?php
$server = "localhost";
$user = "root";
$passwd = "abc123";
$db = "proyectolis";
//Variable que almacena la cadena de conexión a la base de datos
$conexion = new mysqli($server, $user, $passwd, $db);
//$conexion=mysqli_connect("localhost","root","","proyectolis");
?>
/*
if(!$conexion){
    echo 'Error';
}else{
    echo 'Conexion exitosa';
}/*
