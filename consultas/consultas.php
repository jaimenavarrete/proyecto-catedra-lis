<?php
include("consultas/cn.php");
/*Consultas a la base de datos*/
/*Consulta a la tabla roles, permite mostrar en un select option el rol al momento de registrar un nuevo usuario desde la vista del Admin*/
$selecionar="SELECT * FROM roles WHERE Codigo_rol<=2";
$resultado=mysqli_query($conexion,$selecionar);

/*Consulta a la tabla escula, permite mostrarlos datos de esta tabla en la tabla de escuela desde la vista del Admin*/
$selecionar1="SELECT * FROM escuela";
$resultado1=mysqli_query($conexion,$selecionar1);

/*Consulta a la tabla carrera, permite mostrarlos datos de esta tabla en la tabla de carrera desde la vista del Admin*/
$selecionar2="SELECT * FROM carrera";
$resultado2=mysqli_query($conexion,$selecionar2);

/*Consulta a la tabla materia, permite mostrarlos datos de esta tabla en la tabla de materias desde la vista del Admin*/
$selecionar3="SELECT * FROM materia";
$resultado3=mysqli_query($conexion,$selecionar3);

mysqli_close($conexion);
?>
