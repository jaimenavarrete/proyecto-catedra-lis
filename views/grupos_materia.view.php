<?php include("queries/consultas.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grupos Materia</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="css/normalize.css"/>
    <link rel="stylesheet" href="css/styles.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&family=Montserrat:wght@300;400;700&display=swap" rel="stylesheet">
</head>
<body>
<?php require_once('headers/headers.php'); ?>
<section class="contenido">
    <article>
    <h1>REGISTRO DE GRUPOS TEORICOS Y LABORATORIO</h1>
    <div class="formtab">
            <h2>Grupos</h2>

            <div>
            <form action="queries/datos.php" method="POST" class="search-container sc-downloader">
            <div class="select-container">
                    <h4>Nombre: <input type="text" name="nombre" id=""></h4>
                </div>
                
                 <div class="select-container">
                    <h4>Tipo: <input type="text" name="tipo" id=""></h4>
                </div>


                <div class="select-container">
                    <h4>Cupos: <input type="text" name="cupos" id=""></h4>
                </div>
                
               <div class="select-container">
               <h4>Codigo materia:</h4>
               <select name="cod_mat" class="input-field">
                    <?php while($mostrar=mysqli_fetch_array($resultado6)){ 
                    ?>
                    <option><?php echo $mostrar['Codigo_materia'] ?></option>
                    <?php 
                    }
                    ?>
                    </select>
               </div>
            </div>
            
           
            <div class="btn-inscribir">
                <input type="submit" id="btn-repo">
                <label for="btn-repo" class="btn">Agregar grupo <i class="fa fa-plus icon" id="i-pdf-2"></i></label>
            </div>
            </form>
        </div>
        </section>
    </article>
<section>
    <article>
        <div class="formtab">
            <h2>Grupos registradas</h2>
            <form action="" name="formulario" id="inscripcion">
                <div class="search-container">
                <div class="bar-scroll">
                    <table class="tablas">
                        <thead>
                            <tr>
                                <th>Codigo Grupo</th>
                                <th>Numero Grupo</th>
                                <th>Tipo</th>
                                <th>Cupo</th>
                                <th>Codigo Materia</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <?php while($mostrar=mysqli_fetch_array($resultado7)){ 
                    ?>
                        <tr>
                            <td><?php echo $mostrar['Codigo_grupo'] ?></td>
                            <td><?php echo $mostrar['Nombre_grupo'] ?></td>
                            <td><?php echo $mostrar['Tipo'] ?></td>
                            <td><?php echo $mostrar['cupos'] ?></td>
                            <td><?php echo $mostrar['Codigo_materia'] ?></td>
                            <td><a href="queries/datos.php?id_gr=<?php echo $mostrar['Codigo_grupo'];?>"><i class="fa fa-pencil icon icon-modify"></i></a> <a href="queries/datos.php?id_grupo=<?php echo $mostrar['Codigo_grupo'];?>"><i class="fa fa-trash icon icon-delete"></i></a></td>
                        </tr> 
                        <?php 
                    }
                    ?>
                    </table>
                </div>
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