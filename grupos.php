<?php

session_start();

$rolUsuario = $_SESSION['rol'];
$usuarioEstudiante = $_SESSION['usuario'];

if(!isset($rolUsuario)) {
    header('Location: login.php');
}

$query1 = '';
$query2 = '';

function mostrarMateriasTabla($consulta) {
    if(isset($_POST['materia'])) {
        if(mysqli_num_rows($consulta)>0){
            while($row = mysqli_fetch_array($consulta)){
                $codigo = $row['Codigo_materia'];
                $materia = $row['Nombre_materia'];
                $grupo = $row['Nombre_grupo'];

                $fila = '<tr><td>'. $codigo .'</td>';
                $fila .= '<td>'. $materia .'</td>';
                $fila .= '<td>'. $grupo .'</td></tr>';
            }
        }
        else {
            $fila = "<tr><td colspan='3' class='tabla-vacia'>No puede acceder a esta materia</td></tr>";
        }
    }        
    else {
        $fila = "<tr><td colspan='3' class='tabla-vacia'>No hay materias elegidas actualmente</td></tr>";
    }     
    
    return $fila;
}

function mostrarAlumnosTabla($consulta) {
    if(isset($_POST['materia'])) {
        if(mysqli_num_rows($consulta)>0){
            $contar = 1;
            $fila = '';

            while($row = mysqli_fetch_array($consulta)){
                $nombre = $row['Nombres_estudiante'];
                $apellido = $row['Apellidos_estudiante'];
                $correo = $row['Correo'];
                $grupoProyecto = $row['numero_grupo'];

                $fila .= '<tr><td>' . $contar . '</td>';
                $fila .= '<td>' . $apellido . ', ' . $nombre . '</td>';
                $fila .= '<td>' . $correo . '</td>';
                
                if(isset($grupoProyecto)) {
                    $fila .= '<td>Grupo '. ($grupoProyecto+1) . '</td></tr>';
                }
                else{
                    $fila .= '<td>0</td></tr>';
                }

                $contar += 1;
            }
        }
        else {
            $fila = "<tr><td colspan='4' class='tabla-vacia'>No hay alumnos inscritos actualmente en este grupo</td></tr>";
        }
    }        
    else {
        $fila = "<tr><td colspan='4' class='tabla-vacia'>No hay materias elegidas actualmente</td></tr>";
    }     
    
    return $fila;
}

function mostrarGruposTabla($consulta) {
    if(isset($_POST['materia'])) {
        if(mysqli_num_rows($consulta)>0){
            $fila = "<option value='#'>Seleccionar grupo</option>";

            if($rolUsuario != 1) {
                $fila .= "<option value='0'>[Sin grupo]</option>";
            }

            while($row = mysqli_fetch_array($consulta)){
                $grupoProyecto = $row['Codigo_grupo_proyecto'];
                $numeroGrupo = $row['numero_grupo'];

                $fila .= "<option value='$grupoProyecto'>Grupo " . $numeroGrupo . "</option>";
            }
        }
        else {
            $fila = "<option value='#'>[Sin grupos]</option>";
        }
    }        
    else {
        $fila = "<option value='#'>[Sin grupos]</option>";
    }     
    
    return $fila;
}

// Inicializacion de variables obtenidas por metodo POST y creacion de sentencias

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once('database/conn.php');

    $grupo = $_POST['grupo'];
    $materia = $_POST['materia'];

    // Buscar en la base de datos, las materias que se han seleccionado
    $stmt1 = "SELECT g.Nombre_grupo, g.Codigo_materia, m.Nombre_materia FROM grupo g
             INNER JOIN materia AS m
             ON g.Codigo_materia = m.Codigo_materia
             WHERE g.Nombre_grupo='$grupo' && m.Codigo_materia='$materia'";
    $query1 = mysqli_query($con, $stmt1);

    // Buscar en la base de datos, los alumnos pertenecientes a las materias y grupos
    $stmt2 = "SELECT e.Nombres_estudiante, e.Apellidos_estudiante, e.Correo, e.Grupo_proyecto, gp.numero_grupo FROM inscripcion i
             LEFT JOIN estudiante AS e
             ON i.Usuario_estudiante = e.Usuario_estudiante
             LEFT JOIN grupo_proyecto AS gp
             ON e.Grupo_proyecto = gp.Codigo_grupo_proyecto
             LEFT JOIN grupo AS g
             ON i.Codigo_grupo = g.Codigo_grupo
             WHERE g.Nombre_grupo='$grupo' && g.Codigo_materia='$materia'
             ORDER BY e.Apellidos_estudiante";
    $query2 = mysqli_query($con, $stmt2);

    // Buscar en la base de datos, los grupos actuales que pertenezcan a las materias colocadas
    if($rolUsuario != 1) {
        $stmt3 = "SELECT Codigo_grupo_proyecto, numero_grupo FROM grupo_proyecto
                  WHERE Codigo_materia_uno='$materia' OR Codigo_materia_dos='$materia'";
    }
    else {
        $stmt3 = "SELECT Codigo_grupo_proyecto, numero_grupo FROM grupo_proyecto gp
                  INNER JOIN estudiante AS e
                  ON gp.Codigo_grupo_proyecto = e.Grupo_proyecto
                  WHERE (gp.Codigo_materia_uno='$materia' OR gp.Codigo_materia_dos='$materia') AND e.Usuario_estudiante='$usuarioEstudiante'";
    }
    $query3 = mysqli_query($con, $stmt3);
    $query4 = mysqli_query($con, $stmt3);
}

require 'views/grupos.view.php';

?>