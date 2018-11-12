
<?php
session_start();

require_once "../../../conexionbd/connectDB.php";
?>
<div class="row">
    <div class="col-sm-12 table-responsive">
        <table  style="width: 100%;text-align:center;" class="table  table-hover table-condensed table-bordered">
            <caption>
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalNuevo">
                    Nueva Epica
                    <span class="glyphicon glyphicon-plus"></span>
                </button>
            </caption>
            <tr style="background-color:purple; color:white">
                <td class="col-sm-4"><b>Epica</b></td>
                <td class="col-sm-4"><b>Descripci&oacute;n</b></td>
                <td class="col-sm-1"><b>Estado</b></td>
                <td class="col-sm-1"><b>Administrar</b></td>
                <td class="col-sm-1"><b>Editar</b></td>
                <td class="col-sm-1"><b>Eliminar</b></td>
            </tr>

            <?php
            $id_proyecto = $_SESSION['id_proyecto'];
            $sql = "SELECT * from epicas where id_proyecto = '$id_proyecto' order by epica";


            $result = mysqli_query($connect, $sql);
            while ($ver = mysqli_fetch_row($result)) {

                $datos = $ver[0] . "||" .
                        $ver[1] . "||" .
                        $ver[2]. "||" .
                        $ver[3];
                ?>

                <tr>
                    <td><?php echo $ver[1] ?></td>
                    <td><?php echo $ver[2] ?></td>
                    <td>
                        <?php if($ver[3] == 1){ ?>
                        <span class="label label-danger">No iniciado</span>
                    <?php } ?>
                        <?php if($ver[3] == 2){ ?>
                        <span class="label label-warning">En proceso</span>
                    <?php } ?>
                        <?php if($ver[3] == 3){ ?>
                        <span class="label label-success">Finalizado</span>
                    <?php } ?>
                    
                    </td>
                    <td>
                    <form action='historias.php' method='post' id="myForm">
                         <input type="hidden" id="id_epicas" name="id_epicas" value="<?php echo $ver[0] ?>">
                         <input type="hidden" id="id_epicas_name" name="id_epicas_name" value="<?php echo $ver[1] ?>">
                      <button class=" btn btn-success glyphicon glyphicon-list-alt" onclick="document.getElementById('myForm').submit()"></button>
                    </form>
                     </td>
                    <td>
                        <button class="btn btn-warning glyphicon glyphicon-pencil" data-toggle="modal" data-target="#modalEdicion_epicas" onclick="agregaformEpica('<?php echo $datos ?>')"></button>
                    </td>
                    <td>
                        <button class="btn btn-danger glyphicon glyphicon-remove" 
                                onclick="preguntarSiNoepica('<?php echo $ver[0] ?>')">

                        </button>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
</div>