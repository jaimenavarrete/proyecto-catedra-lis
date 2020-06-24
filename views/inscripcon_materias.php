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
<br>


<br>
    <section>
    <article>
    <h1>INSCRIPCION DE MATERIAS</h1>
    <div id="formtab">
    <div>
    <h2>Proceso de inscripción</h2>
    <hr id="line">
    </div>
    <br>
     <br>
    <div class="input-container-repo">
    <h4 style="margin-top:-0.1em; padding:5px;" >Materia:</h4>
    <select name="materias" id="materias">
    <option value="">Matematica 1</option>
    <option value="">Matematica 2</option>
    <option value="">Matematica 3</option>
    </select>
    <h4 style="margin-top:-0.1em;" class="select_grupos_nombre">Grupo teoria:</h4>
    <select name="grupo" id="grupo" class="select_grupos_teoria">
    <option value="">01T</option>
    <option value="">04T</option>
    <option value="">02T</option>
    </select>
    </div>
    
    <div class="input-container-repo">
<<<<<<< HEAD
    <h4 style="margin-top:-0.1em;">Cupo:</h4>
        <input type="text" name="cupos" id="cupos" readonly style="width: 28px;
  height: 20px; text-align: center;">
    </div>
    <button type="submit" class="btn" id="btn-repo">Agregar materia +</button>
=======
    <h4 style="margin-top:-0.1em; margin-left: 5.5px; ">Cupo:</h4>
        <input type="text" name="cupos" id="cupos" style="margin-left: 1.5em; width: 140px;" >
    
    <h4 style="margin-top:-0.1em;" class="nombre_grupos_lab">Grupo laboratorio:</h4>
    <select name="grupo" id="grupo" class="select_grupos_lab">
    <option value="">01L</option>
    <option value="">04L</option>
    <option value="">02L</option>
    </select>
    </div>
    <button type="submit" class="btn" id="btn-repo" >+ Agregar materia</button>
>>>>>>> b8269a7f314a45168ff778577b13efe421a8a694
    </div>
    </article>
    </section>

<br><br>
    <section>
    <article>
    <div id="formtab">
    <form action="" class="form-horizontal" name="formulario" id="salario">
    <div>
    <h2>Materias a inscribir</h2>
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
              <td>1</td><td>Lenguaje Intrepreado en el servidor</td><td>1T</td><td><a href="http://"><i class="fa fa-trash icon" style="background:#EB5757;"></i></a></td>
          </tr> 
          <tr>
              <td>1</td><td>Lenguaje Intrepreado en el servidor</td><td>10T</td><td><a href="http://"><i class="fa fa-trash icon" style="background:#EB5757;"></i></a></td>
          </tr>  
        </table>
    </div>

    

    <button type="submit" class="btn" id="btn-repo" style="background:#27AE60;">Finalizar inscripción</button>
   
    </form>
    </div>
    <br>
        <br>
        <br>
    </article>
    </section>



    <div id="creditos" style="top: 66em;">
   <h5>Copyright © 2020-Universidad Don Bosco</h5>
</div> 
</body>
</html>