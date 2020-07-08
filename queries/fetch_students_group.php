<?php
// Activar la visualizacion en tipo JSON
header("Content-type:application/json");
// Agregar la base de datos
include ("../database/conn.php");

// $stmt = "SELECT e.Usuario_estudiante, e.Nombres_estudiante, e.Apellidos_estudiante, e.Correo FROM inscripcion i
//          INNER JOIN estudiante e
//          ON i.Usuario_estudiante = e.Usuario_estudiante
//          INNER JOIN grupo g
//          ON i.Codigo_grupo = g.Codigo_grupo
//          INNER JOIN grupo_proyecto gp
//          ON e.Grupo_proyecto = gp.Codigo_grupo_proyecto
//          WHERE e.Grupo_proyecto='" . $_POST['grupoProyecto'] . "' AND (gp.Codigo_materia_uno='" . $_POST['materia'] . "' OR gp.Codigo_materia_dos='" . $_POST['materia'] . "') AND g.Nombre_grupo ='" . $_POST['grupo'] . "'";

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