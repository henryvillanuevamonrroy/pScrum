

<div class="modal fade" id="modalNuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Agrega nueva Epica</h4>
            </div>
            <div class="modal-body">
                <label>Como :</label>
                <input type="text"  placeholder="escriba el nombre de usuario" name="" id="usuario" class="form-control input-sm">
                <label>necesito/deseo :</label>
                <input type="text"  placeholder="escriba la necesidad" name="" id="necesidad" class="form-control input-sm">
                <label>para (la razón) :</label>
                <input type="text"  placeholder="escriba para qué necesita" name="" id="razon" class="form-control input-sm">
                <input type="hidden" id="id_epicas" name="" value="<?php echo $_SESSION['$id_epicas']; ?>">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" id="guardarnuevo_historia">
                    Agregar
                </button>

            </div>
        </div>
    </div>
</div>

<!-- Modal para edicion de datos -->

<div class="modal fade" id="modalEdicion_historia" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Actualizar historias</h4>
            </div>
            <div class="modal-body">
                <input type="text" hidden="" id="idhistoria_edt" name="">
                <label>Como</label>
                <input type="text"  placeholder="escriba el nombre de usuario" name="" id="usuarioc" class="form-control input-sm">
                <label>necesito/deseo</label>
                <input type="text"  placeholder="escriba la necesidad" name="" id="necesidadc" class="form-control input-sm">
                <label>para (la razón)</label>
                <input type="text"  placeholder="escriba para qué necesita" name="" id="razonc" class="form-control input-sm">
                <label>prioridad</label>
                <input type="number"  max="20" placeholder="escriba la prioridad" name="" id="prioridadc" class="form-control input-sm">
                <label>puntaje de historia</label>
                <input type="number" max="100" placeholder="escriba el puntaje de historia" name="" id="puntajec" class="form-control input-sm">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" id="actualizahistoria" data-dismiss="modal">Actualizar</button>

            </div>
        </div>
    </div>
</div>


