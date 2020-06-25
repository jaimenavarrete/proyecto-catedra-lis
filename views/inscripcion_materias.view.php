<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscripción de materias</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="css/styles.css"/>
    <link rel="stylesheet" href="css/normalize.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&family=Montserrat:wght@300;400;700&display=swap" rel="stylesheet">
</head>
<body id="fondo">
<header>
<div id="navegador">
<input type="checkbox" id="menu-bar">
<label for="menu-bar" class="fa fa-bars icon" style="font-size:28px"></label>
<img class="circular--squaremin" src="img/user.png" />
<a href="login.php" class="cerrar">Cerrar Sesión<i class="fa fa-sign-out icon"></i> </a>
    <nav class="menu">
<ul>
 <li><a href="perfil.php">Mi perfil<i class="fa fa-user icon"></i></a></li>
 <li><a href="grupos.php">Grupos<i class="fa fa-users icon"></i></a></li>
 <li><a href="inscripcion_materias.php">Incripción<i class="fa fa-pencil-square-o icon"></i></a></li>
 <li class="cerrar-m"><a href="login.php">Cerrar Sesión<i class="fa fa-sign-out icon"></i> </a></li>
 </ul>
 </nav>
 </div>
 </header>
    <section class="contenido">
    <article>
    <h1>INSCRIPCION DE MATERIAS</h1>
    <div id="formtab">
    <div>
    <h2>Proceso de inscripción</h2>
    <hr id="line">
    </div>

    <div class="input-container-repo">
    <h4 style="margin-top:-0.1em; padding:5px;" >Materia:</h4>
    <select name="materias" id="materias">
    <option value="">Matematica 1</option>
    <option value="">Matematica 2</option>
    <option value="">Matematica 3</option>
    </select>
    <h4 style="margin-top:-0.1em;" class="select_grupos_nombre">Grupo teoria:</h4>
    <select name="grupo" id="grupo" class="select_grupos_teoria">
    <option value="">01T</option>
    <option value="">04T</option>
    <option value="">02T</option>
    </select>
    </div>
    
    <div class="input-container-repo">
    <h4 style="margin-top:-0.1em; margin-left: 5.5px; ">Cupo:</h4>
        <input type="text" name="cupos" id="cupos" style="margin-left: 1.5em; width: 140px;" readonly>
    
    <h4 style="margin-top:-0.1em;" class="nombre_grupos_lab">Grupo laboratorio:</h4>
    <select name="grupo" id="grupo" class="select_grupos_lab">
    <option value="">01L</option>
    <option value="">04L</option>
    <option value="">02L</option>
    </select>
    </div>
    <button type="submit" class="btn" id="btn-repo" >Agregar materia +</button>
    </div>

    <div id="formtab">
    <div>
    <h2>Materias a inscribir</h2>
    <hr id="line">
    </div>
    <br> 
    <div class="input-container">
        <table class="tablas">
            <thead>
                <tr>
                    <th>#</th><th>Nombre de la materia</th><th>Grupo de la materia</th><th>Remover</th>
                </tr>
            </thead>
          <tr>
              <td>1</td><td>Lenguaje Intrepreado en el servidor</td><td>1T</td><td><a href="http://"><i class="fa fa-trash icon" style="background:#EB5757;"></i></a></td>
          </tr> 
          <tr>
              <td>1</td><td>Lenguaje Intrepreado en el servidor</td><td>10T</td><td><a href="http://"><i class="fa fa-trash icon" style="background:#EB5757;"></i></a></td>
          </tr>  
        </table>
    </div>

    

    <button type="submit" class="btn" id="btn-repo" style="background:#27AE60;">Finalizar inscripción</button>
    </div>
    </article>
    </section>
    <div id="creditos" style="top: 66em;">
   <h5>Copyright © 2020-Universidad Don Bosco</h5>
</div> 
</body>
</html>