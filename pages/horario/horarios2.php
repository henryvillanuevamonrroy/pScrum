<!DOCTYPE html>
<?php include ('../../conexionbd/session.php'); ?>
<?php include ('../../includes/header.php'); ?>



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

    <br>
    <!--tabla producots-->
    <section class="content">
        
        <div class="row">
            <div class="col-md-2">

                <button class="btn btn-warning" onclick="window.location='horarios.php';">
                     <span class="fa fa-angle-double-left"></span>
                    Anterior
                </button>

            </div><!-- /.col -->
            <div class="col-md-10"> </div>
        </div>
        
        <br>
        <form action="horarios3.php" method="post">   
            
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">

                    <div class="panel-heading">
                        <div class="page-heading"><i class="glyphicon glyphicon-edit"></i> Creaci&oacute;n de horario - parte 2</div>
                    </div> <!-- /panel-heading -->

                    <div class="panel-body">
                        <h4> <b>Seleccionar el grado del horario :</b> </h4> <br>
                        <h5> Por favor ingrese el grado del cual desea modificar el horario: </h5>
                         
                          <div class="form-group">
                                    <label class="col-sm-2 control-label">Grado:</label>
                                    <div class="col-sm-6">
                                          <select class="form-control select2" id="grado" name="grado" style="width: 100%;" required>
                                            <option value="16">6to primaria</option>
                                            <option value="21">1ro Secundaria</option>
                                            <option value="22">2do Secundaria</option>
                                            <option value="23">3ro Secundaria</option>
                                            <option value="24">4to Secundaria</option>
                                            <option value="25">5to Secundaria</option>                                      
                                        </select>
                                    </div>
                                </div>
                       
                    </div><!--panel-body-->

                </div><!--panel-default-->
            </div><!-- /.col -->

        </div><!-- /.row -->
        
        
        <div class="row">
            <div class="col-md-10"> </div>
            <div class="col-md-2">

                <button  onclick="document.forms[0].submit()" class="btn btn-success">
                    Siguiente
                    <span class="fa fa-angle-double-right"></span>
                </button>
               

            </div><!-- /.col -->

        </div>
        </form>
    </section>


</div>

<?php include ('../../includes/footer.php'); ?>


