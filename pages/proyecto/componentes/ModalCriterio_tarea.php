

<div class="modal fade" id="modalNuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Agrega nuevo criterio</h4>
            </div>
            <div class="modal-body">
                <label>En caso que :</label>
                <input type="text"  placeholder="escriba el escenario" name="" id="escenario" class="form-control input-sm">
                <label>cuando :</label>
                <input type="text"  placeholder="escriba el desencadenante" name="" id="desencadenante" class="form-control input-sm">
                <label>entonces :</label>
                <textarea rows="4" placeholder="escriba el resultado" name="" id="resultado" class="form-control input-sm"></textarea>
                <input type="hidden" id="id_historia" name="" value="<?php echo $_SESSION['id_historia']; ?>">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" id="guardarnuevo_criterio">
                    Agregar
                </button>

            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalNuevo_tarea" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Agrega nueva tarea</h4>
            </div>
            <div class="modal-body">
                <label>Descripcion :</label>
                <textarea rows="5" placeholder="escriba el resultado" name="" id="descripcion_tarea" class="form-control input-sm"></textarea>
                <input type="hidden" id="id_historia_tarea" name="" value="<?php echo $_SESSION['id_historia']; ?>">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" id="guardarnuevo_tarea">
                    Agregar
                </button>

            </div>
        </div>
    </div>
</div>

<!-- Modal para edicion de datos -->

<div class="modal fade" id="modalEdicion_criterio" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Actualizar historias</h4>
            </div>
            <div class="modal-body">
                <input type="text" hidden="" id="idcriterio_edt" name="">
                <label>En caso que :</label>
                <input type="text"  placeholder="escriba el escenario" name="" id="escenarioc" class="form-control input-sm">
                <label>cuando :</label>
                <input type="text"  placeholder="escriba el desencadenante" name="" id="desencadenantec" class="form-control input-sm">
                <label>entonces :</label>
                <textarea rows="4" placeholder="escriba el resultado" name="" id="resultadoc" class="form-control input-sm"></textarea>
                <label>estado :</label>
                <select class="form-control select2" id="estadoc" name="estadoc" style="width: 100%;" >
                    <option value="1">No Cumple</option>
                    <option value="2">Cumple</option>                                     
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" id="actualizacriterio" data-dismiss="modal">Actualizar</button>

            </div>
        </div>
    </div>
</div>


