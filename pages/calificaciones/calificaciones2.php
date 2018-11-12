<!DOCTYPE html>
<?php include ('../../conexionbd/session.php'); ?>
<?php include ('../../includes/header.php'); ?>
<?php require_once ('../../controllers/calificaciones/calificacionesModal.php'); ?>

<!-- ******   CUERPO DEL PROGRAMAAAAAA *******************************************-->
<?php
$grado = $_POST["grado"];
$accion = $_POST["accion"];
$grado_valor;

$_SESSION['cal_grado'] = $grado;
$_SESSION['cal_accion'] = $accion;
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

<?php if ($accion == "ingresar") { ?>
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">

            <section class="content-header">

                <section class="content-header">
                    <h1> <i class='fa fa-edit'></i> Calificaciones de Alumnos</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i>Inicio</a></li>
                        <li class="breadcrumb-item">Calificaciones</li>
                        <li class="active">Ingresar Notas</li>
                    </ol>
                </section>

            </section>

        </section>

        <br>
        <!--tabla producots-->
        <section class="content">

            <div class="row">
                <div class="col-md-2">


                </div><!-- /.col -->
                <div class="col-md-10"> </div>
            </div>

            <br>
            <form action="componentes/agregarnotas.php" method="post">   

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">

                            <div class="panel-heading">
                                <div class="page-heading"><i class="glyphicon glyphicon-edit"></i> Ingrese notas :</div>
                            </div> <!-- /panel-heading -->

                            <div class="panel-body">
                                <h4> <b>Alumnos del <u><?php echo $grado_valor ?></u></b> </h4> 

                                <h5> <b>Ingrese una pequeña decripción:</b> </h5>
                                <div  ><textarea class="form-control" placeholder="Ingresar la descripción y la fecha de la prueba" rows="2" name="descripcion_tipo" id="descripcion_tipo"></textarea></div>
                                <br>
                                <h5> <b>Ingrese el tipo de prueba:</b> </h5>
                                <div >
                                    <select class="form-control select2" id="tipo" name="tipo" style="width: 100%;" required>
                                        <option value="examen">Por examen</option>
                                        <option value="practica">Por práctica</option>
                                        <option value="tarea">Por tarea</option>
                                    </select>
                                </div>
                                <br>
                                <h5> <b>Ingrese el curso:</b> </h5>
                                <div >
                                    <select class="form-control select2" id="curso" name="curso" style="width: 100%;" required>
                                        <?php
                                        if ($_SESSION['rol_number'] == 4) {
                                            $sql = "SELECT distinct curso from horario h join login l on l.dni = h.docente where h.docente = " . $_SESSION['dni'];
                                        } else {
                                            $sql = "SELECT distinct curso from horario ";
                                        }
                                        $result = $connect->query($sql);
                                        while ($row = $result->fetch_array()) {
                                            echo "<option value='" . $row[0] . "'>" . $row[0] . "</option>";
                                        } // while
                                        ?>    

                                    </select>
                                </div>
                                <br>
                                <h5> <b>Ingrese las notas:</b> </h5> 
                                <div  id="tabla_calificaciones"></div>
                            </div><!--panel-body-->

                        </div><!--panel-default-->
                    </div><!-- /.col -->

                </div><!-- /.row -->


            </form>
        </section>


    </div>

<?php } else { ?>





    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">

            <section class="content-header">
                <h1> <i class='fa fa-edit'></i> Calificaciones de Alumnos</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i>Inicio</a></li>
                    <li class="breadcrumb-item">Calificaciones</li>
                    <li class="active">Visualizaci&oacute;n de Notas</li>
                </ol>
            </section>
            <br>
            <br>
            <div class="row">
                <div class="col-md-3">
                    <label><font color="blue">Tipo :</font></label>
                    <select id="selecttipo" onchange="myPillFiltertipo(1, 'selecttipo')" class="form-control select2" style="width: 100%;">                      
                        <option value="">Seleccionar</option>
                        <option value="examen">Por examen</option>
                        <option value="practica">Por práctica</option>
                        <option value="tarea">Por tarea</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label><font color="blue">Curso :</font></label>
                    <select id="selectcurso" onchange="myPillFiltercurso(0, 'selectcurso')" class="form-control select2" style="width: 100%;">                      
                        <?php
                        if ($_SESSION['rol_number'] == 4) {
                            $sql = "SELECT distinct curso from horario h join login l on l.dni = h.docente where h.docente = " . $_SESSION['dni'];
                        } else {
                            $sql = "SELECT distinct curso from horario ";
                        }
                        $result = $connect->query($sql);
                        while ($row = $result->fetch_array()) {
                            echo "<option value='" . $row[0] . "'>" . $row[0] . "</option>";
                        } // while
                        ?>  
                    </select>
                </div>

                <div class="col-md-3 col-xs-3">
                    <label><font color="blue"></font></label>
                    <button id="borrarFiltro" class="buton" name="borrarFiltro" type="button" class="btn btn-primary">Reiniciar</button>
                </div>
                <style>
                    .buton {
                        background-color: #2E64FE;
                        border: none;
                        color: white;
                        padding: 8px 20px;
                        text-align: center;
                        text-decoration: none;
                        display: inline-block;
                        font-size: 16px;
                        margin: 16px 2px;
                        cursor: pointer;
                    }
                </style>
            </div>
        </section>

        <!--tabla producots-->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">

                        <div class="panel-heading">
                            <div class="page-heading"><i class="glyphicon glyphicon-edit"></i> Listado Usuarios</div>
                        </div> <!-- /panel-heading -->

                        <!-- Boton agregar excel -->
                        <div class="panel-body">

                            <div class="remove-messages"></div>

                            <div class="row">
                                <div class="table-responsive" style="width: 100%;">
                                    <table class="demo cell-border dataTable" style="width: 100%;text-align:center;" id="manageProductTable" cellspacing="2px;" >
                                        <thead><tr>
                                                <th class="text-center">Curso</th>
                                                <th class="text-center">Tipo</th>
                                                <th class="text-center">Docente</th>
                                                <th class="text-center">Fecha de prueba</th>
                                                <th class="text-center">Editar</th>
                                                <th class="text-center">Eliminar</th>
                                            </tr></thead>
                                    </table>
                                </div><!--fin_tabla-->
                            </div>
                        </div><!--panel-body-->

                    </div><!--panel-default-->
                </div><!-- /.col -->

            </div><!-- /.row -->

        </section>


    </div>




<?php } ?>
<?php include ('../../includes/footer.php'); ?>
<script src="../../controllers/calificaciones/js/calificaciones.js"></script>
<script type="text/javascript">
                        $(document).ready(function () {
                            $('#tabla_calificaciones').load('componentes/tabla_calificaciones.php');
                        });
</script>

