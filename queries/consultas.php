<?php 
include("database/conn.php");
/*Consultas a la base de datos*/
/*Consulta a la tabla roles, permite mostrar en un select option el rol al momento de registrar un nuevo usuario desde la vista del Admin*/
$selecionar="SELECT * FROM roles WHERE Codigo_rol<=2";
$resultado=mysqli_query($con,$selecionar);

/*Consulta a la tabla escula, permite mostrarlos datos de esta tabla en la tabla de escuela desde la vista del Admin*/
$selecionar1="SELECT * FROM escuela";
$resultado1=mysqli_query($con,$selecionar1);

/*Consulta a la tabla carrera, permite mostrarlos datos de esta tabla en la tabla de carrera desde la vista del Admin*/
$selecionar2="SELECT * FROM carrera";
$resultado2=mysqli_query($con,$selecionar2);

/*Consulta a la tabla materia, permite mostrarlos datos de esta tabla en la tabla de materias desde la vista del Admin*/
$selecionar3="SELECT * FROM materia";
$resultado3=mysqli_query($con,$selecionar3); 

/*Consulta de las tablas empleado y rol*/
$selecionar4="SELECT Usuario_empleado, Nombres_empleado, Apellidos_empleado, Edad,Correo, Telefono, Nombre_rol, Activo, Hora_bloqueo FROM empleado INNER JOIN roles USING (Codigo_rol)";
$resultado4=mysqli_query($con,$selecionar4); 

/*Consulta de las tablas estudiante y rol*/
$selecionar5="SELECT Usuario_estudiante, Nombres_estudiante, Apellidos_estudiante, Edad,Correo, Telefono, Nombre_rol, Activo, Hora_bloqueo FROM estudiante INNER JOIN roles USING (Codigo_rol)";
$resultado5=mysqli_query($con,$selecionar5);

/*Consulta de la tabla materia*/
$selecionar6="SELECT Codigo_materia FROM materia";
$resultado6=mysqli_query($con,$selecionar6);

/*Consulta de la tabla grupo*/
$selecionar7="SELECT * FROM grupo";
$resultado7=mysqli_query($con,$selecionar7);

/*Consulta de las tablas estudiante y inscripcion*/
$selecionar8 = "SELECT Nombres_estudiante, Apellidos_estudiante, Usuario_estudiante, Correo, COUNT(Usuario_estudiante) Materias FROM 
inscripcion INNER JOIN estudiante USING(Usuario_estudiante) GROUP BY Usuario_estudiante HAVING Materias >1";
$resultado8=mysqli_query($con,$selecionar8);

/*Consulta de las tablas empleado y inscripcion*/
$selecionar9 = "SELECT Nombres_empleado, Apellidos_empleado, Usuario_empleado, Correo, COUNT(Usuario_empleado) Materias FROM 
inscripcion INNER JOIN empleado USING(Usuario_empleado) GROUP BY Usuario_empleado HAVING Materias >1";
$resultado9=mysqli_query($con,$selecionar9);

/*Consulta que permite tener los datos necesarios de grupos de proyectos*/
$selecionar10 = "SELECT Usuario_estudiante, Nombres_estudiante, Apellidos_estudiante, Correo, numero_grupo, Nombre_materia, Nombre_grupo, COUNT(numero_grupo) Integrantes FROM 
estudiante INNER JOIN grupo_proyecto ON estudiante.Grupo_proyecto = grupo_proyecto.Codigo_grupo_proyecto INNER JOIN materia 
ON(grupo_proyecto.Codigo_materia_uno AND Codigo_materia_dos) = materia.Codigo_materia INNER JOIN grupo USING(codigo_materia)
 WHERE numero_grupo > 0 GROUP BY Nombre_grupo HAVING Integrantes >1";
$resultado10=mysqli_query($con,$selecionar10);


?>