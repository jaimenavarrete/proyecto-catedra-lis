<?php

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once('database/conn.php');

    $grupo = $_POST['grupo1'];
    $materia = $_POST['materia1'];

    $stmt = "SELECT g.Nombre_grupo, g.Codigo_materia, m.Nombre_materia FROM grupo g
             INNER JOIN materia AS m
             ON g.Codigo_materia = m.Codigo_materia
             WHERE g.Nombre_grupo='$grupo' && m.Codigo_materia='$materia'";
    $query = mysqli_query($con, $stmt);
}

require 'views/grupos.view.php';

?>