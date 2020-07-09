
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
<header>
<div id="navegador">
<input type="checkbox" id="menu-bar">
<label for="menu-bar" class="fa fa-bars icon" style="font-size:36px"></label>
<a href="perfil.php"><img class="circular--squaremin" src="img/user.png" /></a>
<a href="login.php" class="cerrar">Cerrar Sesión <i class="fa fa-sign-out icon"></i> </a>
    <nav class="menu">
        <ul>
            <div class="separador-links">
                <li><a href="perfil.php">Mi perfil<i class="fa fa-user icon"></i></a></li>
                <li><a href="grupos.php">Grupos<i class="fa fa-users icon"></i></a></li>
                <li><a href="inscripcion_materias.php">Inscripción <i class="fa fa-pencil-square-o icon"></i></a></li>
                <li><a href="reportes.php">Reportes <i class="fa fa-book icon"></i></a></li>
                <li class="cerrar-m" ><a href="login.php">Cerrar Sesión <i class="fa fa-sign-out icon"></i> </a></li>
                </div>
        </ul>
    </nav>
</div>
</header>
<section class="contenido">
    <article>
        <h1>GRUPOS DE LAS MATERIAS</h1>
        <div class="formtab">
            <h2>Búsqueda de grupos por materia</h2>
            <form class="search-container"  method="post">
                <div class="select-container sc">
                    <h4>Materia:</h4>
                    <select name="materias" class="materias">
            <?php while($contador=mysqli_fetch_array($resultado1)){
                ?>
                        <option><?php echo $contador['Nombre_materia']?></option>

                <?php 
                }
                ?>
                    </select>
                </div>
                <div class="select-container sc">
                    <h4>Grupo:</h4>
                    <select name="grupo">
                <?php while($contador1=mysqli_fetch_array($resultado2))
                {
                ?>
                        <option value="<?php echo $contador1['Nombre_grupo'] ?>" ><?php echo $contador1['Nombre_grupo'] ?></option>
                <?php 
                }
                ?>
                    </select>
                </div>
                <div class="select-container">
                    <input type="submit" id="btn-repo">
                    <label for="btn-repo" class="btn btn-g" name="bt_mostrar">Ver grupo <i class="fa fa-search icon" id="i-pdf"></i></label>
                </div>
            </form>
        </div>

       
        <div class="formtab">
            <h2>Información de los alumnos de la materia actual</h2>
            <div class="bar-scroll">
            <table class="tablas">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre del alumno</th>
                        <th>Grupo del alumno</th>
                        
                    </tr>
                </thead>
                
                <?php 
                if(isset($resultado3)){
                while($contador2=mysqli_fetch_array($resultado3))
                {
                ?>
                <tr>
                    <td><?php echo ++$acum?></td>
                    <td><?php echo $contador2['Nombres_estudiante'] ?></td>
                    <td>Grupo <?php echo $contador2['numero_grupo'] ?></td>
                    
                </tr> 
                <?php 
                }
            }
                ?>
               
            </table>
        </div>
        </div>

        <div class="formtab">
            <h2>Información de los grupos de la materia actual</h2>
            <form class="search-container sc-tab" action="crear_grupos.php">
                <div class="select-container sc">
                    <h4>Grupo:</h4>
                    <select name="lista-grupos" class="grupo-creacion">
                <?php while($contador3=mysqli_fetch_array($resultado4))
                {
                ?>
                        <option value="">Grupo <?php echo $contador3['numero_grupo'] ?></option>
                <?php 
                }
                ?>
                    </select>
                </div>
                

                
            </form>
            <div class="bar-scroll">
            <table class="tablas">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre del alumno</th>
                        <th>Correo electrónico</th>
                        
                    </tr>
                </thead>
                <tr>
                    <td>1</td>
                    <td>[Nombre del alumno 1]</td>
                    <td>[Correo del alumno 1]</td>
                   
                <tr>
                    <td>2</td>
                    <td>[Nombre del alumno 2]</td>
                    <td>[Correo del alumno 2]</td>
                    
                </tr> 
                <tr>
                    <td>3</td>
                    <td>[Nombre del alumno 3]</td>
                    <td>[Correo del alumno 3]</td>
                   
                </tr> 
                <tr>
                    <td>4</td>
                    <td>[Nombre del alumno 4]</td>
                    <td>[Correo del alumno 4]</td>
                    
                </tr> 
                <tr>
                    <td>5</td>
                    <td>[Nombre del alumno 5]</td>
                    <td>[Correo del alumno 5]</td>
                    
                </tr> 
            </table>
        </div>
        </div>
    </article>
</section>

<div id="creditos">
    <h5>Copyright © 2020-Universidad Don Bosco</h5>
</div>
</body>
</html>