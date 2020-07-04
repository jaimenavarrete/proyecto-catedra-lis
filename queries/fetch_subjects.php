<?php
header("Content-TYpe:application/json");
include ("../database/conn.php");
$stmt = "SELECT Codigo_materia, Nombre_materia FROM materia";
$query = mysqli_query($con, $stmt);
if(mysqli_num_rows($query)>0){
    while($row = mysqli_fetch_array($query)){
        $id = $row['Codigo_materia'];
        $name = $row['Nombre_materia'];
        $return[] =array(
            "id" => $id,
            "name" => $name
        );
    }
}
echo json_encode($return);
?>