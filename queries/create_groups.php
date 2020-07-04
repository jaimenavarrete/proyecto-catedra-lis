<?php
//Llamada a la conexión a la base de datos
require_once ("../database/conn.php");
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
function get_idx($total,$added){
    $id = rand(0, $total-1);
    if(in_array($id, $added)){
        return get_idx($total, $added);
    }else{
        return $id;
    }
}
if(isset($_GET['create_groups'])){
    $s1 = $_GET['materia1'];
    $s2 = $_GET['materia2'];
    $n = $_GET["cupos"];
    
    $students_s1 = count_students($con, $s1);
    $students_s2 = count_students($con, $s2);    
    $students_m1 = count($students_s1);
    $students_m2 = count($students_s2);


    if ($students_m1 > $students_m2) {
        $substraction = $students_m1 - $students_m2;
        for ($i=0; $i < $substraction; $i++) { 
            array_pop($students_s1);
        }
    }else{
        $substraction = $students_m2 - $students_m1;
        for ($i=0; $i < $substraction; $i++) { 
            array_pop($students_s2);
        }
    }
    
    echo nl2br("\r\n");
    $all_students = array_merge($students_s1, $students_s2);
    
    $calculations = create_groups(count($all_students), $n);
    
    $groups = $calculations[0];
    $students_left_out = $calculations[1];
    shuffle($students_s1);
    
    $added = [];
    for ($i=0; $i < $groups; $i++) { 
        echo ("Grupo ".($i+1).": ");
        for ($j=0; $j < $n; $j++) { 
            $idx = get_idx(count($all_students), $added);
            array_push($added, $idx);
            echo $all_students[$idx]." ";
        }
        echo nl2br("\r\n");
    }
    
}

?>