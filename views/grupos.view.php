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
<div id="navegador">
    <nav>
        <ul>
            <div class="separador-links">
                <li><a href="perfil.php" class="imagen"><img class="circular--squaremin" src="img/user.png" /></a></li>
                <li><a href="perfil.php">Mi perfil<i class="fa fa-user icon"></i></a></li>
                <li><a href="#">Grupos<i class="fa fa-users icon"></i></a></li>
                <li><a href="inscripcion_materias.php">Inscripción <i class="fa fa-pencil-square-o icon"></i></a></li>
            </div>
            <div class="separador-links">
                <li><a href="login.php">Cerrar Sesión <i class="fa fa-sign-out icon"></i> </a></li>
            </div>
        </ul>
    </nav>
</div>
<section>
    <article>
        <h1>GRUPOS DE LAS MATERIAS</h1>
        <div id="formtab">
            <h2>Búsqueda de grupos por materia</h2>
            <form class="search-container">
                <div class="select-container">
                    <h4>Materia:</h4>
                    <select name="materias">
                        <option value="">Lenguajes interpretados en el servidor</option>
                    </select>
                </div>
                <div class="select-container">
                    <h4>Grupo:</h4>
                    <select name="grupo" >
                        <option value="" >01T</option>
                    </select>
                </div>
                <div class="select-container">
                    <input type="submit" id="btn-repo">
                    <label for="btn-repo" class="btn">Ver grupo <i class="fa fa-search icon" id="i-pdf"></i></label>
                </div>
            </form>
        </div>

        <div id="formtab">
            <h2>Información de la materia actual</h2>
            <table class="tablas">
                <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>Nombre de la materia</th>
                        <th>Grupo de la materia</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tr>
                    <td>LIS104</td>
                    <td>Lenguajes Intrepretados en el servidor</td>
                    <td>1T</td>
                    <td><a href="#"><i class="fa fa-pencil icon icon-modify"></i></a><a href="#"><i class="fa fa-trash icon icon-delete"></i></a></td>
                </tr>                     
            </table>
        </div>

        <div id="formtab">
            <h2>Información de los alumnos de la materia actual</h2>
            <table class="tablas">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre del alumno</th>
                        <th>Grupo del alumno</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tr>
                    <td>1</td>
                    <td>[Nombre del alumno 1]</td>
                    <td>Grupo 1</td>
                    <td><a href="#"><i class="fa fa-pencil icon icon-modify"></i></a> <a href="#"><i class="fa fa-trash icon icon-delete"></i></a></td>
                </tr> 
                <tr>
                    <td>2</td>
                    <td>[Nombre del alumno 2]</td>
                    <td>Grupo 2</td>
                    <td><a href="#"><i class="fa fa-pencil icon icon-modify"></i></a> <a href="#"><i class="fa fa-trash icon icon-delete"></i></a></td>
                </tr> 
                <tr>
                    <td>3</td>
                    <td>[Nombre del alumno 3]</td>
                    <td>[Sin grupo]</td>
                    <td><a href="#"><i class="fa fa-pencil icon icon-modify"></i></a> <a href="#"><i class="fa fa-trash icon icon-delete"></i></a></td>
                </tr> 
                <tr>
                    <td>4</td>
                    <td>[Nombre del alumno 4]</td>
                    <td>[Sin grupo]</td>
                    <td><a href="#"><i class="fa fa-pencil icon icon-modify"></i></a> <a href="#"><i class="fa fa-trash icon icon-delete"></i></a></td>
                </tr> 
                <tr>
                    <td>5</td>
                    <td>[Nombre del alumno 5]</td>
                    <td>Grupo 1</td>
                    <td><a href="#"><i class="fa fa-pencil icon icon-modify"></i></a> <a href="#"><i class="fa fa-trash icon icon-delete"></i></a></td>
                </tr> 
            </table>
        </div>

        <div id="formtab">
            <h2>Información de los grupos de la materia actual</h2>
            <form class="search-container">
                <div class="select-container">
                    <h4>Grupo:</h4>
                    <select name="lista-grupos" class="materias">
                        <option value="">Grupo 1</option>
                        <option value="">Grupo 2</option>
                    </select>
                </div>
                <div class="select-container">
                    <a href="#"><i class="fa fa-trash icon icon-delete"> </i></a>

                    <input type="submit" id="btn-grupos">
                    <label for="btn-grupos" class="btn">Formar Grupos <i class="fa fa-plus icon" id="i-pdf"></i></label>
                </div>
            </form>
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
                    <td><a href="#"><i class="fa fa-pencil icon icon-modify"></i></a></td>
                </tr> 
                <tr>
                    <td>2</td>
                    <td>[Nombre del alumno 2]</td>
                    <td>[Correo del alumno 2]</td>
                    <td><a href="#"><i class="fa fa-pencil icon icon-modify"></i></a></td>
                </tr> 
                <tr>
                    <td>3</td>
                    <td>[Nombre del alumno 3]</td>
                    <td>[Correo del alumno 3]</td>
                    <td><a href="#"><i class="fa fa-pencil icon icon-modify"></i></a></td>
                </tr> 
                <tr>
                    <td>4</td>
                    <td>[Nombre del alumno 4]</td>
                    <td>[Correo del alumno 4]</td>
                    <td><a href="#"><i class="fa fa-pencil icon icon-modify"></i></a></td>
                </tr> 
                <tr>
                    <td>5</td>
                    <td>[Nombre del alumno 5]</td>
                    <td>[Correo del alumno 5]</td>
                    <td><a href="#"><i class="fa fa-pencil icon icon-modify"></i></a></td>
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