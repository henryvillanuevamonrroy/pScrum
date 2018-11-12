<?php
include ("conexionbd/connectDB.php");

session_start();


$errors = array();

if ($_POST) {

    $username = $connect->real_escape_string($_POST['username']); // Escapando caracteres especiales
    $password = $connect->real_escape_string($_POST['password']);

    if (empty($username) || empty($password)) {
        if ($username == "") {
            $errors[] = "Se requiere nombre de usuario";
        }

        if ($password == "") {
            $errors[] = "Se requiere contraseña";
        }
    } else {
        $sql = "SELECT * FROM login WHERE username = '$username'";
        $result = $connect->query($sql);
        $rows = $result->num_rows;

        if ($rows == 1) {
            //$password = md5($password);
            // exists
            $mainSql = "SELECT * FROM login l join roles_usuarios r on r.ID = l.rol WHERE l.username = '$username' AND l.password = '$password'";
            $mainResult = $connect->query($mainSql);

            if ($mainResult->num_rows == 1) {
                $value = $mainResult->fetch_assoc();
                $user_id = $value['id'];
                $status=$value['situacion'];
                $rol=$value['rol_name'];
                $rol_number=$value['rol'];
                $nombres=$value['nombres'];
                $apellidos=$value['apellidos'];
                $username_db=$value['username'];
                $dni=$value['dni'];
                $email=$value['email'];
                $celular=$value['celular'];
                $password=$value['password'];
                
                $_SESSION['id'] = $user_id;
                $_SESSION['rol'] =  $rol;
                $_SESSION['rol_number'] =  $rol_number;
                $_SESSION['nombres'] =  $nombres;
                $_SESSION['apellidos'] =  $apellidos;
                $_SESSION['dni'] =  $dni;
                $_SESSION['username'] =  $username_db;
                $_SESSION['correo'] =  $email;
                $_SESSION['celular'] =  $celular;
                $_SESSION['password'] =  $password;
                if($status==1){
                // set session;
                
                switch ($rol) {
                    /*
                      **** Matriz de Roles***
                     * Director
                       SubDirector
                       Docente
                       Auxiliar
                       Seguridad
                        Administrativo
                     *                      */
                        case 'Administrador':
                             header('location: pages/novedades/novedades.php');
                            break;
                        
                        default : 
                            header('location: pages/novedades/novedades.php');
                            break;
                    }

                }else{
                    
                     $errors[] = "El usuario se encuentra bloqueado";
                    
                }
            } else {

                $errors[] = "Combinación incorrecta de nombre de usuario y/o contraseña";
            } // /else
        } else {
            $errors[] = "El nombre de usuario no existe";
        } // /else
    } // /else not empty username // password
} // /if $_POST
?>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>pScrum | InLearning</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="assests/plugins/bootstrap/css/bootstrap.min.css">
        <!--estilos propios -->
        <link rel="stylesheet" href="assests/plugins/dist/css/styles.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="assests/plugins/font-awesome/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="assests/plugins/bootstrap/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="assests/plugins/dist/css/AdminLTE.min.css">
        <!-- iCheck -->
        <link rel="stylesheet" href="assests/plugins/iCheck/square/blue.css">

        <link rel="icon" href="assests/images/icon.png">
        <link rel="shortcut icon" href="assests/images/icon.png">

        <!-- Marcador en escritorio de Iphone-->
        <link rel="apple-touch-icon" href="assests/images/icon.png">
    </head>
    <body class="hold-transition login-page" STYLE="background-color:#525758">


        <!-- inicio cabecera -->
        <header>
            <div class="container">
                <figure class="inventariapp-logo-container pull-left">
                    <a href="#"><img class="inventariapp-logo img-responsive" src="../pScrum/assests/images/logo.JPG" width="200" height="200" alt="Logotipo Interbank - Enlace al home de La página"></a>
                </figure>
            </div>
        </header>
        <!-- fin cabecera -->



        <div class="login-box">
           
            <!-- /.login-logo -->
            <div class="login-box-body">
                <p class="login-box-msg"><b>Bienvenido a pScrum <br> "Gesti&oacute;n de proyectos"</b></p>

                <div class="messages">
                    <?php
                    if ($errors) {
                        foreach ($errors as $key => $value) {
                            echo '<div class="alert alert-warning alert-dismissable" role="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button>
									<i class="glyphicon glyphicon-exclamation-sign"></i>
									' . $value . '</div>';
                            
                        }
                    }
                    ?>
                </div>

                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" id="loginform">                                     
                     <div class="form-group has-feedback">
                        <input id="username" name="username" type="text" class="form-control" placeholder="usuario">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input name="password" id="password" type="password" class="form-control" placeholder="contraseña">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                          
                        </div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-warning btn-block btn-flat">Entrar</button>
                        </div>
                        <!--div class="col-xs-6">
                            <button type="button" onclick="window.location.href = 'register.php'" class="btn btn-primary btn-block btn-flat">Registrar</button>
                        </div-->
                    </div>
                </form>

                <!-- /.social-auth-links -->

                <a href="forget.php" class="text-center">Olvidaste tu contraseña</a>
            </div>

        </div>

        <!-- jQuery 2.2.3 -->
        <script src="assests/plugins/jQuery/jquery-2.2.3.min.js"></script>
        <!-- Bootstrap 3.3.6 -->
        <script src="assests/plugins/bootstrap/js/bootstrap.min.js"></script>
        <!-- iCheck -->
        <script src="assests/plugins/iCheck/icheck.min.js"></script>
        <script>
                               $(function () {
                                   $('input').iCheck({
                                       checkboxClass: 'icheckbox_square-blue',
                                       radioClass: 'iradio_square-blue',
                                       increaseArea: '20%' // optional
                                   });
                               });
        </script>
    </body>
</html>
