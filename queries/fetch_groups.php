<?php
    // Activar la visualizacion en tipo JSON
    header("Content-type:application/json");
    require_once ("../database/conn.php");
    $stmt = "SELECT codigo_grupo_proyecto, numero_grupo FROM grupo_proyecto";
    $query = mysqli_query($con, $stmt);
    if(mysqli_num_rows($query)>0){
        while($row = mysqli_fetch_array($query)){
            $id = $row[0];
            $materia = $row[1];
            $result[] = array(
                "id" => $id,
                "materia" => $materia
            );
        }
    }

    echo json_encode($result);
?>