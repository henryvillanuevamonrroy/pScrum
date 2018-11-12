

<div class="modal fade" id="modalNuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Agrega nueva Epica</h4>
      </div>
      <div class="modal-body">
        	<label>Epica</label>
                <input type="text"  placeholder="epica" name="" id="epica" class="form-control input-sm">
                <label>Descripci&oacute;n</label>
                <textarea  placeholder="decripcion" name="" id="descripcion" class="form-control input-sm" rows="5"></textarea>
             <input type="hidden" id="id_proyecto" name="" value="<?php echo $_SESSION['id_proyecto']; ?>">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="guardarnuevo_epica">
        Agregar
        </button>
       
      </div>
    </div>
  </div>
</div>

<!-- Modal para edicion de datos -->

<div class="modal fade" id="modalEdicion_epicas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Actualizar epicas</h4>
      </div>
      <div class="modal-body">
      		<input type="text" hidden="" id="idepica_edt" name="">
        	<label>Epica :</label>
        	<input type="text" name="" id="epicac" class="form-control input-sm">
                <label>Descripci&oacute;n :</label>
                <textarea name="" id="descripcionc" class="form-control input-sm"></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" id="actualizaepica" data-dismiss="modal">Actualizar</button>
        
      </div>
    </div>
  </div>
</div>


