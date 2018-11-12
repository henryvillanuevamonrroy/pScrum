
<?php
session_start();

require_once "../../../conexionbd/connectDB.php";
?>
<div class="row">
    <div class="col-sm-12 table-responsive">
        <table  style="width: 100%;text-align:left;" class="table  table-hover table-condensed table-bordered">
            <caption>
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalNuevo">
                    Nuevo Criterio
                    <span class="glyphicon glyphicon-plus"></span>
                </button>
            </caption>
            <tr style="font-size:10px;background-color:darkred; color:white">
                <td class="col-sm-1"><b>En caso que</b></td>
                <td class="col-sm-2"><b>< escenario ></b></td>
                <td class="col-sm-1"><b>cuando</b></td>
                <td class="col-sm-2"><b>< desencadenante ></b></td>
                <td class="col-sm-1"><b>entonces</b></td>
                <td class="col-sm-5"><b>< resultado ></b></td>    
                <td class="col-sm-1"><b>estado</b></td>
                <td class="col-sm-1"><b>Ver/editar</b></td>
                <td class="col-sm-1"><b>eliminar</b></td>
            </tr>

            <?php
             $id_historia=$_SESSION['id_historia'];
            $sql = "SELECT * from criterios_aceptacion where id_historia =$id_historia order by estado";
      

            $result = mysqli_query($connect, $sql);
            while ($ver = mysqli_fetch_row($result)) {

                $datos = $ver[0] . "||" .
                        $ver[1] . "||" .
                        $ver[2]. "||" .
                        $ver[3]. "||" .
                        $ver[4];
                ?>

                <tr style="font-size:10px">
                    <td>En caso que</td>
                    <td style="color:blue"> <b><?php echo $ver[1] ?></b></td>
                    <td>cuando</td>
                    <td style="color:blue"><b><?php echo $ver[2] ?></b></td>
                    <td>entonces</td>
                    <td style="color:blue"><b><?php echo $ver[3] ?></b></td>
                    <td>
                        <?php if($ver[4] == 1){ ?>
                        <span class="label label-danger">No Cumple</span>
                    <?php } ?>
                        <?php if($ver[4] == 2){ ?>
                        <span class="label label-success">Cumple</span>
                    <?php } ?>
                       
                    
                    </td>
                    <td>
                        <button class="btn btn-warning glyphicon glyphicon-pencil" data-toggle="modal" data-target="#modalEdicion_criterio" onclick="agregaformcriterio('<?php echo $datos ?>')"></button>
                    </td>
                    <td>
                        <button class="btn btn-danger glyphicon glyphicon-remove" 
                                onclick="preguntarSiNocriterio('<?php echo $ver[0] ?>')">

                        </button>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
</div>