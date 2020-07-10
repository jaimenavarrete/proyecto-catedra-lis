<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="css/normalize.css"/>
    <link rel="stylesheet" href="css/styles.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&family=Montserrat:wght@300;400;700&display=swap" rel="stylesheet">
</head>
<body>
<?php require_once('headers/headers.php'); ?>
<section class="contenido">
    <article>
            <h1 id="fuente">PERFIL PERSONAL</h1>
            <div class="formtab seccion-perfil">
                <form action="modificar_usuario_estudiante.php"  method="post">
                    <div>
                        <img class="circular--squaremax" src="img/user.png" />
                    </div>

                    <div class="btn-modificar-perfil">
                    <input type="hidden" name="idusuario" value="<?php echo ($row['Usuario_estudiante']); ?>">
                        <input type="submit" id="btn-repo">
                        <label for="btn-repo" class="btn">Modificar perfil<i class="fa fa-pencil icon" style="font-size:24px"></i></label>
                    </div>
                </form>
            </div>
            <div class="formtab">
                <h2>Datos personales</h2>
                <table class="tabla-datos-perfil">
                    <tr>
                        <td><h4>Usuario:</h4></td>  
                        <td><p><?php echo ($row['Usuario_estudiante']); ?></p></td>                     
                    </tr>
                    <tr>
                        <td><h4>Nombres:</h4></td>
                        <td><p><?php echo ($row['Nombres_estudiante']); ?></p></td>                        
                    </tr>
                    <tr>
                        <td><h4>Apellidos:</h4></td>      
                        <td><p><?php echo ($row['Apellidos_estudiante']); ?></p></td>                   
                    </tr>
                    <tr>
                        <td><h4>Email:</h4></td> 
                        <td><p><?php echo ($row['Correo']); ?></p></td>                         
                    </tr>
                    <tr>
                        <td><h4>Edad:</h4></td>  
                        <td><p><?php echo ($row['Edad']); ?></p></td>                        
                    </tr>
                    <tr>
                        <td><h4>Número de teléfono:</h4></td>
                        <td><p><?php echo ($row['Telefono']); ?></p></td>  
                    </tr>
                </table>
            </div>
            <div class="formtab">
                <h2>Materias inscritas</h2>
               
               <div class="bar-scroll">
               
                <div class="materias-container">
                <?php while($contador=mysqli_fetch_array($resultado1)){
                ?>
                    <div class="formm">
                        <h4>Codigo: <span><?php echo $contador['Codigo_materia'] ?></span> Grupo: <span><span><?php echo $contador['Nombre_grupo'] ?></span></h4>
                        <h4>Nombre:</h4>
                        <h3><span><?php echo $contador['Nombre_materia'] ?></h3>
                        
                    </div>
                <?php 
                }
                ?>
                    </div>
             
                </div>
               
            </div>
    </article>
</section>

<div id="creditos">
    <h5>Copyright © 2020-Universidad Don Bosco</h5>
</div>
</body>
</html>