<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grupos</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="../css/styles.css"/>
    <link rel="stylesheet" href="../css/normalize.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body id="fondo">
<div id="navegador">
    <nav>
    <ul>
  <li><img class="circular--squaremin" src="img/user.png" /></li>
 <li><a href="Perfil.php">Mi perfil<i class="fa fa-user icon"></i></a></li>
 <li><a href="Grupos.php">Grupos<i class="fa fa-users icon"></i></a></li>
 <li><a href="inscripcon_materias.php">Incripción<i class="fa fa-pencil-square-o icon"></i></a></li>
 <li id="cerrar"><a href="login.php">Cerrar Sesión<i class="fa fa-sign-out icon"></i> </a></li>
 </ul>
 </nav>
 </div>
<section>
    <article>
        <br>
    <h1>GRUPOS DE LAS MATERIAS</h1>
        <div id="format">
        <h2>Búsqueda de grupos por materia</h2>
     <hr id="line">
     <br>
     <br>
     <div class="input-container-repo">
     <h4 style="margin-top:-0.1em;" >Materia:</h4>
    <select name="materias">
    <option value="">Lenguajes interpretados en el servidor</option>
    </select>
    </div>
    <div class="input-container-repo">
    <h4 style="margin-top:-0.1em;">Grupo:</h4>
    <select name="grupo" >
    <option value="" >01T</option>
    </select>
    </div>
    <button type="submit" class="btn" id="btn-repo">Ver grupo</button>
        </div>

        <div id="format">
    <form action="" class="form-horizontal" name="formulario" id="salario">
    <div>
    <h2>Información de la materia actual</h2>
    <hr id="line">
    </div>
    <br> 
    <div class="input-container">
        <table class="tablas">
            <thead>
                <tr>
                    <th>Codigo</th><th>Nombre de la materia</th><th>Grupo de la materia</th><th>Opciones</th>
                </tr>
            </thead>
          <tr>
              <td>LIS104</td><td>Lenguaje Intrepreado en el servidor</td><td>1T</td><td><a href="http://"><i class="fa fa-pencil  icon" style="background:#27AE60;"></i></a>&nbsp<a href="http://"><i class="fa fa-trash icon" style="background:#EB5757;"></i></a></td>
          </tr> 
          
        </table>
    </div>
    </form>
    </div>

    <div id="format">
    <form action="" class="form-horizontal" name="formulario" id="salario">
    <div>
    <h2>Información de los alumnos de la materia actual</h2>
    <hr id="line">
    </div>
    <button type="submit" class="btn" id="btn-repo" style="background:#27AE60;">Formar Grupos +</button>
    <br> 
    <br>
    <div class="input-container">
        <table class="tablas">
            <thead>
                <tr>
                    <th>#</th><th>Nombre del alumno</th><th>Grupo del alumno</th><th>Opciones</th>
                </tr>
            </thead>
          <tr>
              <td>1</td><td>[Nombre del alumno 1]</td><td>Grupo 1</td><td><a href="http://"><i class="fa fa-pencil  icon" style="background:#27AE60;"></i></a>&nbsp<a href="http://"><i class="fa fa-trash icon" style="background:#EB5757;"></i></a></td>
          </tr> 
          <tr>
              <td>2</td><td>[Nombre del alumno 2]</td><td>Grupo 2</td><td><a href="http://"><i class="fa fa-pencil  icon" style="background:#27AE60;"></i></a>&nbsp<a href="http://"><i class="fa fa-trash icon" style="background:#EB5757;"></i></a></td>
          </tr> 
          <tr>
              <td>3</td><td>[Nombre del alumno 3]</td><td>[Sin grupo]</td><td><a href="http://"><i class="fa fa-pencil  icon" style="background:#27AE60;"></i></a>&nbsp<a href="http://"><i class="fa fa-trash icon" style="background:#EB5757;"></i></a></td>
          </tr> 
          <tr>
              <td>4</td><td>[Nombre del alumno 4]</td><td>[Sin grupo]</td><td><a href="http://"><i class="fa fa-pencil  icon" style="background:#27AE60;"></i></a>&nbsp<a href="http://"><i class="fa fa-trash icon" style="background:#EB5757;"></i></a></td>
          </tr> 
          <tr>
              <td>5</td><td>[Nombre del alumno 5]</td><td>Grupo 1</td><td><a href="http://"><i class="fa fa-pencil  icon" style="background:#27AE60;"></i></a>&nbsp<a href="http://"><i class="fa fa-trash icon" style="background:#EB5757;"></i></a></td>
          </tr> 
        </table>
    </div>
    </form>
    </div>
        <br>
        <br>
        <br>
    </article>
</section>
<div id="creditos">
<h5>Copyright © 2020-Universidad Don Bosco</h5>
</div>
</body>
</html>