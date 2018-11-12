<!DOCTYPE html>
<?php include ('../../conexionbd/session.php'); ?>
<?php include ('../../includes/header.php'); ?>

<?php
require_once ('./componentes/userModalcurso.php');

?>
<script src="../../pages/cursos/js/funciones.js"></script> 
<!-- ******   CUERPO DEL PROGRAMAAAAAA *******************************************-->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">

        <section class="content-header">
            <h1> <i class='fa fa-edit'></i> Administrar Cursos</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i>Inicio</a></li>
                <li class="breadcrumb-item">Configuraci&oacute;n</li>
                <li class="active">Cursos</li>
            </ol>
        </section>

    </section>

    <!--tabla producots-->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">

                    <div class="panel-heading">
                        <div class="page-heading"><i class="glyphicon glyphicon-edit"></i> Configuraci&oacute;n de cursos</div>
                    </div> <!-- /panel-heading -->

                    <div class="panel-body">
                        <h4> <b>Establecer los cursos:</b> </h4> <br>
                        <h5> Por favor configure los cursos a dictarse: </h5>


                        <div id="tabla_cursos"></div>
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
        $('#tabla_cursos').load('componentes/tabla_cursos.php');
    });
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#guardarnuevo_curso').click(function () {
            curso = $('#curso').val();
            descripcion = $('#descripcion').val();
            agregarcursos(curso, descripcion);
        });



        $('#actualizacursos').click(function () {

            actualizacursos();
        });

    });
</script>