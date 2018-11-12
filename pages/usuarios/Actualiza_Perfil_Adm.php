<!DOCTYPE html>
<?php include ('../../conexionbd/session.php'); ?>
<?php include ('../../includes/header.php');
?>
<!-- ******   CUERPO DEL PROGRAMAAAAAA *******************************************-->
<?php
if ($_POST) {

    $celular = $connect->real_escape_string($_POST['celular']); // Escapando caracteres especiales
    $email = $connect->real_escape_string($_POST['email']);
    $password = $connect->real_escape_string($_POST['password']);
    $dni = $connect->real_escape_string($_POST['iddni']);


    $sql = "UPDATE login SET celular='$celular', email='$email', password='$password' WHERE dni = '$dni'";
    if ($connect->query($sql) === TRUE) {
        echo '<script type="text/javascript">
    alert("Se ha modificado correctamente");
    </script>';
        $_SESSION['celular'] = $celular;
    } else {
        echo '<script type="text/javascript">
    alert("No se ha modificado los cambios");
    </script>';
    }
} // /if $_POST


error_reporting(0);
session_start();
//Subir archivos - inicio
$uploadedfileload = "true";
$uploadedfile_size = $_FILES['uploadedfile'][size];
//echo $_FILES[uploadedfile][name];
if ($_FILES[uploadedfile][size] > 200000) {
    $msg = $msg . "El archivo es mayor que 200KB, debes reduzcirlo antes de subirlo";
    $uploadedfileload = "false";
    
}

if (!($_FILES[uploadedfile][type] == "image/jpeg" OR $_FILES[uploadedfile][type] == "image/gif" OR $_FILES[uploadedfile][type] == "image/png")) {
    $msg = $msg . " Tu archivo tiene que ser JPG o GIF. Otros archivos no son permitidos";
    $uploadedfileload = "false";
   
    
}

//$file_name = $_FILES[uploadedfile][name];
//$add="uploads_perfil/$file_name";
$add = "uploads_perfil/" . $_SESSION['dni'] . ".jpeg";
if ($uploadedfileload == "true") {

    if (move_uploaded_file($_FILES[uploadedfile][tmp_name], $add)) {
        echo '<script type="text/javascript">
    
    </script>';
    } else {

        echo '<script type="text/javascript">
    alert("Error al subir el archivo");
    </script>';
    }
} else {
    echo '<script type="text/javascript">
    alert("'.$msg.'");
     
    </script>';
}
//Fin cambiar Perfil
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1> <i class='fa fa-edit'></i> Mi Perfil</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i>Inicio</a></li>
            <li class="breadcrumb-item">Usuarios</li>
            <li class="active">Mi Perfil</li>
        </ol>
    </section>


    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-3">
                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <div id="load_img">
                            <center>
                                <?php
                                $foto_perfil = "../../pages/usuarios/uploads_perfil/" . $_SESSION['dni'] . ".jpeg";

                                if (file_exists($foto_perfil)) {
                                    ?>
                                    <img class=" img-responsive" src="../../pages/usuarios/uploads_perfil/<?php echo $_SESSION['dni'] . ".jpeg" ?>" alt="usuario">
                                <?php } else { ?>
                                    <img class=" img-responsive" src="../../assests/images/usuario.png" alt="usuario">

                                <?php } ?>
                            </center>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box image -->
            </div>
            <div class="col-md-9">
                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <div id="DatosPerfil">
                            <h2> <center><?php echo $_SESSION['nombres'] . " " . $_SESSION['apellidos']; ?> </center> </h2>
                            <br>
                            <h4> <center><?php echo $_SESSION['rol']; ?></center> </h4>
                        </div>
                        <b>Cambiar foto de perfil</b>
                        <input type="checkbox" name="check" id="check" value="1" onchange="javascript:showContent()" />
                        <div id="content" style="display: none;">
                            <form enctype="multipart/form-data" action="" method="POST">
                                <input name="uploadedfile" type="file">
                                <input type="submit" value="Subir archivo">
                            </form> 

                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box image -->
            </div>
            <div class="col-md-12">
                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <div id="DatosPerfil_2">
                            <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>"  class="form-horizontal" id="perfilform" accept-charset="utf-8">


                                <div class="form-group ">     
                                    <label class="col-sm-3 control-label">Nombres</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" value="<?php echo $_SESSION['nombres']; ?>" id="nombre" name="nombre"autocomplete="off" placeholder="Ingresar Nombre" disabled>
                                    </div>
                                </div> 

                                <div class="form-group ">
                                    <label class="col-sm-3 control-label">Apellidos</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" value="<?php echo $_SESSION['apellidos']; ?>" id="apellido" name="apellido" placeholder="Ingresar Apellidos" autocomplete="off" disabled>
                                    </div>
                                </div> 

                                <div class="form-group ">
                                    <label class="col-sm-3 control-label">DNI</label>
                                    <div class="col-sm-6">
                                        <input  type="text"  class="form-control" id="iddni" name="iddni" value="<?php echo $_SESSION['dni']; ?>" placeholder="Ingresar DNI"  >
                                    </div>
                                </div> 

                                <div class="form-group ">
                                    <label class="col-sm-3 control-label">Usuario</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="usuario" name="usuario" value="<?php echo $_SESSION['username']; ?>" placeholder="Ingresar Usuario"  autocomplete="off" disabled>
                                    </div>
                                </div> 

                                <div class="form-group ">
                                    <label class="col-sm-3 control-label">Celular</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="celular" name="celular" value="<?php echo $_SESSION['celular']; ?>" placeholder="Ingrese Celular" autocomplete="off" required>
                                    </div>
                                </div> 


                                <div class="form-group ">
                                    <label class="col-sm-3 control-label">Correo</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="email" name="email" placeholder="example@gmail.com"  value="<?php echo $_SESSION['correo']; ?>" autocomplete="off" required>
                                    </div>
                                </div> 
                                Si desea cambiar la contraseña ingrese la nueva contraseña, caso contrario déjelo tal como está.
                                <div class="form-group ">
                                    <label class="col-sm-3 control-label">Nueva Contraseña </label>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control" value="<?php echo $_SESSION['password']; ?>" id="password" name="password" placeholder="example@gmail.com"  value="<?php echo $_SESSION['correo']; ?>" autocomplete="off" required>
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <div class="col-sm-offset-7 col-md-6">                             
                                        <button type="submit" id='validate' class="btn btn-primary">Actualizar</button>    
                                    </div>
                                </div>             
                            </form>

                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box image -->
            </div>

    </section>
</div> <!-- content-wrapper -->

<script type="text/javascript">
    function showContent() {
        element = document.getElementById("content");
        check = document.getElementById("check");
        if (check.checked) {
            element.style.display = 'block';
        } else {
            element.style.display = 'none';
        }
    }
</script>

<script src="../../controllers/inventario/js/product.js"></script>
<?php include ('../../includes/footer.php'); ?>
  