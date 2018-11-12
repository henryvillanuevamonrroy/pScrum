<!DOCTYPE html>
<?php include ('../../conexionbd/session.php'); ?>
<?php include ('../../includes/header.php'); ?>

<?php
error_reporting(0);
session_start();

function comprobar_email($email) {
    $mail_correcto = 0;
    //compruebo unas cosas primeras 
    if ((strlen($email) >= 6) && (substr_count($email, "@") == 1) && (substr($email, 0, 1) != "@") && (substr($email, strlen($email) - 1, 1) != "@")) {
        if ((!strstr($email, "'")) && (!strstr($email, "\"")) && (!strstr($email, "\\")) && (!strstr($email, "\$")) && (!strstr($email, " "))) {
            //miro si tiene caracter . 
            if (substr_count($email, ".") >= 1) {
                //obtengo la terminacion del dominio 
                $term_dom = substr(strrchr($email, '.'), 1);
                //compruebo que la terminación del dominio sea correcta 
                if (strlen($term_dom) > 1 && strlen($term_dom) < 5 && (!strstr($term_dom, "@"))) {
                    //compruebo que lo de antes del dominio sea correcto 
                    $antes_dom = substr($email, 0, strlen($email) - strlen($term_dom) - 1);
                    $caracter_ult = substr($antes_dom, strlen($antes_dom) - 1, 1);
                    if ($caracter_ult != "@" && $caracter_ult != ".") {
                        $mail_correcto = 1;
                    }
                }
            }
        }
    }
    if ($mail_correcto)
        return 1;
    else
        return 0;
}

include ("../../conexionbd/connectDB.php");
$errors = array();
$msj = array();
if ($_POST) {
    $usuario = strtoupper($connect->real_escape_string($_POST['usuario'])); // Escapando caracteres especiales
    $password = strtoupper($connect->real_escape_string($_POST['password']));
    $nombre = strtoupper($connect->real_escape_string($_POST['nombre'])); // Escapando caracteres especiales
    $apellido = strtoupper($connect->real_escape_string($_POST['apellido']));
    $email = strtoupper($connect->real_escape_string($_POST['email']));
    $temp = strtoupper($connect->real_escape_string($_POST['pass']));
    $dni = $connect->real_escape_string($_POST['dni']);
    $rol = strtoupper($connect->real_escape_string($_POST['rol']));
    $datepicker = strtoupper($connect->real_escape_string($_POST['datepicker']));
    $celular = strtoupper($connect->real_escape_string($_POST['celular']));
    $telefono = strtoupper($connect->real_escape_string($_POST['telefono']));
    $direccion = strtoupper($connect->real_escape_string($_POST['direccion']));
    //echo $usuario.$nombre.$password.$apellido.$email;
    $rpta = comprobar_email($email);
    $_SESSION['mail'] = $email;
    $_SESSION['DNI'] = $dni;
    $_SESSION['nombre_ing'] = $nombre;
    $sql = "SELECT * FROM login WHERE username = '$usuario'";


    $result = $connect->query($sql);
    $rows = $result->num_rows;
    //echo $rows;

    if ($password != $temp) {
        $errors[] = "Las contraseñas no coinciden";
    } else {
        if ($rpta == 0) {
            $errors[] = "El formato de email no es correcto";
        } else {
            if ($rows >= 1) {
                $errors[] = "El nombre de usuario ya existe";
            } else {

                $sql = "call registrar('$usuario','$password','$nombre','$apellido','$email','$rol','$dni','$datepicker','$celular','$telefono','$direccion')";
                //echo  $sql;

                if ($connect->query($sql) === TRUE) {
                    ?>
                    <!--$msj[] = "El usuario ha sido registrado"; -->
                    <script type="text/javascript">
                        //alert("El usuario se registro", "Seguridad");
                    </script>
                    <?php
                    $_SESSION['nombres'] = $nombres;
                    include './correo_new_users.php';
                } else {
                    ?><script type="text/javascript">
                        alert("El usuario no se registro", "Seguridad");
                    </script><?php
                }
                
                
                //header('location: login.php');
            } // /else
        }
    }
} // /if $_POST
?>
<!-- ******   CUERPO DEL PROGRAMAAAAAA *******************************************-->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1> <i class='fa fa-edit'></i> Agregar nuevo usuario</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i>Inicio</a></li>
            <li class="breadcrumb-item">Usuarios</li>
            <li class="active">Nuevo Usuario</li>
        </ol>
    </section>


    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-3">
                <!-- Profile Image -->
                <!-- /.box image -->
            </div>
            <!-- /.col -->

            <div class="col-md-9">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#info1" data-toggle="tab">Añadir Usuario</a></li>       
                    </ul>

                    <div class="tab-content">
                        <div class="messages">
                            <?php
                            if ($errors) {
                                foreach ($errors as $key => $value) {
                                    echo '<div class="alert alert-warning" role="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>
									<i class="glyphicon glyphicon-exclamation-sign"></i>
									' . $value . '</div>';
                                }
                            }

                            if ($msj) {
                                foreach ($msj as $key => $value) {
                                    echo '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>
									<i class="glyphicon glyphicon-ok"></i>
									' . $value . '</div>';
                                }
                            }
                            ?>
                        </div>

                        <div class="tab-pane fade in active" id="info1">                 
                            <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>"  class="form-horizontal" method="POST" id="loginform" accept-charset="utf-8">


                                <div class="form-group ">     
                                    <label class="col-sm-3 control-label">Nombres</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="nombre" name="nombre"autocomplete="off" placeholder="Ingresar Nombre" required>
                                    </div>
                                </div> 

                                <div class="form-group ">
                                    <label class="col-sm-3 control-label">Apellidos</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Ingresar Apellidos" autocomplete="off" required>
                                    </div>
                                </div> 

                                <div class="form-group ">
                                    <label class="col-sm-3 control-label">DNI</label>
                                    <div class="col-sm-6">
                                        <input  type="text"  class="form-control" id="dni" name="dni" placeholder="Ingresar DNI" autocomplete="off" required maxlength="8">
                                    </div>
                                </div> 

                                <div class="form-group ">
                                    <label class="col-sm-3 control-label">Usuario</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Ingresar Usuario"  autocomplete="off" required>
                                    </div>
                                </div> 

                                <div class="form-group ">
                                    <label class="col-sm-3 control-label">Contraseña</label>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Ingresar Contraseña" autocomplete="off" required>
                                    </div>
                                </div> 

                                <div class="form-group ">
                                    <label class="col-sm-3 control-label">Confirmar Contraseña</label>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control" id="pass" name="pass" placeholder="Confirmar Contraseña"  autocomplete="off" required>
                                    </div>
                                </div> 

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Rol de Usuario</label>
                                    <div class="col-sm-6">
                                        <select class="form-control select2" id="rol" name="rol" style="width: 100%;">
                                            <option value="0">Seleccionar</option>
                                            <?php if ($_SESSION['rol'] == "Administrativo") { ?>
                                                <option value="4">Docente</option>
                                                <option value="5">Auxiliar</option>
                                                <option value="6">Administrativo</option>
                                            <?php } else { ?>
                                                <option value="2">Director</option>
                                                <option value="3">SubDirector</option>
                                                <option value="4">Docente</option>
                                                <option value="5">Auxiliar</option>
                                                <option value="6">Administrativo</option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label class="col-sm-3 control-label">Correo</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="email" name="email" placeholder="example@gmail.com"  autocomplete="off" required>
                                    </div>
                                </div> 

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Fecha de Nacimiento</label>
                                    <div class="col-sm-6 controls input-append date form_date" data-date="" data-date-format="dd MM yyyy" data-link-field="datepicker" data-link-format="dd/mm/yyyy">
                                        <div class="input-prepend input-group">
                                            <span class="add-on input-group-addon">
                                                <i class="fa fa-calendar"></i></span>
                                                <input class="form-control" type="text" id="datepicker" name="datepicker" required readonly/>
                                        </div>

                                    </div>
                                </div>
                             
                                <div class="form-group ">
                                    <label class="col-sm-3 control-label">Celular</label>
                                    <div class="col-sm-6">
                                        <input  type="text"  class="form-control" id="celular" name="celular" placeholder="Ingresar celular" autocomplete="off" required maxlength="9">
                                    </div>
                                </div> 
                                <div class="form-group ">
                                    <label class="col-sm-3 control-label">Tel&eacute;fono</label>
                                    <div class="col-sm-6">
                                        <input  type="text"  class="form-control" id="telefono" name="telefono" placeholder="Ingresar telefono" autocomplete="off" required maxlength="7">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="col-sm-3 control-label">Direcci&oacute;n</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Ingresar direccion"  autocomplete="off" required>
                                    </div>
                                </div> 

                                <div class="form-group">
                                    <div class="col-sm-offset-7 col-md-6">                             
                                        <button type="submit" id='validate' class="btn btn-primary">Registrarme</button>    
                                    </div>
                                </div> 

                            </form>
                        </div>
                    </div><!-- /.nav-tabs-custom --> 
                </div> <!-- /.col md9 -->
            </div>	<!-- /.row -->



        </div>	<!-- /.row -->
    </section><!-- /.content -->

</div> <!-- content-wrapper  -->




  <script type="text/javascript" src="./datepicker/jquery/jquery-1.8.3.min.js" charset="UTF-8"></script>
        <script type="text/javascript" src="./datepicker/bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="./datepicker/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
        <script type="text/javascript" src="./datepicker/js/locales/bootstrap-datetimepicker.es.js" charset="UTF-8"></script>
        <link href="./datepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
        <link href="./datepicker/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">

        <script type="text/javascript">

            $('.form_date').datetimepicker({
                language: 'es',
                weekStart: 1,
                todayBtn: 1,
                autoclose: 1,
                todayHighlight: 1,
                startView: 2,
                minView: 2,
                forceParse: 0
            });

        </script>
<?php include ('../../includes/footer.php'); ?>
