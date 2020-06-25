<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
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
    <section class="contenido-p">
    <article>
    <div id="rectangles-cont">
    <div id="rectanglep"></div>
    <div id="rectangles">
    <button type="submit" class="btn" style="top: 100px;">Modificar perfil<i class="fa fa-pencil icon" style="font-size:24px"></i></button>
    </div>
    <div id="rectangles1"></div>
    <div><img class="circular--squaremax" src="img/user.png" /></div>
    </div>
    <h1 id="fuente">PERFIL PERSONAL</h1>
    <div id="forminf">
    <form action="" name="formip">
    <div>
     <h2>Datos personales</h2>
     <hr id="line">
    <h4>Usuario:</h4>
    <h4>Nombres:</h4>
    <h4>Apellidos:</h4>
    <h4>Fecha de cumpleaños:</h4>
    <h4>Email:</h4>
    <h4>Edad:</h4>
    <h4>Numero de telefono:</h4>
    </div>
    </form>
    </div>
     <div id="format">
     <h2>Materias inscritas</h2>
     <hr id="line">
     
     <div id="formm">
         
         <h4 id="fontm" style="text-align: left;">Codigo:<b>LIS104</b> &nbsp  Grupo:<b>01T</b></h4>
         <h4 id="fontm">Nombre:</h4>
         <h3 style="text-align: center;">LENGUAJES INTERP. EN EL SERVIDOR</h3>
         <button type="submit" class="btn">Ver materia<i class="fa fa-arrow-circle-right icon" style="font-size:24px"></i></button>
     </div>
     <div id="formm">
         
         <h4 id="fontm" style="text-align: left;">Codigo:<b>LIS104</b>  Grupo:<b>01T</b></h4>
         <h4 id="fontm">Nombre:</h4>
         <h3 style="text-align: center;">LENGUAJES INTERP. EN EL SERVIDOR</h3>
         <button type="submit" class="btn">Ver materia<i class="fa fa-arrow-circle-right icon" style="font-size:24px"></i></button>
     </div>
     <div id="formm">
         
         <h4 id="fontm" style="text-align: left;">Codigo:<b>LIS104</b> &nbsp  Grupo:<b>01T</b></h4>
         <h4 id="fontm">Nombre:</h4>
         <h3 style="text-align: center;">LENGUAJES INTERP. EN EL SERVIDOR</h3>
         <button type="submit" class="btn">Ver materia<i class="fa fa-arrow-circle-right icon" style="font-size:24px"></i></button>
     </div>
     <div id="formm">
         
         <h4 id="fontm" style="text-align: left;">Codigo:<b>LIS104</b>  Grupo:<b>01T</b></h4>
         <h4 id="fontm" style="text-align: right;"></h4>
         <h4 id="fontm">Nombre:</h4>
         <h3 style="text-align: center;">LENGUAJES INTERP. EN EL SERVIDOR</h3>
         <button type="submit" class="btn" id="btn">Ver materia<i class="fa fa-arrow-circle-right icon" style="font-size:24px"></i></button>
     </div>
     </div>
    </article>
    </section>
    <div id="creditos" style="top: 76em;">
    <h5>Copyright © 2020-Universidad Don Bosco</h5>
    </div>
</body>
</html>