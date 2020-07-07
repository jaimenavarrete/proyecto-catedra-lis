// Mostrar las materias inscritas actuales, en los selects de la página grupos

function mostrarMaterias() {
    $.ajax({
        url: "queries/fetch_subjects.php",
        type: 'post',
        dataType: 'json',
        success: function(response){
            var len = response.length;
            var materias = new Array(len);
            var grupos = new Array(len);

            for(i=0; i<len; i++){
                codigo = response[i].codigo;
                materia = response[i].materia;
                grupo = response[i].grupo;

                if(!materias.includes(materia)) {
                    materias[i] = materia;

                    var materia1 = '<option value="'+codigo+'">'+materias[i]+'</option>';
                    $('#materia').append(materia1);
                }

                if(!grupos.includes(grupo) && grupo != null) {
                    grupos[i] = grupo;

                    var grupo1 = '<option value="'+grupos[i]+'">'+grupos[i]+'</option>';
                    $('#grupo').append(grupo1);
                }
            }
        },
        error:function (jqXHR, exception) {
            console.log(exception);
        }
    });
}

mostrarMaterias();