<?php

//Llamada a la conexión a la base de datos
require_once ("database/conn.php");
//Lista de estudiantes inscritos en una materia
function count_students($connection, $subject){
    $list = [];
    $stmt = "CALL fetch_students('$subject')";
    $query = mysqli_query($connection, $stmt);
    if(!$query){
        printf("Error: %s\n", mysqli_error($connection));
        return;
    }    
    if(mysqli_num_rows($query)>0){
        while($row = mysqli_fetch_array($query)){
            array_push($list, $row['Estudiantes-inscritos']); 
        }
    }

    mysqli_next_result($connection);
    return $list;
}
//Función que calcula la cantidad de grupos
function create_groups($total_students, $amount){
    $total_groups = floor($total_students/$amount);
    $students_out = $total_students - ($total_groups*$amount);
    return array($total_groups, $students_out);
}
//Función que genera indices aleatorios no repetidos
function get_idx($total,$added){
    $id = rand(0, $total-1);
    if(in_array($id, $added)){
        return get_idx($total, $added);
    }else{
        return $id;
    }
}
//Función para formar el nombre del grupo
function get_name($subject1, $subject2, $connection){
    $stmt = "CALL count_groups('$subject1', '$subject2')";
    $result = mysqli_query($connection, $stmt);
    if(!$result){
        echo "Error en la ejecución.";
        return;
    }
    $number = mysqli_fetch_array($result);
    $name = substr($subject1, 0, 3) . substr($subject2, 0, 3);
    $name = $name . ($number[0]+1);
    $return = array($name, $number[0]);
    mysqli_next_result($connection);
    return $return;
}
function insert_group($connection, $group_name, $employee, $sbjt1, $sbjt2, $group_number){
    $stmt = "CALL create_groups('$group_name', '$sbjt1', '$sbjt2', '$employee', $group_number)";
    $result = mysqli_query($connection, $stmt);
    if($result){
        mysqli_next_result($connection);
    }else{
        echo mysqli_error($connection). $stmt;
    }
}
//Función que asigna los estudiantes a cada grupo
function add_student($connection, $student, $group){
    $stmt = "CALL assign_group('$student', '$group')";
    $result = mysqli_query($connection, $stmt);
    if($result){
        mysqli_next_result($connection);   
    }else{
        echo mysqli_error($connection). $stmt;
    }
}
//Si le han hecho click al botón y la cantidad no es cero
if(isset($_GET['create_groups']) && isset($_GET["cupos"])){
    $s1 = $_GET['materia1'];
    $s2 = $_GET['materia2'];
    $n = $_GET["cupos"];
    //Listas de alumnos inscritos
    $students_s1 = count_students($con, $s1);
    $students_s2 = count_students($con, $s2);    
    //Cantidad de alumnos en cada materia
    $students_m1 = count($students_s1);
    $students_m2 = count($students_s2);
    //Array de estudiantes que quedan sin grupo
    $out = [];
    //Hacer los arrays del mismo tamaño
    if ($students_m1 > $students_m2) {
        $substraction = $students_m1 - $students_m2;
        for ($i=0; $i < $substraction; $i++) { 
            array_push($out,array_pop($students_s1));
        }
    }else{
        $substraction = $students_m2 - $students_m1;
        for ($i=0; $i < $substraction; $i++) { 
            array_push($out,array_pop($students_s2));
        }
    }
    echo nl2br("\r\n");
    //Combinar ambos arrays en uno solo
    $all_students = array_merge($students_s1, $students_s2);
    //Eliminar carnets repetidos
    $all_students = array_unique($all_students);
    $calculations = create_groups(count($all_students), $n);
    
    $groups = $calculations[0];
    $students_left_out = $calculations[1];

    //Crear los grupos, primer for para la cantidad de grupos
    $added = [];
    
    $empleado = $_SESSION['usuario'];

    for ($i=0; $i < $groups; $i++) {
        echo ("Grupo ".($i+1).": ");
        $name = get_name($s1, $s2, $con);
        $nombre_grupo = $name[0];
        $numero_grupo = $name[1]+1;
        insert_group($con, $nombre_grupo, $empleado, $s1, $s2, $numero_grupo);
        //Segundo for para los cupos de cada grupo
        for ($j=0; $j < $n; $j++) { 
            $idx = get_idx(count($all_students), $added);
            echo $all_students[$idx]." ";
            array_push($added, $idx);
            add_student($con, $all_students[$idx], $nombre_grupo);
        }
        echo nl2br("\r\n");
    }
    echo "Estudiante/s sin grupo: ";
    $studentswo_group = [];
    for ($o=0; $o < count($out); $o++) { 
        if(!in_array($out[$o],$all_students)){
            array_push($studentswo_group, $out[$o]);
        }
    }
    for ($u=0; $u < count($studentswo_group); $u++) { 
        echo $studentswo_group[$u];
    }
}

?>