<!DOCTYPE html>
<?php include ('../../conexionbd/session.php'); ?>
<?php include ('../../includes/header.php'); ?>

<?php
require_once ('./componentes/ModalEpica.php');

$id_proyecto = $_POST["id_proyecto"]; 
$id_proyecto_name = $_POST["id_proyecto_name"]; 

$_SESSION['id_proyecto'] = $id_proyecto;
$_SESSION['id_proyecto_name'] = $id_proyecto_name;

?>
<script src="../../pages/proyecto/js/funciones.js"></script> 
<!-- ******   CUERPO DEL PROGRAMAAAAAA *******************************************-->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">

        <section class="content-header">
            <h1><font size="6" face="verdana" color="green"><strong><u>Proyecto <?php echo $id_proyecto_name;?></u></strong></font></h1><br>
            <h1> <i class='fa fa-edit'></i> <u>Administrar Epicas del proyecto <strong><?php echo $id_proyecto_name;?> </strong></u></h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i>Inicio</a></li>
               <li class="active">Proyectos</li>
               <li class="active">Epicas</li>
            </ol>
        </section>

    </section>

    <!--tabla producots-->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">

                    <div class="panel-heading">
                        <div class="page-heading"><i class="glyphicon glyphicon-edit"></i> Configuraci&oacute;n de las Epicas del proyecto <?php echo $id_proyecto_name;?></div>
                    </div> <!-- /panel-heading -->

                    <div class="panel-body">
                        <h4> <b>Establecer las Epicas del proyecto:</b> </h4> <br>
                        <div id="tabla_epicas"></div>
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
        $('#tabla_epicas').load('componentes/tabla_epicas.php');
    });
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#guardarnuevo_epica').click(function () {
            epica = $('#epica').val();
            descripcion = $('#descripcion').val();
            id_proyecto = $('#id_proyecto').val();
            
            agregarepicas(epica, descripcion,id_proyecto);
        });



        $('#actualizaepica').click(function () {

            actualizaepicas();
        });

    });
</script>