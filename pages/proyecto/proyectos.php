<!DOCTYPE html>
<?php include ('../../conexionbd/session.php'); ?>
<?php include ('../../includes/header.php'); ?>

<?php
require_once ('./componentes/ModalProyecto.php');

?>
<script src="../../pages/proyecto/js/funciones.js"></script> 
<!-- ******   CUERPO DEL PROGRAMAAAAAA *******************************************-->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">

        <section class="content-header">
            <h1> <i class='fa fa-edit'></i> <u>Administrar proyectos</u></h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i>Inicio</a></li>
               <li class="active">Proyectos</li>
            </ol>
        </section>

    </section>

    <!--tabla producots-->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">

                    <div class="panel-heading">
                        <div class="page-heading"><i class="glyphicon glyphicon-edit"></i> Configuraci&oacute;n de proyectos</div>
                    </div> <!-- /panel-heading -->

                    <div class="panel-body">
                        <h4> <b>Establecer los Proyectos:</b> </h4> <br>
                        <div id="tabla_proyectos"></div>
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
        $('#tabla_proyectos').load('componentes/tabla_proyectos.php');
    });
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#guardarnuevo_proyecto').click(function () {
            proyecto = $('#proyecto').val();
            descripcion = $('#descripcion').val();
            agregarproyectos(proyecto, descripcion);
        });



        $('#actualizaproyecto').click(function () {

            actualizacursos();
        });

    });
</script>