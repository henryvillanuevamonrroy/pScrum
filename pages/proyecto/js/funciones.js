

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

function preguntarSiNo(id) {
    alertify.confirm('Eliminar proyecto', '¿Esta seguro de eliminar este proyecto?',
            function () {
                eliminarDatos(id)
            }
    , function () {
        alertify.error('Se cancelo')
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