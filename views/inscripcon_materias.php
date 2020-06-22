<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscripción de materias</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="../css/styles.css"/>
    <link rel="stylesheet" href="../css/normalize.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body id="freg">
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
<br>


<br>
    <section>
    <article>
    <div id="formr">
    <form action="" class="form-horizontal" name="formulario" id="salario">
    <div>
    <h2>INSCRIPCION DE MATERIAS</h2>
    <hr id="line">
    </div>
    
    <div>Materias:</div>
    <div class="input-container">
    <select name="materias" id="materias">
    <option value="">Matematica 1</option>
    <option value="">Matematica 2</option>
    <option value="">Matematica 3</option>
    </select>
    </div>
    
    <div>Grupos:</div>
    <div class="input-container">
    <select name="grupo" id="grupo">
    <option value="">01T</option>
    <option value="">04T</option>
    <option value="">02T</option>
    </select>
    </div>

    <div>Cupos disponibles:</div>
    <div class="input-container">
        <input type="text" name="cupos" id="cupos">
    </div>

    

    <button type="submit" class="btn">+ Agregar materia</button>
   
    </form>
    </div>
    </article>
    </section>

<br><br>
    <section>
    <article>
    <div id="formr">
    <form action="" class="form-horizontal" name="formulario" id="salario">
    <div>
    <h2>MATERIAS A INSCRIBIR</h2>
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
              <td>1</td><td>Lenguaje Intrepreado en el servidor</td><td>1T</td><td><a href="http://"><i class="fa fa-trash icon"></i></a></td>
          </tr> 
          <tr>
              <td>1</td><td>Lenguaje Intrepreado en el servidor</td><td>10T</td><td><a href="http://"><i class="fa fa-trash icon"></i></a></td>
          </tr>  
        </table>
    </div>

    

    <button type="submit" class="btn">Finalizar inscripción</button>
   
    </form>
    </div>
    </article>
    </section>



    <div id="creditos">
   <h5>Copyright © 2020-Universidad Don Bosco</h5>
    </div>
</body>
</html>