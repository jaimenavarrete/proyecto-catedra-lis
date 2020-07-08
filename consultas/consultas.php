<?php 
include("cn.php");
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

$selecionar4="SELECT Usuario_empleado, Nombres_empleado, Apellidos_empleado, Edad,Correo, Telefono, Nombre_rol, Activo, Hora_bloqueo FROM empleado INNER JOIN roles USING (Codigo_rol)";
$resultado4=mysqli_query($conexion,$selecionar4); 

$selecionar5="SELECT Usuario_estudiante, Nombres_estudiante, Apellidos_estudiante, Edad,Correo, Telefono, Nombre_rol, Activo, Hora_bloqueo FROM estudiante INNER JOIN roles USING (Codigo_rol)";
$resultado5=mysqli_query($conexion,$selecionar5);

$selecionar6="SELECT Codigo_materia FROM materia";
$resultado6=mysqli_query($conexion,$selecionar6);

$selecionar7="SELECT * FROM grupo";
$resultado7=mysqli_query($conexion,$selecionar7);

?>