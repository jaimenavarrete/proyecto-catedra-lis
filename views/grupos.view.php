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
        if($rolUsuario != 1) {
            require_once('popups/quitar-alumno-grupo.php'); 
            require_once('popups/modificar-alumno-grupo.php'); 
            require_once('popups/borrar-grupo.php');
        } 
    ?>

    <!-- Fin de ventanas emergentes -->

    <article>
        <h1>GRUPOS DE LAS MATERIAS</h1>

        <div class="formtab">
            <h2>Búsqueda de grupos por materia</h2>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" id="form-materia-grupo">
                <div class="search-container">
                    <div class="select-container sc">
                        <h4>Materia:</h4>
                        <select name="materia" id="materia" class="materias" required>
                        </select>
                    </div>
                    <div class="select-container sc">
                        <h4>Grupo:</h4>
                        <select name="grupo" id="grupo" required>
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
            <h2>Información de las materias actuales</h2>
            <div class="bar-scroll">
                <table class="tablas" id="materias-actuales">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Nombre de la materia</th>
                            <th>Grupo de la materia</th>
                        </tr>
                    </thead>

                    <?php echo mostrarMateriasTabla($query1); ?>

                </table>
            </div>
        </div>

        <?php if($rolUsuario != 1) : ?>
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

                        <?php echo mostrarAlumnosTabla($query2); ?>

                    </table>
                </div>
            </div>
        <?php endif ?>

        <?php //if(isset($rolUsuario) && $rolUsuario != 1) : ?>
            
        <?php //endif ?>

        <div class="formtab">
            <h2>Información de los grupos de la materia actual</h2>
            <div class="search-container sc-tab">
                <form class="select-container sc">
                    <h4>Grupo:</h4>
                    <select name="lista-grupos" id="lista-grupos" class="grupo-creacion" onchange="mostrarAlumnosGrupo();">
                        <?php echo mostrarGruposTabla($query4); ?>
                    </select>
                    <?php if($rolUsuario != 1) : ?>
                        <a href='#' class='btn-popup-borrar-grupo' group='' id="btn-popup-borrar-grupo"><i class="fa fa-trash icon icon-delete"></i></a>
                    <?php endif ?>
                </form>
                <?php if($rolUsuario != 1) : ?>
                    <div class="select-container sc">
                        <a href="crear_grupos.php" class="btn">Formar Grupos <i class="fa fa-plus icon" id="i-pdf"></i></a>
                    </div>
                <?php endif ?>
                
            </div>
            <div class="bar-scroll">
            <table class="tablas" id="alumnos-grupo">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre del alumno</th>
                        <th>Correo electrónico</th>
                        <?php if($rolUsuario != 1) : ?>
                            <th>Opciones</th>
                        <?php endif ?>
                    </tr>
                </thead>
                <tr>
                    <td colspan='4' class='tabla-vacia'>No hay alumnos en este grupo de proyecto</td>
                </tr>
            </table>
        </div>
        </div>
    </article>
</section>

<div id="creditos">
    <h5>Copyright © 2020-Universidad Don Bosco</h5>
</div>

<!-- Scripts a ejecutar en la pagina -->

<script src="js/jquery-3.4.1.min.js" type="text/javascript"></script>
<script src="js/ajax.js"></script>
<script src="js/popup.js"></script>

</body>
</html>