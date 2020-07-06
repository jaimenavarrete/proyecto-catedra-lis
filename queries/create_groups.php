<?php
require_once ("../database/conn.php");

function count_students($connection, $subject){
    $stmt = "CALL count_registers('$subject')";
    $query = mysqli_query($connection, $stmt);
    if(!$query){
        printf("Error: %s\n", mysqli_error($connection));
    }    
    $result = mysqli_fetch_array($query, MYSQLI_NUM);
    $number = $result[0];

    mysqli_next_result($connection);
    return $number;
}
function create_groups($n1, $n2, $amount){
    $total_students = $n1 + $n2;
    $total_groups = floor($total_students/$amount);
    $students_out = $total_students - ($total_groups*$amount);
    return array($total_groups, $students_out);
}
if(isset($_GET['create_groups'])){
    $s1 = $_GET['materia1'];
    $s2 = $_GET['materia2'];
    $n = $_GET["cupos"];
    
    $students_s1 = count_students($con, $s1);
    $students_s2 = count_students($con, $s2);
    
    list($groups, $students) = create_groups($students_s1, $students_s2, $n);
    echo $groups. "\n";
    echo $students;
}

?>