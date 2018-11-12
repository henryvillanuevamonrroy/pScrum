<!DOCTYPE html>
<?php include ('../../conexionbd/session.php'); ?>
<?php include ('../../includes/header.php'); ?>

<?php 
require_once ('./componentes/dias_horarios/Modalhorario.php');

$grado = $_POST["grado"]; 
 $_SESSION['horario_grado'] = $grado;
$grado_valor ;

switch ($grado) {
    case 16:
        $grado_valor = "Sexto grado de primaria";
        break;
    case 21:
        $grado_valor = "1er grado de secundaria";
        break;
    case 22:
        $grado_valor = "2do grado de secundaria";
        break;
    case 23:
        $grado_valor = "3er grado de secundaria";
        break;
    case 24:
        $grado_valor = "4to grado de secundaria";
        break;
    case 25:
        $grado_valor = "5to grado de secundaria";
        break;
}


?>
<script src="../../pages/horario//js/funciones.js"></script> 


<!-- ******   CUERPO DEL PROGRAMAAAAAA *******************************************-->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">

        <section class="content-header">

        <section class="content-header">
            <h1> <i class='fa fa-edit'></i> Administrar Horarios</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i>Inicio</a></li>
                <li class="breadcrumb-item">Horario</li>
                <li class="active">Creación de horario</li>
            </ol>
        </section>

    </section>

    </section>

    <!--tabla producots-->
    <section class="content">
       <div class="row">
            <div class="col-md-2">

                <button class="btn btn-warning" onclick="window.location='horarios2.php';">
                     <span class="fa fa-angle-double-left"></span>
                    Anterior
                </button>

            </div><!-- /.col -->
            <div class="col-md-10"> </div>
        </div>
        <br><br>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">

                    <div class="panel-heading">
                        <div class="page-heading"><i class="glyphicon glyphicon-edit"></i> Creaci&oacute;n de horario - parte 1</div>
                    </div> <!-- /panel-heading -->

                    <div class="panel-body">
                        <h4> <b>Ingresar Horario para <?php echo $grado_valor ?> :</b> </h4> <br>
                        <h5> Por favor ingrese la informaci&oacute;n de los cursos y docentes para cada día de la semana.</h5>

                        <h4>Lunes:</h4>
                        <div id="tabla_lunes"></div>
                        <br>
                        <br>
                        <h4>Martes:</h4>
                        <div id="tabla_martes"></div>
                        <br>
                        <br>
                        <h4>Miercoles:</h4>
                        <div id="tabla_miercoles"></div>
                        <br>
                        <br>
                        <h4>Jueves:</h4>
                        <div id="tabla_jueves"></div>
                        <br>
                        <br>
                        <h4>Viernes:</h4>
                        <div id="tabla_viernes"></div>
                        <br>
                        <br>
                    </div><!--panel-body-->

                </div><!--panel-default-->
            </div><!-- /.col -->

        </div><!-- /.row -->

     
    </section>


</div>

<?php include ('../../includes/footer.php'); ?>

<script type="text/javascript">
    $(document).ready(function () {
        $('#tabla_lunes').load('componentes/dias_horarios/tabla_lunes.php');
        $('#tabla_martes').load('componentes/dias_horarios/tabla_martes.php');
        $('#tabla_miercoles').load('componentes/dias_horarios/tabla_miercoles.php');
        $('#tabla_jueves').load('componentes/dias_horarios/tabla_jueves.php');
        $('#tabla_viernes').load('componentes/dias_horarios/tabla_viernes.php');
        
        
        $('#actualizadatos_horario').click(function () {

            actualizadatos_horario();
        });
    });
</script>

