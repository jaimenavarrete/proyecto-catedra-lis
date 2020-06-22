<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reportes</title>
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
    <h1>REPORTES GLOBALES</h1>
        <div id="format">
        <h2>Reportes por materias</h2>
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
    <h4 style="margin-top:-0.1em;" >Grupo:</h4>
    <select name="grupo" >
    <option value="">01T</option>
    </select>
    </div>
    <button type="submit" class="btn">Agregar materia</button>
        </div>
        
    </article>
</section>
<footer id="creditos">
<h5>Copyright © 2020-Universidad Don Bosco</h5>
 </footer>
</body>
</html>