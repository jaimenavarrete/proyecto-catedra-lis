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
<header>
<div id="navegador">
<input type="checkbox" id="menu-bar">
<label for="menu-bar" class="fa fa-bars icon" style="font-size:36px"></label>
<a href="perfil.php"><img class="circular--squaremin" src="img/user.png" /></a>
<a href="login.php" class="cerrar">Cerrar Sesión <i class="fa fa-sign-out icon"></i> </a>
    <nav class="menu">
        <ul>
            <div class="separador-links">
                <li><a href="perfil.php">Mi perfil<i class="fa fa-user icon"></i></a></li>
                <li><a href="grupos.php">Grupos<i class="fa fa-users icon"></i></a></li>
                <li><a href="inscripcion_materias.php">Inscripción <i class="fa fa-pencil-square-o icon"></i></a></li>
                <li><a href="reportes.php">Reportes <i class="fa fa-book icon"></i></a></li>
                <li class="cerrar-m" ><a href="login.php">Cerrar Sesión <i class="fa fa-sign-out icon"></i> </a></li>
                </div>
        </ul>
    </nav>
</div>
</header>
<section class="contenido">
    <article>
        <h1>REPORTES MATERIAS</h1>

        <div class="formtab">
            <h2>Docentes registrados</h2>
            <div class="search-container downloader-container sc-downloader">
                <div class="select-container">
                    <input type="submit" id="btn-repo">
                    <label for="btn-repo" class="btn">Descargar PDF<i class="fa fa-file  icon" id="i-pdf"></i></label>
                </div>
            </div>
            <table class="tablas">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre del docente</th>
                        <th>Usuario del docente</th>
                        <th>Correo electrónico</th>
                        <th>Materias dictadas</th>
                    </tr>
                </thead>
                <tr>
                    <td>1</td>
                    <td>[Nombre del docente 1]</td>
                    <td>[Usuario del docente 1]</td>
                    <td>[Correo del docente 1]</td>
                    <td>1</td>
                </tr> 
                <tr>
                    <td>2</td>
                    <td>[Nombre del docente 2]</td>
                    <td>[Usuario del docente 2]</td>
                    <td>[Correo del docente 2]</td>
                    <td>2</td>
                </tr> 
                <tr>
                    <td>3</td>
                    <td>[Nombre del docente 3]</td>
                    <td>[Usuario del docente 3]</td>
                    <td>[Correo del docente 3]</td>
                    <td>5</td>
                </tr> 
                <tr>
                    <td>4</td>
                    <td>[Nombre del docente 4]</td>
                    <td>[Usuario del docente 4]</td>
                    <td>[Correo del docente 4]</td>
                    <td>2</td>
                </tr> 
                <tr>
                    <td>5</td>
                    <td>[Nombre del docente 5]</td>
                    <td>[Usuario del docente 5]</td>
                    <td>[Correo del docente 5]</td>
                    <td>3</td>
                </tr> 
            </table>
        </div>

        <div class="formtab">
            <h2>Alumnos registrados</h2>
            <div class="search-container downloader-container sc-downloader">
                <div class="select-container">
                    <input type="submit" id="btn-repo">
                    <label for="btn-repo" class="btn">Descargar PDF<i class="fa fa-file  icon" id="i-pdf"></i></label>
                </div>
            </div>
            <table class="tablas">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre del alumno</th>
                        <th>Usuario del alumno</th>
                        <th>Correo electrónico</th>
                        <th>Materias inscritas</th>
                    </tr>
                </thead>
                <tr>
                    <td>1</td>
                    <td>[Nombre del alumno 1]</td>
                    <td>[Usuario del alumno 1]</td>
                    <td>[Correo del alumno 1]</td>
                    <td>5</td>
                </tr> 
                <tr>
                    <td>2</td>
                    <td>[Nombre del alumno 2]</td>
                    <td>[Usuario del alumno 2]</td>
                    <td>[Correo del alumno 2]</td>
                    <td>5</td>
                </tr> 
                <tr>
                    <td>3</td>
                    <td>[Nombre del alumno 3]</td>
                    <td>[Usuario del alumno 3]</td>
                    <td>[Correo del alumno 3]</td>
                    <td>4</td>
                </tr> 
                <tr>
                    <td>4</td>
                    <td>[Nombre del alumno 4]</td>
                    <td>[Usuario del alumno 4]</td>
                    <td>[Correo del alumno 4]</td>
                    <td>3</td>
                </tr> 
                <tr>
                    <td>5</td>
                    <td>[Nombre del alumno 5]</td>
                    <td>[Usuario del alumno 5]</td>
                    <td>[Correo del alumno 5]</td>
                    <td>4</td>
                </tr> 
            </table>
        </div>

        <div class="formtab">
            <h2>Grupos formados</h2>
            <div class="search-container downloader-container sc-downloader">
                <div class="select-container">
                    <input type="submit" id="btn-repo">
                    <label for="btn-repo" class="btn">Descargar PDF<i class="fa fa-file  icon" id="i-pdf"></i></label>
                </div>
            </div>
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
                <div class="select-container">
                    <input type="submit" id="btn-repo">
                    <label for="btn-repo" class="btn">Descargar PDF<i class="fa fa-file  icon" id="i-pdf"></i></label>
                </div>
            </div>
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
    </article>
</section>

<div id="creditos">
    <h5>Copyright © 2020-Universidad Don Bosco</h5>
</div>
</body>
</html>