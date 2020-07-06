<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grupos</title>
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

    <!-- Ventanas emergentes (Pop-ups) -->

    <?php 
        require('popups/quitar-alumno-grupo.php'); 
        require('popups/modificar-alumno-grupo.php'); 
    ?>

    <!-- Fin de ventanas emergentes -->

    <article>
        <h1>GRUPOS DE LAS MATERIAS</h1>
        <div class="formtab">
            <h2>Búsqueda de grupos por materia</h2>
            <form action="">
                <div class="search-container">
                    <div class="select-container sc">
                        <h4>Materia 1:</h4>
                        <select name="materias" class="materias">
                            <option value="">Lenguajes interpretados en el servidor</option>
                        </select>
                    </div>
                    <div class="select-container sc">
                        <h4>Grupo 1:</h4>
                        <select name="grupo" >
                            <option value="" >01T</option>
                        </select>
                    </div>
                </div>
                <div class="search-container">
                    <div class="select-container sc">
                        <h4>Materia 2:</h4>
                        <select name="materias" class="materias">
                            <option value="">Lenguajes interpretados en el servidor</option>
                        </select>
                    </div>
                    <div class="select-container sc">
                        <h4>Grupo 2:</h4>
                        <select name="grupo" >
                            <option value="" >01T</option>
                        </select>
                    </div>
                </div>
                <div class="search-container">
                    <div class="select-container sc">
                        <input type="submit" id="btn-repo">
                        <label for="btn-repo" class="btn btn-g">Ver grupo <i class="fa fa-search icon" id="i-pdf"></i></label>
                    </div>
                </div>
            </form>
        </div>

        <div class="formtab">
            <h2>Información de la materia actual</h2>
            <div class="bar-scroll">
            <table class="tablas">
                <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>Nombre de la materia</th>
                        <th>Grupo de la materia</th>
                    </tr>
                </thead>
                <tr>
                    <td>LIS104</td>
                    <td>Lenguajes Intrepretados en el servidor</td>
                    <td>1T</td>
                </tr>                     
            </table>
        </div>
        </div>
        <div class="formtab">
            <h2>Información de los alumnos de la materia actual</h2>
            <div class="bar-scroll">
            <table class="tablas">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre del alumno</th>
                        <th>Correo electronico</th>
                        <th>Grupo del alumno</th>                        
                    </tr>
                </thead>
                <tr>
                    <td>1</td>
                    <td>[Nombre del alumno 1]</td>
                    <td>[Correo del alumno 1]</td>
                    <td>1</td>
                </tr> 
                <tr>
                    <td>2</td>
                    <td>[Nombre del alumno 2]</td>
                    <td>[Correo del alumno 2]</td>
                    <td>2</td>
                </tr> 
                <tr>
                    <td>3</td>
                    <td>[Nombre del alumno 3]</td>
                    <td>[Correo del alumno 3]</td>
                    <td>0</td>
                </tr> 
                <tr>
                    <td>4</td>
                    <td>[Nombre del alumno 4]</td>
                    <td>[Correo del alumno 4]</td>
                    <td>0</td>
                </tr> 
                <tr>
                    <td>5</td>
                    <td>[Nombre del alumno 5]</td>
                    <td>[Correo del alumno 5]</td>
                    <td>1</td>
                </tr> 
            </table>
        </div>
        </div>

        <div class="formtab">
            <h2>Información de los grupos de la materia actual</h2>
            <form class="search-container sc-tab" action="crear_grupos.php">
                <div class="select-container sc">
                    <h4>Grupo:</h4>
                    <select name="lista-grupos" class="grupo-creacion">
                        <option value="">Grupo 1</option>
                        <option value="">Grupo 2</option>
                    </select>

                    <input type="submit" id="btn-borrar-grupo">
                    <label for="btn-borrar-grupo"><i class="fa fa-trash icon icon-delete"> </i></label>
                </div>
                <div class="select-container sc">
                    <!-- <a href="#" class="trash"><i class="fa fa-trash icon icon-delete"> </i></a>  -->
                    <input type="submit" id="btn-grupos">
                    <label for="btn-grupos" class="btn">Formar Grupos <i class="fa fa-plus icon" id="i-pdf"></i></label>
                </div>
            </form>
            <div class="bar-scroll">
            <table class="tablas">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre del alumno</th>
                        <th>Correo electrónico</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tr>
                    <td>1</td>
                    <td>[Nombre del alumno 1]</td>
                    <td>[Correo del alumno 1]</td>
                    <td>
                        <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                            <input type="hidden" name="carnet" value="NC180383">
                            <input type="submit" id="modificar-alumno" name="modificar-alumno">
                            <input type="submit" id="quitar-alumno" name="quitar-alumno">
                            <label for="modificar-alumno" class="btn-popup-modificar-grupo"><i class="fa fa-pencil icon icon-modify"></i></label> <label for="quitar-alumno" class="btn-popup-modificar-grupo"><i class="fa fa-trash icon icon-delete"></i></a>
                        </form>
                    </td>
                    <!-- <td><a href="#" class="btn-popup-modificar-grupo"><i class="fa fa-pencil icon icon-modify"></i></a></td> -->
                </tr> 
                <tr>
                    <td>2</td>
                    <td>[Nombre del alumno 2]</td>
                    <td>[Correo del alumno 2]</td>
                    <td><a href="#"><i class="fa fa-pencil icon icon-modify"></i></a> <a href="#"><i class="fa fa-trash icon icon-delete"></i></a></td>
                    <!-- <td><a href="#" class="btn-popup-modificar-grupo"><i class="fa fa-pencil icon icon-modify"></i></a></td> -->
                </tr> 
                <tr>
                    <td>3</td>
                    <td>[Nombre del alumno 3]</td>
                    <td>[Correo del alumno 3]</td>
                    <td><a href="#"><i class="fa fa-pencil icon icon-modify"></i></a> <a href="#"><i class="fa fa-trash icon icon-delete"></i></a></td>
                    <!-- <td><a href="#" class="btn-popup-modificar-grupo"><i class="fa fa-pencil icon icon-modify"></i></a></td> -->
                </tr> 
                <tr>
                    <td>4</td>
                    <td>[Nombre del alumno 4]</td>
                    <td>[Correo del alumno 4]</td>
                    <td><a href="#"><i class="fa fa-pencil icon icon-modify"></i></a> <a href="#"><i class="fa fa-trash icon icon-delete"></i></a></td>
                    <!-- <td><a href="#" class="btn-popup-modificar-grupo"><i class="fa fa-pencil icon icon-modify"></i></a></td> -->
                </tr> 
                <tr>
                    <td>5</td>
                    <td>[Nombre del alumno 5]</td>
                    <td>[Correo del alumno 5]</td>
                    <td><a href="#"><i class="fa fa-pencil icon icon-modify"></i></a> <a href="#"><i class="fa fa-trash icon icon-delete"></i></a></td>
                    <!-- <td><a href="#" class="btn-popup-modificar-grupo"><i class="fa fa-pencil icon icon-modify"></i></a></td> -->
                </tr> 
            </table>
        </div>
        </div>
    </article>
</section>

<div id="creditos">
    <h5>Copyright © 2020-Universidad Don Bosco</h5>
</div>

<script src="js/popup.js"></script>
</body>
</html>