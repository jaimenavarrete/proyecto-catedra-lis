<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Interna</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="css/normalize.css"/>
    <link rel="stylesheet" href="css/styles.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&family=Montserrat:wght@300;400;700&display=swap" rel="stylesheet">
</head>
<body>
<?php require_once('headers/headers.php'); ?>
<section class="contenido">
    <article>
        <h1>MENÚ DE GESTIÓN INTERNA</h1>
        <div class="gestion">
        <div class="contenedor-g">
        <div class="boton-g"><a href="registro_interno.php">Registros      </a><i class="fa fa-pencil-square-o" style="font-size:45px;"></i></div>
        <div class="boton-g"><a href="materias.php">Materias      </a><i class="fa fa-book" style="font-size:45px;"></i></div>
        </div>

        <div class="contenedor-g">
        <div class="boton-g"><a href="escuelas.php">Escuelas     </a><i class="fa fa-graduation-cap" style="font-size:45px;"></i></div>
        <div class="boton-g"><a href="grupos_materia.php">Teo. Lab.     </a><i class="fa fa-tags" style="font-size:45px;"></i></div>
        </div>

        <div class="contenedor-g">
        <div class="boton-g"><a href="carreras.php">Carreras     </a><i class="fa fa-list-alt" style="font-size:45px;"></i></div>
        <div class="boton-g"><a href="grupos.php">Grupos     </a><i class="fa fa-users" style="font-size:45px;"></i></div>
        </div>

        </div>
    </article>
</section>

<div id="creditos">
    <h5>Copyright © 2020-Universidad Don Bosco</h5>
</div>

</body>
</html>