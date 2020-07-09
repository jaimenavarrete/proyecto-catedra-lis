<?php

if(!isset($_SESSION['usuario']) || $_SESSION['rol'] != 2){
    header("Location:index.php");
}else{
    $usuario = $_SESSION['usuario'];
    $rol = $_SESSION['rol'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creación de grupos</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="css/normalize.css"/>
    <link rel="stylesheet" href="css/styles.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&family=Montserrat:wght@300;400;700&display=swap" rel="stylesheet">
    <script src="js/jquery-3.4.1.min.js" type="text/javascript"></script>
    <script type = "text/javascript">
    $(document).ready(function(){

        $.ajax({
            url: "queries/fetch_subjects.php",
            type: 'get',
            dataType: 'json',
            success: function(response){
                var len = response.length;
                for(i=0; i<len; i++){
                    var id = response[i].codigo;
                    var name = response[i].materia;

                    var option = '<option value="'+id+'">'+name+'</option>';
                    $('#materia1').append(option);
                    $('#materia2').append(option);
                }
                //Llamada del segundo ajax
                $.ajax({
                    url: "queries/fetch_groups.php",
                    type: 'get',
                    dataType: 'json',
                    success: function(response){
                        var len = response.length;
                        for(i=0; i<len; i++){
                            var id = response[i].id;
                            var name = Number(response[i].materia);
                            var option = '<option value="'+id+'">'+'Grupo '+name+'</option>';
                            $('#lista-grupos').append(option);
                        }
                    },
                    error:function (jqXHR, exception) {
                        console.log(exception);
                    }
                });
            },
            error:function (jqXHR, exception) {
                console.log(exception);
            }
        });
    });
        
    function showStudents(){
        if($('#lista-grupos option:selected').val() != ""){
            $.ajax({ 
                url: 'queries/fetch_students_group.php',
                type: 'post',
                data:{grupoProyecto: $('#lista-grupos option:selected').val()},
                datatype: 'json',
                success: function(data){ 
                    var len = data.length;
                    $("#grupos").empty();
                    for(i=0; i<len; i++){
                        var numero = data[i].numero;
                        var nombre = data[i].nombres + data[i].apellidos;
                        var correo = data[i].correo;
                        var td = "<td>"+numero+"</td>"+"<td>"+nombre+"</td>"+"<td>"+correo+"</td>";
                        $("#grupos").append("<tr>");
                        $("#grupos").append(td);
                        $("#grupos").append("</tr>");
                    
                    }
                },
                error:function (jqXHR, exception) {
                    console.log(jqXHR);
                }
            });
        }
    }
    </script>
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
        <h1>CREACIÓN DE GRUPOS DE PROYECTO</h1>
        <div class="formtab">
            <h2>Proceso de creación</h2>
            <form action="" method="get">
                <div class="search-container">
                    <div class="select-container">
                        <h4>Primera materia:</h4>
                        <select name="materia1" id="materia1" class="materias" readonly="True">

                        </select>
                    </div>

                    <div class="select-container">
                        <h4>Segunda materia:</h4>
                        <select name="materia2" id="materia2" class="materias" readonly="True">
                        </select>
                    </div>
                </div>

                <div class="search-container">
                    <div class="select-container">
                        <h4>Cantidad de integrantes:</h4>
                        <input type="number" name="cupos" min="1">
                    </div>
                </div>

                <div class="btn-inscribir">
                    <input type="submit" id="btn-repo" name="create_groups">
                    <label for="btn-repo" class="btn">Crear grupos <i class="fa fa-plus icon" id="i-pdf-2"></i></label>
                </div>
            </form>
        </div>
        <?php
            require_once ("queries/create_groups.php");
        ?>
    </article>
</section>

<section>
    <article>
        <div class="formtab">
            <h2>Grupos creados</h2>
            <form action="" name="formulario" id="inscripcion">
                <div class="search-container">
                    <div class="select-container">
                        <h4>Grupo:</h4>
                        <select name="lista-grupos" id="lista-grupos" class="grupo-creacion" onchange="showStudents();">
                            <option value=" ">----Seleccione un grupo----</option>
                        </select>
                    </div>
                </div>
                <div class="bar-scroll">
                    <table class="tablas">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre del alumno</th>
                                <th>Correo electrónico</th>
                            </tr>
                        </thead>
                        <tbody id="grupos">
                            <tr>
                                <td>1</td>
                                <td>[Nombre del alumno 1]</td>
                                <td>[Correo del alumno 1]</td>
                            </tr> 
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    </article>
</section>

<div id="creditos">
    <h5>Copyright © 2020-Universidad Don Bosco</h5>
</div>
<!-- llamada a los scripts -->
<script src="js/ajax.js"></script>
</body>
</html>