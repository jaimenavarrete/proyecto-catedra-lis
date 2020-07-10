// Mostrar las materias inscritas actuales, en los selects de la página grupos

function mostrarMaterias() {
    $.ajax({
        url: "queries/fetch_subjects.php",
        type: 'post',
        dataType: 'json',

        success: function(response){
            var len = response.length;
            var materias = ['Seleccione una materia'];
            var grupos = ['Seleccione un grupo'];

            var materia1 = "<option value='#'>Seleccione una materia</option>";
            var grupo1 = "<option value='#'>Seleccione un grupo</option>";
            $('#materia').append(materia1);
            $('#grupo').append(grupo1);

            for(i=0; i<len; i++){
                codigo = response[i].codigo;
                materia = response[i].materia;
                grupo = response[i].grupo;

                if(!materias.includes(materia)) {
                    materias.push(materia);

                    var materia1 = '<option value="'+codigo+'">'+materia+'</option>';
                    $('#materia').append(materia1);
                }

                if(!grupos.includes(grupo) && grupo != null) {
                    grupos.push(grupo);

                    var grupo1 = '<option value="'+grupo+'">'+grupo+'</option>';
                    $('#grupo').append(grupo1);
                }
            }
        },
        error:function (exception) {
            console.log(exception);
        }
    });
}

// Ejecutar funcion para mostrar materias actuales disponibles
mostrarMaterias();

// Funcion para mostrar los alumnos de los grupos de proyecto

function mostrarAlumnosGrupo() {
    // Obtener el grupo seleccionado actualmente
    var grupoProyecto = $("#lista-grupos option:selected").val();
    var rol =  $("#lista-grupos").attr('rol');
    // Agregar el valor del grupo seleccionado al boton para borrar el grupo
    $('#btn-popup-borrar-grupo').attr("group", grupoProyecto);

    $.ajax({
        url: 'queries/fetch_students_group.php',
        type: 'post',
        dataType: 'json',
        async: true,
        data: {"grupoProyecto" : grupoProyecto},

        success: function(response){
            var registros = $("#alumnos-grupo tr").length;
            var len = response.length;

            for(i=1; i<registros; i++)
            {
                $("#alumnos-grupo tr:last").remove();
            }

            if(len > 0) {
                for(i=0; i<len; i++){
                    numero = response[i].numero;
                    nombres = response[i].nombres;
                    apellidos = response[i].apellidos;
                    usuario = response[i].usuario;
                    correo = response[i].correo;
              
                    var alumno = "<tr><td>" + numero + "</td>";
                    alumno += "<td>" + apellidos + ", " + nombres + "</td>";
                    alumno += "<td>" + correo + "</td>";
                    
                    if(rol != 1) {
                        alumno += "<td><a href='#' class='btn-popup-modificar-grupo' user='" + usuario + "'><i class='fa fa-pencil icon icon-modify'></i></a> <a href='#' class='btn-popup-quitar-grupo' user='" + usuario + "'><i class='fa fa-trash icon icon-delete'></i></a></td></td>";
                    }

                    $('#alumnos-grupo').append(alumno);
                }
            }
            else {
                var alumno = "<tr><td colspan='4' class='tabla-vacia'>No hay alumnos en este grupo</td></tr>";
                $('#alumnos-grupo').append(alumno);
            }

            // Funcion para el boton de quitar alumno del grupo
            $('.btn-popup-quitar-grupo').click(function(e) {
                e.preventDefault();
                var usuarioAlumno = $(this).attr('user');
                $('#overlay-quitar-alumno-grupo').addClass('overlay-active');

                var usuario = document.getElementById('alumno_a_quitar');
                usuario.value = usuarioAlumno;
            });
            // Funcion para el boton de modificar grupo del alumno
            $('.btn-popup-modificar-grupo').click(function(e) {
                e.preventDefault();
                var usuarioAlumno = $(this).attr('user');
                $('#overlay-modificar-alumno-grupo').addClass('overlay-active');

                var usuario = document.getElementById('alumno_a_modificar');
                usuario.value = usuarioAlumno;
            });
            // Funcion para el boton de borrar grupo
            $('#btn-popup-borrar-grupo').click(function(e) {
                e.preventDefault();
                var borrarGrupo = $(this).attr('group');
                $('#overlay-borrar-grupo').addClass('overlay-active');

                var grupo = document.getElementById('grupo_a_borrar');
                grupo.value = borrarGrupo;
            });
        },
        error:function (exception) {
            console.log(exception);
        }
    });
}

// ******************************************************************
// Funciones para edicion de grupos
// ******************************************************************

// Funcion para quitar alumno del grupo

function quitarAlumno() {
    $.ajax({
        url: 'queries/edit_student.php',
        type: 'post',
        dataType: 'json',
        async: true,
        data: $('#form_quitar_alumno_grupo').serialize(),

        success: function(response){
            console.log(response);
        },
        error:function (exception) {
            console.log(exception);
        }
    });
}

function modificarAlumno() {
    $.ajax({
        url: 'queries/edit_student.php',
        type: 'post',
        dataType: 'json',
        async: true,
        data: $('#form_modificar_alumno_grupo').serialize(),

        success: function(response){
            console.log(response);
        },
        error:function (exception) {
            console.log(exception);
        }
    });
}

function borrarGrupo() {
    $.ajax({
        url: 'queries/edit_student.php',
        type: 'post',
        dataType: 'json',
        async: true,
        data: $('#form_borrar_grupo').serialize(),

        success: function(response){
            console.log(response);
        },
        error:function (exception) {
            console.log(exception);
        }
    });
}