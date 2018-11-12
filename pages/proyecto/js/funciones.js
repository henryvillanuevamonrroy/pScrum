

function agregarproyectos(proyecto, descripcion) {

    cadena = "proyecto=" + proyecto +
            "&descripcion=" + descripcion;

    $.ajax({
        type: "POST",
        url: "php/agregarproyecto.php",
        data: cadena,
        success: function (r) {
            if (r == 1) {
                $('#tabla_proyectos').load('componentes/tabla_proyectos.php');
                alertify.success("agregado con exito :)");
            } else {
                alertify.error("Fallo el servidor :(");
            }
        }
    });

}

function agregarepicas(epica, descripcion, id_proyecto) {

    cadena = "epica=" + epica +
            "&descripcion=" + descripcion +
            "&id_proyecto=" + id_proyecto;


    $.ajax({
        type: "POST",
        url: "php/agregarepica.php",
        data: cadena,
        success: function (r) {
            if (r == 1) {
                $('#tabla_epicas').load('componentes/tabla_epicas.php');
                alertify.success("agregado con exito :)");
            } else {
                alertify.error("Fallo el servidor :(");
            }
        }
    });

}

function agregarhistorias(usuario, necesidad, razon, id_epicas) {

    cadena = "usuario=" + usuario +
            "&necesidad=" + necesidad +
            "&razon=" + razon +
            "&id_epicas=" + id_epicas;


    $.ajax({
        type: "POST",
        url: "php/agregarhistoria.php",
        data: cadena,
        success: function (r) {
            if (r == 1) {
                $('#tabla_historias').load('componentes/tabla_historias.php');
                alertify.success("agregado con exito :)");
            } else {
                alertify.error("Fallo el servidor :(");
            }
        }
    });

}
function agregarcriterios(escenario, desencadenante, resultado, id_historia) {

    cadena = "escenario=" + escenario +
            "&desencadenante=" + desencadenante +
            "&resultado=" + resultado +
            "&id_historia=" + id_historia;


    $.ajax({
        type: "POST",
        url: "php/agregarcriterios.php",
        data: cadena,
        success: function (r) {
            if (r == 1) {
                $('#tabla_criterios_aceptacion').load('componentes/tabla_criterios_aceptacion.php');
                $('#tabla_tareas').load('componentes/tabla_tareas.php');
                alertify.success("agregado con exito :)");
            } else {
                alertify.error("Fallo el servidor :(");
            }
        }
    });

}

function agregartareas(descripcion_tarea, id_historia_tarea) {

    cadena = "descripcion_tarea=" + descripcion_tarea +
            "&id_historia_tarea=" + id_historia_tarea;


    $.ajax({
        type: "POST",
        url: "php/agregartareas.php",
        data: cadena,
        success: function (r) {
            if (r == 1) {
                $('#tabla_criterios_aceptacion').load('componentes/tabla_criterios_aceptacion.php');
                $('#tabla_tareas').load('componentes/tabla_tareas.php');
                alertify.success("agregado con exito :)");
            } else {
                alertify.error("Fallo el servidor :(");
            }
        }
    });

}

function agregaform(datos) {

    d = datos.split('||');

    $('#idproyecto_edt').val(d[0]);
    $('#proyectoc').val(d[1]);
    $('#descripcionc').val(d[2]);

}


function agregaformEpica(datos) {

    d = datos.split('||');

    $('#idepica_edt').val(d[0]);
    $('#epicac').val(d[1]);
    $('#descripcionc').val(d[2]);

}
function agregaformHistoria(datos) {

    d = datos.split('||');

    $('#idhistoria_edt').val(d[0]);
    $('#usuarioc').val(d[2]);
    $('#necesidadc').val(d[4]);
    $('#razonc').val(d[6]);
    $('#prioridadc').val(d[7]);
    $('#puntajec').val(d[8]);

}

function actualizaepicas() {


    idepica_edt = $('#idepica_edt').val();
    epicac = $('#epicac').val();
    descripcionc = $('#descripcionc').val();

    cadena = "&idepica_edt=" + idepica_edt +
            "&epicac=" + epicac +
            "&descripcionc=" + descripcionc;

    $.ajax({
        type: "POST",
        url: "php/actualizaepica.php",
        data: cadena,
        success: function (r) {

            if (r == 1) {
                $('#tabla_epicas').load('componentes/tabla_epicas.php');
                alertify.success("Actualizado con exito :)");
            } else {
                alertify.error("Fallo el servidor :(");
            }
        }
    });

}

function actualizahistoria() {


    idhistoria_edt = $('#idhistoria_edt').val();
    rolc = $('#usuarioc').val();
    necesidadc = $('#necesidadc').val();
    razonc = $('#razonc').val();
    prioridadc = $('#prioridadc').val();
    puntajec = $('#puntajec').val();

    cadena = "&idhistoria_edt=" + idhistoria_edt +
            "&rolc=" + rolc +
            "&necesidadc=" + necesidadc +
            "&razonc=" + razonc +
            "&prioridadc=" + prioridadc +
            "&puntajec=" + puntajec;

    $.ajax({
        type: "POST",
        url: "php/actualizahistoria.php",
        data: cadena,
        success: function (r) {

            if (r == 1) {
                $('#tabla_historias').load('componentes/tabla_historias.php');
                alertify.success("Actualizado con exito :)");
            } else {
                alertify.error("Fallo el servidor :(");
            }
        }
    });

}

function actualizacriterio() {


    idcriterio_edt = $('#idcriterio_edt').val();
    escenarioc = $('#escenarioc').val();
    desencadenantec = $('#desencadenantec').val();
    resultadoc = $('#resultadoc').val();
    estadoc = $('#estadoc').val();

    cadena = "&idcriterio_edt=" + idcriterio_edt +
            "&escenarioc=" + escenarioc +
            "&desencadenantec=" + desencadenantec +
            "&resultadoc=" + resultadoc +
            "&estadoc=" + estadoc;

    $.ajax({
        type: "POST",
        url: "php/actualizacriterio.php",
        data: cadena,
        success: function (r) {

            if (r == 1) {
               $('#tabla_criterios_aceptacion').load('componentes/tabla_criterios_aceptacion.php');
                $('#tabla_tareas').load('componentes/tabla_tareas.php');
                  alertify.success("Actualizado con exito :)");
            } else {
                alertify.error("Fallo el servidor :(");
            }
        }
    });

}

function actualizacursos() {


    idproyecto_edt = $('#idproyecto_edt').val();
    proyectoc = $('#proyectoc').val();
    descripcionc = $('#descripcionc').val();

    cadena = "&idproyecto_edt=" + idproyecto_edt +
            "&proyectoc=" + proyectoc +
            "&descripcionc=" + descripcionc;

    $.ajax({
        type: "POST",
        url: "php/actualizaproyecto.php",
        data: cadena,
        success: function (r) {

            if (r == 1) {
                $('#tabla_proyectos').load('componentes/tabla_proyectos.php');
                alertify.success("Actualizado con exito :)");
            } else {
                alertify.error("Fallo el servidor :(");
            }
        }
    });

}


function preguntarSiNoepica(id) {
    alertify.confirm('Eliminar epica', '¿Esta seguro de eliminar esta epica?',
            function () {
                eliminarDatosEpica(id)
            }
    , function () {
        alertify.error('Se cancelo')
    });
}


function preguntarSiNohistoria(id) {
    alertify.confirm('Eliminar historia', '¿Esta seguro de eliminar esta historia?',
            function () {
                eliminarDatosHistoria(id)
            }
    , function () {
        alertify.error('Se cancelo')
    });
}

function eliminarDatosHistoria(id) {

    cadena = "id=" + id;

    $.ajax({
        type: "POST",
        url: "php/eliminarDatosHistoria.php",
        data: cadena,
        success: function (r) {
            if (r == 1) {
                $('#tabla_historias').load('componentes/tabla_historias.php');
                alertify.success("Eliminado con exito!");
            } else {
                alertify.error("Fallo el servidor :(");
            }
        }
    });
}

function eliminarDatosEpica(id) {

    cadena = "id=" + id;

    $.ajax({
        type: "POST",
        url: "php/eliminarDatosEpica.php",
        data: cadena,
        success: function (r) {
            if (r == 1) {
                $('#tabla_epicas').load('componentes/tabla_epicas.php');
                alertify.success("Eliminado con exito!");
            } else {
                alertify.error("Fallo el servidor :(");
            }
        }
    });
}

function eliminarDatos(id) {

    cadena = "id=" + id;

    $.ajax({
        type: "POST",
        url: "php/eliminarDatos.php",
        data: cadena,
        success: function (r) {
            if (r == 1) {
                $('#tabla_proyectos').load('componentes/tabla_proyectos.php');
                alertify.success("Eliminado con exito!");
            } else {
                alertify.error("Fallo el servidor :(");
            }
        }
    });
}

function eliminarDatostarea(id) {

    cadena = "id=" + id;

    $.ajax({
        type: "POST",
        url: "php/eliminarDatostarea.php",
        data: cadena,
        success: function (r) {
            if (r == 1) {
               $('#tabla_criterios_aceptacion').load('componentes/tabla_criterios_aceptacion.php');
                $('#tabla_tareas').load('componentes/tabla_tareas.php');
                 alertify.success("Eliminado con exito!");
            } else {
                alertify.error("Fallo el servidor :(");
            }
        }
    });
}


function ingresar_al_proyecto(id) {

    cadena = "id=" + id;

    $.ajax({
        type: "POST",
        url: "php/consultar_datos.php",
        data: cadena,
        success: function (r) {
            if (r == 1) {
                $('#tabla_proyectos').load('componentes/tabla_proyectos.php');
                alertify.success("Eliminado con exito!");
            } else {
                alertify.error("Fallo el servidor :(");
            }
        }
    });

}

function preguntarSiNo(id) {
    alertify.confirm('Eliminar proyecto', '¿Esta seguro de eliminar este proyecto?',
            function () {
                eliminarDatos(id)
            }
    , function () {
        alertify.error('Se cancelo')
    });
}

function preguntarSiNotarea(id) {
    alertify.confirm('Eliminar tarea', '¿Esta seguro de eliminar esta tarea?',
            function () {
                eliminarDatostarea(id)
            }
    , function () {
        alertify.error('Se cancelo')
    });
}

function preguntarSiNotarea_inicio(id) {
    alertify.confirm('Siguiente paso', '¿Esta seguro de inciar esta tarea?',
            function () {
                iniciartarea(id)
            }
    , function () {
        alertify.error('Se cancelo')
    });
}

function preguntarSiNotarea_final(id) {
    alertify.confirm('Siguiente paso', '¿Esta seguro de cerrar esta tarea?',
            function () {
                finalizartarea(id)
            }
    , function () {
        alertify.error('Se cancelo')
    });
}

function iniciartarea(id) {

    cadena = "id=" + id;

    $.ajax({
        type: "POST",
        url: "php/iniciartarea.php",
        data: cadena,
        success: function (r) {
            if (r == 1) {
               $('#tabla_criterios_aceptacion').load('componentes/tabla_criterios_aceptacion.php');
                $('#tabla_tareas').load('componentes/tabla_tareas.php');
                 alertify.success("Eliminado con exito!");
            } else {
                alertify.error("Fallo el servidor :(");
            }
        }
    });
}

function finalizartarea(id) {

    cadena = "id=" + id;

    $.ajax({
        type: "POST",
        url: "php/finalizartarea.php",
        data: cadena,
        success: function (r) {
            if (r == 1) {
               $('#tabla_criterios_aceptacion').load('componentes/tabla_criterios_aceptacion.php');
                $('#tabla_tareas').load('componentes/tabla_tareas.php');
                 alertify.success("Eliminado con exito!");
            } else {
                alertify.error("Fallo el servidor :(");
            }
        }
    });
}


function preguntarSiNocriterio(id) {
    alertify.confirm('Eliminar criterio', '¿Esta seguro de eliminar este criterio?',
            function () {
                eliminarDatoscriterio(id)
            }
    , function () {
        alertify.error('Se cancelo')
    });
}


function eliminarDatoscriterio(id) {

    cadena = "id=" + id;

    $.ajax({
        type: "POST",
        url: "php/eliminarDatoscriterio.php",
        data: cadena,
        success: function (r) {
            if (r == 1) {
               $('#tabla_criterios_aceptacion').load('componentes/tabla_criterios_aceptacion.php');
                $('#tabla_tareas').load('componentes/tabla_tareas.php');
                 alertify.success("Eliminado con exito!");
            } else {
                alertify.error("Fallo el servidor :(");
            }
        }
    });
}


function agregaformcriterio(datos) {

    d = datos.split('||');

    $('#idcriterio_edt').val(d[0]);
    $('#escenarioc').val(d[1]);
    $('#desencadenantec').val(d[2]);
    $('#resultadoc').val(d[3]);

}