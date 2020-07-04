<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="../js/jquery-3.4.1.min.js" type="text/javascript"></script>
    <script type = "text/javascript">
    $(document).ready(function(){
        $.ajax({
            url: "fetch_subjects.php",
            type: 'get',
            dataType: 'json',
            success: function(response){
                var len = response.length;
                for(i=0; i<len; i++){
                    var id = response[i].id;
                    var name = response[i].name;

                    var option = '<option value="'+id+'">'+name+'</option>';
                    $('#materia1').append(option);
                    $('#materia2').append(option);
                }
            },
            error:function (jqXHR, exception) {
                console.log(exception);
            }
        });
    });
        
    </script>
</head>
<body>
<section class="contenido">
    <article>
        <h1>CREACIÓN DE GRUPOS DE PROYECTO</h1>
        <div class="formtab">
            <h2>Proceso de creación</h2>
            <form action="" method="get">
                <div class="search-container">
                    <div class="select-container">
                        <h4>Primera materia:</h4>
                        <select name="materia1" id="materia1" class="materias">

                        </select>
                    </div>

                    <div class="select-container">
                        <h4>Segunda materia:</h4>
                        <select name="materia2" id="materia2" class="materias">
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
    </article>
</section>
</body>
</html>
<?php
include ("create_groups.php");
?>