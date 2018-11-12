
<!DOCTYPE html>
<html>
    <head><meta charset="utf-8">
        <meta http-equiv="Expires" content="0">

        <meta http-equiv="Last-Modified" content="0">

        <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">

        <meta http-equiv="Pragma" content="no-cache">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>pScrum | Inlearning</title>

        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 css-->

        <link media="screen" rel="stylesheet" href="../../assests/plugins/bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="../../assests/plugins/font-awesome/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="../../assests/plugins/bootstrap/css/ionicons.min.css">
        <!--estilos propios -->
        <link rel="stylesheet" href="../../assests/plugins/dist/css/styles_1.css"> <!-- cambio el color de navbar -->
        <!-- daterange picker -->

        <!-- Select2 -->
        <link rel="stylesheet" href="../../assests/plugins/select2/select2.min.css">
        <!-- jvectormap -->
        <link rel="stylesheet" href="../../assests/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="../../assests/plugins/dist/css/AdminLTE.min.css">
        <link rel="stylesheet" href="../../assests/plugins/dist/css/skins/_all-skins.min.css">

        <link rel="icon" href="../../assests/images/icon.png">
        <link rel="shortcut icon" href="../../assests/images/icon.png">

        <!-- Marcador en escritorio de Iphone-->
        <link rel="apple-touch-icon" href="../../assests/images/icon.png">

        <!-- Include Required Prerequisites -->
        <script type="text/javascript" src="../../assests/jquery/jquery.min.js"></script>

        <!-- DataTables-->
        <link rel="stylesheet" type="text/css" href="../../assests/plugins/datatables/jquery.dataTables.min.css"></script>
    <script type="text/javascript" src="../../assests//plugins/datatables/jquery.dataTables.min.js"></script>

    <!-- ChartJS -->
    <script src="../../assests/plugins/chartjs/Chart.min.js"></script>

    <link rel="stylesheet" href="../../assests/jquery-ui/jquery-ui.css">
    <script src="../../assests/jquery-ui/jquery-1.12.4.js"></script>
    <script src="../../assests/jquery-ui/jquery-ui.js"></script>



    <!-- Tabla dinamica -->

    <link rel="stylesheet" type="text/css" href="../../pages/proyecto/librerias/alertifyjs/css/alertify.css">
    <link rel="stylesheet" type="text/css" href="../../pages/proyecto/librerias/alertifyjs/css/themes/default.css">
    <link rel="stylesheet" type="text/css" href="../../pages/horario/librerias/select2/css/select2.css">

    <script src="../../pages/horario/librerias/jquery-3.2.1.min.js"></script>

    <script src="../../pages/proyecto/librerias/alertifyjs/alertify.js"></script>
    <script src="../../pages/horario/librerias/select2/js/select2.js"></script>
</head>


<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper"> 

        <header class="main-header">

            <!-- Logo -->
            <a href="#" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><IMG SRC="../../assests/images/icon.png" WIDTH=50 HEIGHT=50></span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><IMG SRC="../../assests/images/logo.jpg" WIDTH=180 HEIGHT=50></span>
            </a>

            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top"> <!-- navbar se buca en stiles 1 y en all_skin.min.css (palabra a buscar : corregido) para cambiar colores -->
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">

                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <?php
                                $foto_perfil = "../../pages/usuarios/uploads_perfil/" . $_SESSION['dni'] . ".jpeg";

                                if (file_exists($foto_perfil)) {
                                    ?>
                                    <img width="20" height="20" class="img-circle" alt="User Image" src="../../pages/usuarios/uploads_perfil/<?php echo $_SESSION['dni'] . ".jpeg" ?>" >
                                <?php } else { ?>
                                    <img width="20" height="20" class="img-circle" alt="User Image" src="../../assests/images/usuario.png" >

                                <?php } ?>
                                <span class="hidden-xs"><?php echo $_SESSION['nombres']; ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                <center>
                                    <?php
                                    $foto_perfil = "../../pages/usuarios/uploads_perfil/" . $_SESSION['dni'] . ".jpeg";

                                    if (file_exists($foto_perfil)) {
                                        ?>
                                        <img width="90" height="90" class="img-circle" alt="User Image" src="../../pages/usuarios/uploads_perfil/<?php echo $_SESSION['dni'] . ".jpeg" ?>" >
                                    <?php } else { ?>
                                        <img width="90" height="90" class="img-circle" alt="User Image" src="../../assests/images/usuario.png" >

                                    <?php } ?>
                                </center>

<!--<img src="../../assests/images/usuario.png" class="img-circle" alt="User Image">
                                -->
                                <p>
                                    <?php
                                    $nombres = $_SESSION['nombres'];
                                    $apellido = $_SESSION['apellidos'];

                                    echo $nombres . " " . $apellido;
                                    ?>

                                    <small><?php echo $_SESSION['rol']; ?></small>
                                </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-right">
                                <a href="../../conexionbd/logout.php" class="btn btn-default btn-flat">Cerrar Sesión</a>
                            </div>
                            <div class="pull-left">
                                <?php if ($_SESSION['rol'] == "Estudiante") { ?>
                                <?php } else { ?>
                                    <a href="../../pages/usuarios/Actualiza_Perfil_Adm.php" class="btn btn-default btn-flat">Actualizar Perfil</a>
                                <?php } ?>

                            </div>
                        </li>
                    </ul>
                    </li>
                    </ul>
                </div>
            </nav>
        </header>

        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <?php
                        $foto_perfil = "../../pages/usuarios/uploads_perfil/" . $_SESSION['dni'] . ".jpeg";

                        if (file_exists($foto_perfil)) {
                            ?>
                            <img width="90" height="90" class="img-circle" alt="User Image" src="../../pages/usuarios/uploads_perfil/<?php echo $_SESSION['dni'] . ".jpeg" ?>" >
                        <?php } else { ?>
                            <img width="90" height="90" class="img-circle" alt="User Image" src="../../assests/images/usuario.png" >

                        <?php } ?>
                    </div>
                    <div class="pull-left info">
                        <p><?php echo $_SESSION['nombres']; ?></p> <?php echo $_SESSION['rol']; ?>
                    </div>
                </div>

                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu">
                    <li class="header">MENÚ DE OPCIONES</li>
                    <li class=" treeview"> <!-- si quiero que se active tengo que colocar la clase active class="active treeview" -->
                        <a href="#">
                            <i class="fa fa-user"></i> <span>Usuarios</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="../../pages/usuarios/new_users.php"><i class="fa fa-circle-o"></i>Reg. de Usuarios</a></li>

                            <!-- Gestion de usuarios -->
                            <li><a href="../../pages/usuarios/users.php"><i class="fa fa-circle-o"></i>Consultar Usuarios</a></li>
                        </ul> 



                    </li>





                    <li class=" treeview"> <!-- si quiero que se active tengo que colocar la clase active class="active treeview" -->
                        <a href="#">
                            <i class="fa fa-newspaper-o"></i> <span>Proyectos</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="../../pages/proyecto/proyectos.php"><i class="fa fa-circle-o"></i>Administrar proyectos</a></li>

                        </ul>
                    </li>




                </ul>

            </section>
            <!-- /.sidebar -->
        </aside>

