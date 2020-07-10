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
            <h2>Proceso de inscripción</h2>

            <div class="search-container sc-downloader">
                <div class="select-container">
                    <h4>Materia:</h4>
                    <select name="materias" id="materias" class="materias">
                <?php while($contador=mysqli_fetch_array($resultado1)){
                ?>
                        <option value="<?php echo $contador['Codigo_materia'] ?>"><?php echo $contador['Nombre_materia'] ?></option>

                <?php 
                }
                ?>
                    </select>
                </div>

                <div class="select-container">
                    <h4>Grupo teoria:</h4>
                    <select name="grupo" id="grupo" class="materias">
                <?php while($contador=mysqli_fetch_array($resultado2)){
                ?>
                        <option value="<?php echo $contador['Codigo_grupo'] ?>"><?php echo $contador['Nombre_grupo'] ?></option>
                
                <?php 
                }
                ?>
                    </select>
                </div>
            </div>

            <div class="search-container sc-downloader">
                <div class="select-container">
                    <h4>Cupos:</h4>
                    <input type="text" name="cupos" id="cupos" readonly value="27">
                </div>

               
            </div>

            <div class="btn-inscribir">
                <input type="submit" id="btn-repo">
                <label for="btn-repo" class="btn">Agregar materia <i class="fa fa-plus icon" id="i-pdf-2"></i></label>
            </div>
        </div>
    </article>
</section>

<br><br><br><br>

<div id="creditos">
    <h5>Copyright © 2020-Universidad Don Bosco</h5>
</div>
</body>
</html>