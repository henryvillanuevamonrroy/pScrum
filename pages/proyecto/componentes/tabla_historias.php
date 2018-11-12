
<?php
session_start();

require_once "../../../conexionbd/connectDB.php";
?>
<div class="row">
    <div class="col-sm-12 table-responsive">
        <table  style="width: 100%;text-align:center;" class="table  table-hover table-condensed table-bordered">
            <caption>
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalNuevo">
                    Nueva Historia
                    <span class="glyphicon glyphicon-plus"></span>
                </button>
            </caption>
            <tr style="font-size:10px;background-color:green; color:white">
                <td class="col-sm-1"><b>Como</b></td>
                <td class="col-sm-2"><b><< rol >></b></td>
                <td class="col-sm-1"><b>necesito</b></td>
                <td class="col-sm-5"><b><< funcionalidad >></b></td>
                <td class="col-sm-1"><b>para</b></td>
                <td class="col-sm-2"><b><< raz&oacute;n >></b></td>
                <td class="col-sm-1"><b>prioridad</b></td>
                <td class="col-sm-1"><b>puntaje</b></td>
                <td class="col-sm-1"><b>estado</b></td>
                <td class="col-sm-1"><b>ver</b></td>
                <td class="col-sm-1"><b>editar</b></td>
                <td class="col-sm-1"><b>eliminar</b></td>
            </tr>

            <?php
            $sql = "SELECT * from historias order by prioridad, puntaje,rol";


            $result = mysqli_query($connect, $sql);
            while ($ver = mysqli_fetch_row($result)) {

                $datos = $ver[0] . "||" .
                        $ver[1] . "||" .
                        $ver[2]. "||" .
                        $ver[3]. "||" .
                        $ver[4]. "||" .
                        $ver[5]. "||" .
                        $ver[6]. "||" .
                        $ver[7]. "||" .
                        $ver[8]. "||" .
                        $ver[9];
                ?>

                <tr>
                    <td><?php echo $ver[1] ?></td>
                    <td><?php echo $ver[2] ?></td>
                    <td><?php echo $ver[3] ?></td>
                    <td><?php echo $ver[4] ?></td>
                    <td><?php echo $ver[5] ?></td>
                    <td><?php echo $ver[6] ?></td>
                    <td><?php echo $ver[7] ?></td>
                    <td><?php echo $ver[8] ?></td>
                    <td>
                        <?php if($ver[9] == 1){ ?>
                        <span class="label label-danger">No iniciado</span>
                    <?php } ?>
                        <?php if($ver[9] == 2){ ?>
                        <span class="label label-warning">En proceso</span>
                    <?php } ?>
                        <?php if($ver[9] == 3){ ?>
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