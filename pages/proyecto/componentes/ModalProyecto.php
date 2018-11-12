<div class="modal fade" id="modalNuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Agrega nuevo proyecto</h4>
      </div>
      <div class="modal-body">
        	<label>Proyecto</label>
                <input type="text"  placeholder="proyecto" name="" id="proyecto" class="form-control input-sm">
                <label>Descripci&oacute;n</label>
                <textarea  placeholder="decripcion" name="" id="descripcion" class="form-control input-sm" rows="5"></textarea>
          </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="guardarnuevo_proyecto">
        Agregar
        </button>
       
      </div>
    </div>
  </div>
</div>

<!-- Modal para edicion de datos -->

<div class="modal fade" id="modalEdicion_proyectos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Actualizar proyecto</h4>
      </div>
      <div class="modal-body">
      		<input type="text" hidden="" id="idproyecto_edt" name="">
        	<label>proyecto :</label>
        	<input type="text" name="" id="proyectoc" class="form-control input-sm">
                <label>Descripci&oacute;n :</label>
                <textarea name="" id="descripcionc" class="form-control input-sm"></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" id="actualizaproyecto" data-dismiss="modal">Actualizar</button>
        
      </div>
    </div>
  </div>
</div>


