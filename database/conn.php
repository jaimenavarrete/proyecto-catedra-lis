<?php
$server = "localhost";
$user = "root";
$pass = "";
$db = "proyectolis";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$con = mysqli_connect($server, $user, $pass, $db, 3308);

if(!$con){
    echo("La conexión falló. ");
}

mysqli_set_charset($con,"utf8");

?>