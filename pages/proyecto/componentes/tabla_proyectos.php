
<?php
session_start();

require_once "../../../conexionbd/connectDB.php";
?>
<div class="row">
    <div class="col-sm-12 table-responsive">
        <table  style="width: 100%;text-align:center;" class="table  table-hover table-condensed table-bordered">
            <caption>
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalNuevo">
                    Nuevo proyecto
                    <span class="glyphicon glyphicon-plus"></span>
                </button>
            </caption>
            <tr style="background-color:orange">
                <td><b>Proyecto</b></td>
                <td><b>Descripci&oacute;n</b></td>
                <td><b>Administrar</b></td>
                <td><b>Editar</b></td>
                <td><b>Eliminar</b></td>
            </tr>

            <?php
            $sql = "SELECT * from proyectos order by proyecto";


            $result = mysqli_query($connect, $sql);
            while ($ver = mysqli_fetch_row($result)) {

                $datos = $ver[0] . "||" .
                        $ver[1] . "||" .
                        $ver[2];
                ?>

                <tr>
                    <td><?php echo $ver[1] ?></td>
                    <td><?php echo $ver[2] ?></td>
                    <td>
                        <form action='pagina.php' method='post'> 
                           <input type='button' class=" btn btn-success glyphicon glyphicon-list-alt" > 
                        </form>
                        <button class=" btn btn-success glyphicon glyphicon-list-alt" onclick="ingresar_al_proyecto('<?php echo $ver[0] ?>')"></button>
                    </td>
                    <td>
                        <button class="btn btn-warning glyphicon glyphicon-pencil" data-toggle="modal" data-target="#modalEdicion_proyectos" onclick="agregaform('<?php echo $datos ?>')"></button>
                    </td>
                    <td>
                        <button class="btn btn-danger glyphicon glyphicon-remove" 
                                onclick="preguntarSiNo('<?php echo $ver[0] ?>')">

                        </button>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
</div>