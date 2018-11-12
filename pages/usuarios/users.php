<!DOCTYPE html>
<?php include ('../../conexionbd/session.php'); ?>
<?php include ('../../includes/header.php'); ?>
<?php require_once ('../../controllers/usuarios/userModal.php'); ?>


<!-- ******   CUERPO DEL PROGRAMAAAAAA *******************************************-->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">

        <section class="content-header">
            <h1> <i class='fa fa-edit'></i> <u>Consultar Administrativos</u></h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i>Inicio</a></li>
                <li class="breadcrumb-item">Usuarios</li>
                <li class="active">Consultar Administrativos</li>
            </ol>
        </section>
        <br>
        <br>
        <div class="row">
            <div class="col-md-3">
                <label><font color="Orange">Nombres :</font></label>
                <input id="inputId" class="form-control" type="text" placeholder="Nombre">
            </div>
            <div class="col-md-3">
                <label><font color="orange">Apellidos :</font></label>
                <input id="inputape" class="form-control" type="text" placeholder="Apellido">
            </div>

            <div class="col-md-3">
                <label><font color="orange">Rol de Usuario  :</font></label>
                <select id="selectRol" onchange="myPillFilter(7, 'selectRol')" class="form-control select2" style="width: 100%;">                      
                    <option value="">Seleccionar</option>
                    <option value="Administrador">Administrador</option>
                    <option value="Director">Director</option>
                    <option value="SubDirector">SubDirector</option>
                    <option value="Docente">Docente</option>
                    <option value="Auxiliar">Auxiliar</option>
                    <option value="Administrativo">Administrativo</option>
                    <option value="Estudiante">Estudiante</option>


                </select>
            </div>
            <div class="col-md-3">
                <label><font color="blue"></font></label>
                <button id="borrarFiltro" class="buton" name="borrarFiltro" type="button" class="btn btn-warning">Reiniciar</button>
            </div>
            <style>
                .buton {
                    background-color: orange;
                    border: none;
                    color: black;
                    padding: 8px 20px;
                    text-align: center;
                    text-decoration: none;
                    display: inline-block;
                    font-size: 16px;
                    margin: 16px 2px;
                    cursor: pointer;
                    border-radius:15px;
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
                                <table class="demo cell-border dataTable" id="manageProductTable" cellspacing="2px;" style="width: 100%;">
                                    <thead><tr>
                                            <th class="text-center">Opciones</th>
                                            <th class="text-center">Nombre</th>
                                            <th class="text-center">Apellidos</th>
                                            <th class="text-center">Usuario</th>
                                            <th class="text-center">DNI</th>
                                            <th class="text-center">Correo</th>
                                            <th class="text-center">Estado</th>
                                            <th class="text-center">Rol de Usuario</th>
                                            <th class="text-center" >Fecha de Creación</th>

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
<script src="../../controllers/usuarios/js/user.js"></script>
<?php include ('../../includes/footer.php'); ?>