<?php include("queries/consultas.php");?>
<?php
session_start();
if(!isset($_SESSION['usuario']) || $_SESSION['rol'] != 3){
    header("Location:index.php");
}else{
    $usuario = $_SESSION['usuario'];
    $rol = $_SESSION['rol'];
    echo $rol;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reportes</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="css/normalize.css"/>
    <link rel="stylesheet" href="css/styles.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&family=Montserrat:wght@300;400;700&display=swap" rel="stylesheet">
</head>
<body>
<?php require_once('headers/headers.php'); ?>
<section class="contenido">
    <article>
        <h1>REPORTES MATERIAS</h1>

        <div class="formtab">
            <h2>Docentes registrados</h2>
            <div class="search-container downloader-container sc-downloader">
            <form id='docentes' name='docentes'></form>
                <div class="select-container sc">
                   
                    <label for="btn-repo" class="btn"><a href="fpdf/reportes_docentes.php" class="btn-a">Descargar PDF</a><i class="fa fa-file  icon" id="i-pdf"></i></label>
                </div>
            </div>
            <div class="bar-scroll">
            <table class="tablas">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Usuario del docente</th>
                        <th>Correo electrónico</th>
                        <th>Materias dictadas</th>
                    </tr>
                </thead>
                <?php $num=0; 
                while($mostrar=mysqli_fetch_array($resultado9)){?>
                <tr>
                    <td><?php echo ++$num ?></td>
                    <td><?php echo $mostrar['Nombres_empleado'] ?></td>
                    <td><?php echo $mostrar['Apellidos_empleado'] ?></td>
                    <td><?php echo $mostrar['Usuario_empleado'] ?></td>
                    <td><?php echo $mostrar['Correo'] ?></td>
                    <td><?php echo $mostrar['Materias'] ?></td>
                </tr> 
                <?php 
                 }
                 ?>
            </table>
            </div>
            </form>
        </div>

        <div class="formtab">
            <h2>Estudiantes registrados</h2>
            <div class="search-container downloader-container sc-downloader">
            <form name="estudiante"></form>
                <div class="select-container sc">
                    <label for="btn-repo" class="btn"><a href="fpdf/reportes_estudiantes.php" class="btn-a">Descargar PDF</a><i class="fa fa-file  icon" id="i-pdf"></i></label>
                </div>
            </div>
            <div class="bar-scroll">
            <table class="tablas">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Usuario del alumno</th>
                        <th>Correo electrónico</th>
                        <th>Materias inscritas</th>
                    </tr>
                </thead>

                 <?php
                 $num1=0; 
                while($mostrar=mysqli_fetch_array($resultado8)){?>
                <tr>
                    <td><?php echo ++$num1 ?></td>
                    <td><?php echo $mostrar['Nombres_estudiante'] ?></td>
                    <td><?php echo $mostrar['Apellidos_estudiante'] ?></td>
                    <td><?php echo $mostrar['Usuario_estudiante'] ?></td>
                    <td><?php echo $mostrar['Correo'] ?></td>
                    <td><?php echo $mostrar['Materias'] ?></td>
                </tr> 
                <?php 
                 }
                 ?>
            </table>
        </div>
        </form>
        </div>

        <div class="formtab">
            <h2>Grupos formados</h2>
            <div class="search-container downloader-container sc-downloader">
                <div class="select-container sc">
                    <input type="submit" id="btn-repo">
                    <label for="btn-repo" class="btn">Descargar PDF<i class="fa fa-file  icon" id="i-pdf"></i></label>
                </div>
            </div>
            <div class="bar-scroll">
            <table class="tablas">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre de la materia</th>
                        <th>Grupo de la materia</th>
                        <th>Grupo de alumnos</th>
                        <th>Integrantes</th>
                    </tr>
                </thead>
                <tr>
                    <td>1</td>
                    <td>[Nombre de la materia 1]</td>
                    <td>01T</td><td>Grupo 1</td>
                    <td>1</td>
                </tr> 
                <tr>
                    <td>2</td>
                    <td>[Nombre de la materia 2]</td>
                    <td>01T</td><td>Grupo 2</td>
                    <td>2</td>
                </tr> 
                <tr>
                    <td>3</td>
                    <td>[Nombre de la materia 3]</td>
                    <td>01T</td>
                    <td>Grupo 3</td>
                    <td>5</td>
                </tr> 
                <tr>
                    <td>4</td>
                    <td>[Nombre de la materia 4]</td>
                    <td>01T</td>
                    <td>Grupo 4</td>
                    <td>2</td>
                </tr> 
                <tr>
                    <td>5</td>
                    <td>[Nombre de la materia 5]</td>
                    <td>01T</td>
                    <td>Grupo 5</td>
                    <td>3</td>
                </tr> 
            </table>
            </div>
        </div>

        <div class="formtab">
            <h2>Alumnos sin grupo</h2>
            <div class="search-container downloader-container sc-downloader">
                <div class="select-container sc">
                    <input type="submit" id="btn-repo">
                    <label for="btn-repo" class="btn">Descargar PDF<i class="fa fa-file  icon" id="i-pdf"></i></label>
                </div>
            </div>
            <div class="bar-scroll">
            <table class="tablas">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre del alumno</th>
                        <th>Correo electrónico</th>
                        <th>Nombre de la materia</th>
                        <th>Grupo de la materia</th>
                    </tr>
                </thead>
                <tr>
                    <td>1</td>
                    <td>[Nombre del alumno 1]</td>
                    <td>[Correo del alumno 1]</td>
                    <td>[Nombre de materia 1]</td>
                    <td>01T</td>
                </tr> 
                <tr>
                    <td>2</td>
                    <td>[Nombre del alumno 2]</td>
                    <td>[Correo del alumno 2]</td>
                    <td>[Nombre de materia 2]</td>
                    <td>01T</td>
                </tr> 
                <tr>
                    <td>3</td>
                    <td>[Nombre del alumno 3]</td>
                    <td>[Correo del alumno 3]</td>
                    <td>[Nombre de materia 3]</td>
                    <td>01T</td>
                </tr> 
                <tr>
                    <td>4</td>
                    <td>[Nombre del alumno 4]</td>
                    <td>[Correo del alumno 4]</td>
                    <td>[Nombre de materia 4]</td>
                    <td>02T</td>
                </tr> 
                <tr>
                    <td>5</td>
                    <td>[Nombre del alumno 5]</td>
                    <td>[Correo del alumno 5]</td>
                    <td>[Nombre de materia 5]</td>
                    <td>02T</td>
                </tr> 
            </table>
        </div>
        </div>
    </article>
</section>

<div id="creditos">
    <h5>Copyright © 2020-Universidad Don Bosco</h5>
</div>
</body>
</html>