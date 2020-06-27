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
<body id="fondo">
<div id="navegador">
    <nav>
        <ul>
            <div class="separador-links">
                <li><a href="#" class="imagen"><img class="circular--squaremin" src="img/user.png" /></a></li>
                <li><a href="#">Mi perfil<i class="fa fa-user icon"></i></a></li>
                <li><a href="grupos.php">Grupos<i class="fa fa-users icon"></i></a></li>
                <li><a href="inscripcion_materias.php">Inscripción <i class="fa fa-pencil-square-o icon"></i></a></li>
                <li><a href="reportes.php">Reportes <i class="fa fa-book icon"></i></a></li>
            </div>
            <div class="separador-links">
                <li><a href="login.php">Cerrar Sesión <i class="fa fa-sign-out icon"></i> </a></li>
            </div>
        </ul>
    </nav>
</div>

<section>
    <article>
            <h1 id="fuente">PERFIL PERSONAL</h1>
            <div class="formtab seccion-perfil">
                <form action="modificar_usuario.php">
                    <div>
                        <img class="circular--squaremax" src="img/user.png" />
                    </div>

                    <div class="btn-modificar-perfil">
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
                        <td><p>[Usuario de la persona]</p></td>                     
                    </tr>
                    <tr>
                        <td><h4>Nombres:</h4></td>
                        <td><p>[Nombres de la persona]</p></td>                        
                    </tr>
                    <tr>
                        <td><h4>Apellidos:</h4></td>      
                        <td><p>[Apellidos de la persona]</p></td>                   
                    </tr>
                    <tr>
                        <td><h4>Fecha de nacimiento:</h4></td>   
                        <td><p>[Fecha de nacimiento de la persona]</p></td>                      
                    </tr>
                    <tr>
                        <td><h4>Email:</h4></td> 
                        <td><p>[Email de la persona]</p></td>                         
                    </tr>
                    <tr>
                        <td><h4>Edad:</h4></td>  
                        <td><p>[Edad de la persona]</p></td>                        
                    </tr>
                    <tr>
                        <td><h4>Número de teléfono:</h4></td>
                        <td><p>[Número de teléfono de la persona]</p></td>  
                    </tr>
                </table>
            </div>
            <div class="formtab">
                <h2>Materias inscritas</h2>
                
                <div class="materias-container">
                    <div class="formm">
                        <h4>Codigo: <span>LIS104</span> Grupo: <span>01T</span></h4>
                        <h4>Nombre:</h4>
                        <h3>LENGUAJES INTERP. EN EL SERVIDOR</h3>
                        <a href="#" class="btn">Ver materia<i class="fa fa-arrow-circle-right icon"></i></a>
                    </div>
                    <div class="formm">            
                        <h4>Codigo: <span>LIS104</span> Grupo: <span>01T</span></h4>
                        <h4>Nombre:</h4>
                        <h3>LENGUAJES INTERP. EN EL SERVIDOR</h3>
                        <a href="#" class="btn">Ver materia<i class="fa fa-arrow-circle-right icon"></i></a>
                    </div>
                    <div class="formm">
                        <h4>Codigo: <span>LIS104</span> Grupo: <span>01T</span></h4>
                        <h4>Nombre:</h4>
                        <h3>LENGUAJES INTERP. EN EL SERVIDOR</h3>
                        <a href="#" class="btn">Ver materia<i class="fa fa-arrow-circle-right icon"></i></a>
                    </div>
                    <div class="formm">     
                        <h4>Codigo: <span>LIS104</span> Grupo: <span>01T</span></h4>
                        <h4></h4>
                        <h4>Nombre:</h4>
                        <h3>LENGUAJES INTERP. EN EL SERVIDOR</h3>
                        <a href="#" class="btn">Ver materia<i class="fa fa-arrow-circle-right icon"></i></a>
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