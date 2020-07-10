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
                <label for="btn-repo" class="btn"><a href="fpdf/reportes_estudiantes_grupo.php" class="btn-a">Descargar PDF</a><i class="fa fa-file  icon" id="i-pdf"></i></label>
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
                        <th>Grupo</th>
                    </tr>
                </thead>
                <?php
                 $num2=0; 
                while($mostrar=mysqli_fetch_array($resultado10)){?>
                <tr>
                <td><?php echo ++$num2 ?></td>
                    <td><?php echo $mostrar['Nombres_estudiante'] ?></td>
                    <td><?php echo $mostrar['Apellidos_estudiante'] ?></td>
                    <td><?php echo $mostrar['Usuario_estudiante'] ?></td>
                    <td><?php echo $mostrar['Codigo_grupo_proyecto'] ?></td>
                </tr> 
                <?php 
                 }
                 ?>
            </table>
            </div>
        </div>

        <div class="formtab">
            <h2>Alumnos sin grupo</h2>
            <div class="search-container downloader-container sc-downloader">
                <div class="select-container sc">
                <label for="btn-repo" class="btn"><a href="fpdf/reportes_estudiantes_singrupo.php" class="btn-a">Descargar PDF</a><i class="fa fa-file  icon" id="i-pdf"></i></label>
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
                    </tr>
                </thead>
                <?php
                 $num3=0; 
                while($mostrar=mysqli_fetch_array($resultado11)){?>
                <tr>
                <td><?php echo ++$num3 ?></td>
                    <td><?php echo $mostrar['Nombres_estudiante'] ?></td>
                    <td><?php echo $mostrar['Apellidos_estudiante'] ?></td>
                    <td><?php echo $mostrar['Usuario_estudiante'] ?></td>
                </tr> 
                <?php 
                 }
                 ?>
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