
<?php
session_start();

require_once "../../../conexionbd/connectDB.php";
?>
<div class="row">
    <div class="col-sm-12 table-responsive">
        <table  style="width: 100%;text-align:center;" class="table  table-hover table-condensed table-bordered">
            <caption>
                <button class="btn btn-info" data-toggle="modal" data-target="#modalNuevo_tarea">
                    Nueva tarea
                    <span class="glyphicon glyphicon-plus"></span>
                </button>
            </caption>
            <tr style="font-size:10px;background-color:lightskyblue; color:black">
                <td class="col-sm-9"><b>Descripci&oacute;n de la tarea</b></td>
                <td class="col-sm-1"><b>estado</b></td>
                <td class="col-sm-1"><b>Iniciar/Finalizar</b></td>
                <td class="col-sm-1"><b>eliminar</b></td>
            </tr>

            <?php
            $id_historia=$_SESSION['id_historia'];
            
            $sql = "SELECT * from tarea where id_historia ='$id_historia' order by estado ";


            $result = mysqli_query($connect, $sql);
            while ($ver = mysqli_fetch_row($result)) {

                $datos = $ver[0] . "||" .
                        $ver[1] . "||" .
                        $ver[2]. "||" .
                        $ver[3];
                ?>

                <tr style="font-size:10px">
                    <td style="color:blue"> <b><?php echo $ver[1] ?></b></td>
                    <td>
                        <?php if($ver[2] == 1){ ?>
                        <span class="label label-danger">No iniciado</span>
                    <?php } ?>
                        <?php if($ver[2] == 2){ ?>
                        <span class="label label-warning">En proceso</span>
                    <?php } ?>
                        <?php if($ver[2] == 3){ ?>
                        <span class="label label-success">Finalizado</span>
                    <?php } ?>
                    
                    </td>
                    <td>
                        <?php if($ver[2] == 1){ ?>
                        <button class="btn btn-danger" 
                                onclick="preguntarSiNotarea_inicio('<?php echo $ver[0] ?>')"> Iniciar</button>
                    <?php } ?>
                        <?php if($ver[2] == 2){ ?>
                        <button class="btn btn-success" 
                                onclick="preguntarSiNotarea_final('<?php echo $ver[0] ?>')"> Finalizar</button>
                    <?php } ?>
                        <?php if($ver[2] == 3){ ?>
                        <button disabled=""> Terminado</button>
                    <?php } ?>
                    
                    </td>
                    <td>
                        <button class="btn btn-danger glyphicon glyphicon-remove" 
                                onclick="preguntarSiNotarea('<?php echo $ver[0] ?>')">

                        </button>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
</div>