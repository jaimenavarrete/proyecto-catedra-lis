<?php
// Activar la visualizacion en tipo JSON
header("Content-type:application/json");
// Agregar la base de datos
include ("../database/conn.php");

// Consultas utilizadas
$stmt = "SELECT Usuario_estudiante, Nombres_estudiante, Apellidos_estudiante, Correo FROM estudiante
         WHERE Grupo_proyecto='" . $_POST['grupoProyecto'] . "'";
$query = mysqli_query($con, $stmt);

if(mysqli_num_rows($query) > 0){
    $contar = 1;

    while($row = mysqli_fetch_array($query)) {
        $nombre = $row['Nombres_estudiante'];
        $usuario = $row['Usuario_estudiante'];
        $apellido = $row['Apellidos_estudiante'];
        $correo = $row['Correo'];
        $return[] = array(
            "numero" => $contar,
            "nombres" => $nombre,
            "apellidos" => $apellido,
            "usuario" => $usuario,
            "correo" => $correo
        );

        $contar += 1;
    }
}

// Para evitar con caracteres especiales al generar el arreglo JSON
echo json_encode($return, JSON_UNESCAPED_UNICODE);

?>