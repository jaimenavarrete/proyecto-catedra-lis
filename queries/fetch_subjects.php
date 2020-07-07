<?php
// Activar la visualizacion en tipo JSON
header("Content-TYpe:application/json");
// Agregar la base de datos
include ("../database/conn.php");

// Consultas utilizadas
$stmt = "SELECT g.Nombre_grupo, m.Codigo_materia, m.Nombre_materia FROM materia m
         LEFT JOIN grupo g
         ON g.Codigo_materia = m.Codigo_materia";
$query = mysqli_query($con, $stmt);
if(mysqli_num_rows($query)>0){
    while($row = mysqli_fetch_array($query)){
        $codigo = $row['Codigo_materia'];
        $materia = $row['Nombre_materia'];
        $grupo = $row['Nombre_grupo'];
        $return[] = array(
            "codigo" => $codigo,
            "materia" => $materia,
            "grupo" => $grupo
        );
    }
}

echo json_encode($return);
?>