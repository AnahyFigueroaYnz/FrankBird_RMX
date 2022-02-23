<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title title-color">Agregar destino</h5>
            <button type="button" class="close closeAdDestino" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form class="form-horizontal" id="frmAgregar_destino">
            <div class="modal-body">
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="txt_destino">Destino</label>
                        <input type="text" class="form-control form-control-sm borders" id="txt_destino" required>
                    </div>
                    <div class="col-md-6">
                        <label for="selTipoDestino">Tipo</label>
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <select required class="form-control form-control-sm borders" id="selTipoDestino">
                                    <option selected value="0">Seleccione una opción</option>
                                    <option value="1">Origen</option>
                                    <option value="2">Destino</option>
                                    <option value="3">Origen y Destino</option>
                                </select>
                            </div>
                            <div id="divTiposDestino" style="display: none;"><span style="font-size: 12px;">Debe seleccionar una opción</span></div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="modal-footer  d-flex justify-content-between">
                <button type="button" class="btn btn-outline-secondary btn-sm btn-nuevo closeAdDestino" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-outline-success btn-sm btn-nuevo btnEditProy">Guardar <i class="fas fa-check"></i></button>
            </div>
        </form>
    </div>
</div>