<!DOCTYPE html>
<?php include ('../../conexionbd/session.php'); ?>
<?php include ('../../includes/header.php'); ?>

<?php
require_once ('./componentes/ModalHistoria.php');

$id_epicas = $_POST["id_epicas"]; 
$id_epicas_name = $_POST["id_epicas_name"]; 

$_SESSION['$id_epicas'] = $id_epicas;
$_SESSION['$id_epicas_name'] = $id_epicas_name;

?>
<script src="../../pages/proyecto/js/funciones.js"></script> 
<!-- ******   CUERPO DEL PROGRAMAAAAAA *******************************************-->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">

        <section class="content-header">
            <h1><font size="5" face="verdana" color="purple"><strong><u>Epica : <?php echo $id_epicas_name;?></u></strong></font> <br> <font size="4" face="verdana" color="green">Proyecto <?php echo $_SESSION['id_proyecto_name'];?></font></h1><br>
            <h1> <i class='fa fa-edit'></i> <u>Administrar Historias</u></h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i>Inicio</a></li>
               <li class="active">Proyectos</li>
               <li class="active">Epicas</li>
               <li class="active">Historias</li>
            </ol>
        </section>

    </section>

    <!--tabla producots-->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">

                    <div class="panel-heading">
                        <div class="page-heading"><i class="glyphicon glyphicon-edit"></i> Configuraci&oacute;n de las historias de la epica : <?php echo $id_epicas_name;?></div>
                    </div> <!-- /panel-heading -->

                    <div class="panel-body">
                        <h4> <b>Establecer las historias:</b> </h4> <br>
                        <div id="tabla_historias"></div>
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
        $('#tabla_historias').load('componentes/tabla_historias.php');
    });
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#guardarnuevo_historia').click(function () {
            usuario = $('#usuario').val();
            necesidad = $('#necesidad').val();
            razon = $('#razon').val();
            id_epicas = $('#id_epicas').val();
            
            agregarhistorias(usuario, necesidad,razon,id_epicas);
        });



        $('#actualizahistoria').click(function () {

            actualizahistoria();
        });

    });
</script>