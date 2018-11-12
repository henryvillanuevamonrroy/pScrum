<!DOCTYPE html>
<?php include ('../../conexionbd/session.php'); ?>
<?php include ('../../includes/header.php'); ?>

<?php
require_once ('./componentes/ModalCriterio_tarea.php');

$id_historia = $_POST["id_historia"];
$id_historia_name = $_POST["id_historia_name"];

$_SESSION['id_historia'] = $id_historia;
$_SESSION['id_historia_name'] = $id_historia_name;
?>
<script src="../../pages/proyecto/js/funciones.js"></script> 
<!-- ******   CUERPO DEL PROGRAMAAAAAA *******************************************-->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">

        <section class="content-header">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i>Inicio</a></li>
                <li class="active">Proyectos</li>
                <li class="active">Epicas</li>
                <li class="active">Historias</li>
            </ol>
            <h1> <i class='fa fa-edit'></i> <u>Detalle Historia</u></h1>
            <h1><font size="3" face="verdana" color="darkblue"><strong><u><br> <?php echo $id_historia_name; ?></u></strong></font> <br> 
                <font size="2" face="verdana" color="purple">Epica : <?php echo $_SESSION['id_epicas_name']; ?></font> 
                <font size="2" face="verdana" color="green"> - Proyecto : <?php echo $_SESSION['id_proyecto_name']; ?></font></h1>


        </section>

    </section>

    <!--tabla producots-->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">

                    <div class="panel-heading">
                        <div class="page-heading"><i class="glyphicon glyphicon-edit"></i> Detalle de la historia :</div>
                    </div> <!-- /panel-heading -->

                    <div class="panel-body">
                        <h4> <b><u>Criterios de aceptación:</u></b> </h4> <br>
                        <div id="tabla_criterios_aceptacion"></div>
                    </div><!--panel-body-->

                    <div class="panel-body">
                        <h4> <b><u>Definición de tareas:</u></b> </h4> <br>
                        <div id="tabla_tareas"></div>
                    </div><!--panel-body-->

                </div><!--panel-default-->
            </div><!-- /.col -->

        </div><!-- /.row -->

        <div class="row">
            <div class="col-md-6"> </div>
            <div class="col-md-2"> 
            </div>
            <div class="col-md-2"> </div>
            <div class="col-md-2">

            </div><!-- /.col -->

        </div>
    </section>


</div>

<?php include ('../../includes/footer.php'); ?>

<script type="text/javascript">
    $(document).ready(function () {
        $('#tabla_criterios_aceptacion').load('componentes/tabla_criterios_aceptacion.php');
        $('#tabla_tareas').load('componentes/tabla_tareas.php');
    });
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#guardarnuevo_criterio').click(function () {
            escenario = $('#escenario').val();
            desencadenante = $('#desencadenante').val();
            resultado = $('#resultado').val();
            id_historia = $('#id_historia').val();

            agregarcriterios(escenario, desencadenante, resultado, id_historia);
        });

        $('#guardarnuevo_tarea').click(function () {
            descripcion_tarea = $('#descripcion_tarea').val();
            id_historia_tarea = $('#id_historia_tarea').val();

            agregartareas(descripcion_tarea, id_historia_tarea);
        });




        $('#actualizacriterio').click(function () {

            actualizacriterio();
        });

    });
</script>