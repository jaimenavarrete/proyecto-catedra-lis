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
<?php require_once('headers/headers.php'); ?>
<section class="contenido contenido1">
    <article>
        <h1>INSCRIPCION DE MATERIAS</h1>
        <div class="formtab">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <h2>Proceso de inscripción</h2>

                <div class="search-container sc-downloader">
                    <div class="select-container">
                    
                        <h4>Materia:</h4>
                        <select name="materia" id="materia" class="materia">
                        </select>
                    </div>

                    <div class="select-container">
                        <h4>Grupo teoria:</h4>
                        <select name="grupo" id="grupo" class="materias">
                        </select>
                    </div>
                </div>

                <div class="btn-inscribir">
                    <input type="submit" name="submit" id="btn-repo">
                    <label for="btn-repo" class="btn">Agregar materia <i class="fa fa-plus icon" id="i-pdf-2"></i></label>
                </div>
            </form>
        </div>
    </article>
</section>

<br><br><br><br>

<div id="creditos">
    <h5>Copyright © 2020-Universidad Don Bosco</h5>
</div>

<!-- Scripts a utilizar -->

<script src="js/jquery-3.4.1.min.js" type="text/javascript"></script>
<script src="js/ajax.js"></script>

</body>
</html>