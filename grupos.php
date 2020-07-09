<?php
include("cn.php");


$iduser="CF176243";
$acum=0;


$consulta1="SELECT Usuario_estudiante, Nombre_grupo, Codigo_materia, Nombre_materia  FROM grupo INNER JOIN inscripcion 
USING (Codigo_grupo) INNER JOIN materia USING (Codigo_materia) WHERE Usuario_estudiante='$iduser'";
$resultado1=mysqli_query($conexion,$consulta1);

$consulta2="SELECT Usuario_estudiante, Nombre_grupo, Codigo_materia, Nombre_materia  FROM grupo INNER JOIN inscripcion 
USING (Codigo_grupo) INNER JOIN materia USING (Codigo_materia) WHERE Usuario_estudiante='$iduser'";
$resultado2=mysqli_query($conexion,$consulta2);





/*  Mostrar todos los datos de los grupos de las materias */
if(isset($_POST['materias']) ){
$nombre_materia=$_POST['materias'];
$nombre_grupo=$_POST['grupo'];

$mostrar="SELECT Nombres_estudiante, Correo, numero_grupo, Nombre_materia FROM estudiante INNER JOIN grupo_proyecto
ON estudiante.Grupo_proyecto=grupo_proyecto.Codigo_grupo_proyecto INNER JOIN materia ON (grupo_proyecto.Codigo_materia_uno AND Codigo_materia_dos)=materia.Codigo_materia 
WHERE Nombre_materia='$nombre_materia'";
$resultado3=mysqli_query($conexion,$mostrar);
}

/*  Mostrar todos los datos de los grupos actual de las materias */
$mostrar1="SELECT numero_grupo FROM grupo_proyecto";
$resultado4=mysqli_query($conexion,$mostrar1);

if(isset($_POST['lista-grupos']) ){
    $nombre_materia=$_POST['materias'];
    $nombre_grupo=$_POST['grupo'];
    
}

require 'views/grupos.view.php';

?>