<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscripción de materias</title>
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
        <h1>INSCRIPCION DE MATERIAS</h1>
        <div class="formtab">
            <h2>Proceso de inscripción</h2>

            <div class="search-container sc-downloader">
                <div class="select-container">
                    <h4>Materia:</h4>
                    <select name="materias" id="materias" class="materias">
                        <option value="">Matematica 1</option>
                        <option value="">Matematica 2</option>
                        <option value="">Matematica 3</option>
                    </select>
                </div>

                <div class="select-container">
                    <h4>Grupo teoria:</h4>
                    <select name="grupo" id="grupo" class="materias">
                        <option value="">01T</option>
                        <option value="">04T</option>
                        <option value="">02T</option>
                    </select>
                </div>
            </div>

            <div class="search-container sc-downloader">
                <div class="select-container">
                    <h4>Cupo:</h4>
                    <input type="text" name="cupos" id="cupos" readonly>
                </div>

                <div class="select-container">
                    <h4>Grupo laboratorio:</h4>
                    <select name="grupo" id="grupo" class="select_grupos_lab">
                        <option value="">01L</option>
                        <option value="">04L</option>
                        <option value="">02L</option>
                    </select>
                </div>
            </div>

            <div class="btn-inscribir">
                <input type="submit" id="btn-repo">
                <label for="btn-repo" class="btn">Agregar materia <i class="fa fa-plus icon" id="i-pdf-2"></i></label>
            </div>
        </div>
    </article>
</section>

<section>
    <article>
        <div class="formtab">
            <h2>Materias a inscribir</h2>
            <form action="" name="formulario" id="inscripcion">
                <div class="search-container">
                <div class="bar-scroll">
                    <table class="tablas">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre de la materia</th>
                                <th>Grupo de la materia</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tr>
                            <td>1</td>
                            <td>Lenguajes Interpretados en el servidor</td>
                            <td>01T</td>
                            <td><a href="#"><i class="fa fa-trash icon icon-delete"></i></a></td>
                        </tr> 
                        <tr>
                            <td>2</td>
                            <td>[Nombre de materia 2]</td>
                            <td>01T</td>
                            <td><a href="#"><i class="fa fa-trash icon icon-delete"></i></a></td>
                        </tr>
                    </table>
                </div>
                </div>
                <div class="btn-inscribir">
                    <input type="submit" id="btn-repo-2">
                    <label for="btn-repo-2" class="btn">Finalizar inscripción <i class="fa fa-check icon" id="i-pdf-2"></i></label>
                </div>
            </form>
        </div>
        </div>
    </article>
</section>

<div id="creditos">
    <h5>Copyright © 2020-Universidad Don Bosco</h5>
</div>
</body>
</html>